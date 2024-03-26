<?php

namespace App\Repositories\CompetenceRepository;

use App\Models\PiCompetence\Pi;
use Illuminate\Support\Facades\DB;
use App\Models\PiCompetence\Competence;
use App\Models\PiCompetence\PiAttribute;

class EloquentCompetenceRepository implements CompetenceRepository
{
    public function getAll()
    {
        return Competence::on('mysql2')->orderBy('class_uid', 'asc')->orderBy('competence_id', 'asc')->get();
    }
    
    public function getBySession($year)
    {
        return Competence::on('mysql2')->where('session', $year)->orderBy('class_uid', 'asc')->orderBy('competence_id', 'asc')->get();
    }

    public function getById($uid)
    {
        return Competence::on('mysql2')->with(['class', 'subject', 'pis'])->where('uid', $uid)->first();
    }

    public function create($data)
    {
        return Competence::create($data);
    }

    public function update($uid, $data)
    {
        $competence = Competence::where('uid', $uid)->first();
        $competence->update($data);
    }

    public function delete($uid)
    {
        $competence = Competence::where('uid', $uid)->first();
        if (!empty($competence)) {
            $pis = Pi::where('competence_uid', $competence->uid)->get();
            foreach ($pis as $pi) {
                PiAttribute::where('pi_uid', $pi->uid)->delete();
            }
        }
        $pis->each->delete();
        $competence->delete();
    }

    public function getAllByClass($class_id)
    {
        return Competence::on('mysql2')->where('class_uid', $class_id)->get();
    }

    public function getAllBySubject($data, $year=null)
    {
        if($year){
            return Competence::on('mysql2')->select('uid', 'competence_id', 'competence_no', 'name_en', 'name_bn', 'subject_uid', 'class_uid', 'updated_at')
                ->with(['pis'])
                ->where('subject_uid', $data)
                ->where('session', $year)
                ->get();
        }
        else{
            return Competence::on('mysql2')->select('uid', 'competence_id', 'competence_no', 'name_en', 'name_bn', 'subject_uid', 'class_uid', 'updated_at')
                ->with(['pis'])
                ->where('subject_uid', $data)
                ->where('session', date('Y'))
                ->get();
        }

    }

    public function getAllByClassSubject($data, $year=null)
    {
        if($year){
            return Competence::on('mysql2')->with(['pis', 'class', 'subject'])->where('class_uid', $data['class_id'])->where('subject_uid', $data['subject_id'])->where('session', $year)->get();
        }
        else{
            return Competence::on('mysql2')->with(['pis', 'class', 'subject'])->where('class_uid', $data['class_id'])->where('subject_uid', $data['subject_id'])->where('session', date('Y'))->get();
        }
    }

    public function getAllByChapter($id)
    {
        return Competence::on('mysql2')->select(['uid', 'competence_id', 'name_en', 'name_bn', 'details_bn', 'details_en'])->with(['pis'])->where('chapter_uid', $id)->get();
    }

    public function getAllByPagination($request)
    {

        $target = Competence::on('mysql2')->with('pis')->where('is_copied', 0)->orderBy('class_uid', 'asc')->orderBy('competence_id', 'asc');

        if (!empty($request->session)) {
            $target = $target->where('session', $request->session);
        } else {
            $target = $target->where('session', date('Y') - 1);
        }

        if (!empty($request->class_uid)) {
            $target = $target->where('class_uid', $request->class_uid);
        }

        if (!empty($request->subject_uid)) {
            $target = $target->where('subject_uid', $request->subject_uid);
        }


        if (!empty($request->limit) && ($request->limit == 'all')) {
            $target = $target->get();
        } else if (!empty($request->limit)) {
            $target = $target->paginate($request->limit);
        } else {
            $target = $target->paginate(10);
        }

        // dd(date('Y')-1);

        return $target;
    }


    public function copyCompetenceStore($request)
    {

        try {
            DB::beginTransaction();

            ini_set('max_execution_time', 3600);

            $competences = Competence::on('mysql2')->whereIn('uid', $request->competenceArr)->get();

            $competenceArr = [];
            if ($competences->isNotEmpty()) {
                foreach ($competences as $competence) {

                    $competenceArr['competence_id']        = $competence->competence_id;
                    $competenceArr['competence_no']        = $competence->competence_no;
                    $competenceArr['name_en']              = $competence->name_en;
                    $competenceArr['name_bn']              = $competence->name_bn;
                    $competenceArr['details_en']           = $competence->details_en;
                    $competenceArr['details_bn']           = $competence->details_bn;
                    $competenceArr['session']              = date('Y');
                    $competenceArr['status']               = $competence->status;
                    $competenceArr['class_uid']            = $competence->class_uid;
                    $competenceArr['subject_uid']          = $competence->subject_uid;
                    $competenceArr['is_copied']            = 0;
                    $competenceId = Competence::create($competenceArr);

                    $competence->update(['is_copied' => 1]);

                    $competencePis = Pi::whereIn('uid', $request->piArr[$competence->uid])->get();
                    if ($competencePis->isNotEmpty()) {
                        foreach ($competencePis as $pi_data) {
                            $piData['pi_id']                = $pi_data['id'];
                            $piData['pi_no']                = $pi_data['pi_no'];
                            $piData['name_en']              = $pi_data['name_en'];
                            $piData['name_bn']              = $pi_data['name_bn'];
                            $piData['description']          = $pi_data['description'];
                            $piData['competence_uid']       = $competenceId->uid;
                            $pi = Pi::create($piData);

                            if (!empty($pi_data->pi_attribute)) {
                                foreach ($pi_data->pi_attribute as $pi_attribute) {
                                    $attributeData = new PiAttribute();
                                    $attributeData['pi_uid']        = $pi->uid;
                                    $attributeData['weight_uid']    = $pi_attribute['weight_uid'];
                                    $attributeData['title_en']      = $pi_attribute['title_en'];
                                    $attributeData['title_bn']      = $pi_attribute['title_bn'];
                                    $attributeData['description']   = $pi_attribute['description'];
                                    $attributeData->save();
                                }
                            }
                        }
                    }
                }

                DB::commit();
                return true;
            }
        } catch (Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function piLists($request)
    {
        return Pi::where('competence_uid', $request->id)->paginate(20);
    }
    public function storePi($request)
    {
        try {
            DB::beginTransaction();


            foreach ($request->pi as $index => $pi_data) {
                // $piData['pi_id'] = $pi_data['data']['id'];
                $piData['pi_no'] = $pi_data['data']['pi_no'];
                $piData['name_en'] = $pi_data['data']['name_en'];
                $piData['name_bn'] = $pi_data['data']['name_bn'];
                $piData['description'] = $pi_data['data']['description'];
                $piData['competence_uid'] = $request->competence_uid;
                $pi = Pi::create($piData);

                foreach ($pi_data['data']['attribute'] as $key => $attribute_data) {
                    $attributeData = new PiAttribute();
                    $attributeData['pi_uid'] = $pi->uid;
                    $attributeData['weight_uid'] = $key;
                    $attributeData['title_en'] = $attribute_data['attribute_title_en'];
                    $attributeData['title_bn'] = $attribute_data['attribute_title_bn'];
                    // $attributeData['description'] = $attribute_data['attribute_details'];

                    $attributeData->save();
                }
            }
            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollback();
            return false;
        }
    }
    public function updatePi($request)
    {
        try {
            DB::beginTransaction();

            $pi = Pi::where('competence_uid', $request->id)->where('uid', $request->pi_id)->first();

            // $pi->uid            = $request->uid;
            $pi->pi_no          = $request->pi['pi_no'];
            // $pi->pi_id          = $request->pi['pi_id'];
            $pi->name_en        = $request->pi['pi_name_en'];
            $pi->name_bn        = $request->pi['pi_name_bn'];
            $pi->description    = $request->pi['description'];
            $pi->save();

            foreach ($request->pi['attribute'] as $key => $attribute_data) {

                $data = PiAttribute::where('pi_uid', $pi->uid)->where('uid', $key)->first();
                $data->pi_uid = $pi->uid;
                $data->title_en = $attribute_data['attribute_title_en'];
                $data->title_bn = $attribute_data['attribute_title_bn'];
                // $data->description = $attribute_data['attribute_details'];
                $data->save();
            }


            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollback();
            return false;
        }
    }
    public function deletePi($request)
    {
        try {
            DB::beginTransaction();

            Pi::where('uid', $request->pi_id)->delete();
            PiAttribute::where('pi_uid', $request->pi_id)->delete();

            DB::commit();
            return true;

        } catch (Exception $e) {
            DB::rollback();
            return false;
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            return back()->with($notification);
        }
    }
}
