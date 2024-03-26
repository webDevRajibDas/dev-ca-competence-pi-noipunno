<?php

namespace App\Repositories\OviggotaRepository;

use App\Models\Setting\Oviggota;
use Illuminate\Support\Facades\DB;

class EloquentOviggotaRepository implements OviggotaRepository
{
    public function getAll()
    {
        return Oviggota::on('mysql2')->get();
    }
    public function getAllByYear($year)
    {
        return Oviggota::on('mysql2')->where('session', $year)->get();
    }

    public function getById($uid)
    {
        return Oviggota::on('mysql2')->where('uid', $uid)->first();
    }

    public function create($data)
    {
        return Oviggota::create($data);
    }

    public function update($uid, $data)
    {
        $oviggota = Oviggota::where('uid', $uid)->first();
        $oviggota->update($data);
        return $oviggota;
    }

    public function delete($uid)
    {
        $oviggota = Oviggota::where('uid', $uid)->first();
        $oviggota->delete();
    }
    public function getBySubjectId($subject_id, $year=null)
    {
        if($year){
            return Oviggota::on('mysql2')->with('pis')->where('subject_uid', $subject_id)->where('session', $year)->get();
        }
        else{
            return Oviggota::on('mysql2')->with('pis')->where('subject_uid', $subject_id)->where('session', date('Y'))->get();
        }
    }

    public function getAllOviggotasByPagination($request)
    {
        $oviggotas = Oviggota::on('mysql2')->where('is_copied',0);

        if (!empty($request->session)) {
            $oviggotas = $oviggotas->where('session', $request->session);
        }else{
            $oviggotas = $oviggotas->where('session', date('Y')-1);
        }

        if (!empty($request->class_uid)) {
            $oviggotas = $oviggotas->where('class_id', $request->class_uid);
        }

        if (!empty($request->subject_uid)) {
            $oviggotas = $oviggotas->where('subject_uid', $request->subject_uid);
        }


        if (!empty($request->limit) && ($request->limit == 'all')) {
            $oviggotas = $oviggotas->get();
        } else if (!empty($request->limit)) {
            $oviggotas = $oviggotas->paginate($request->limit);
        } else {
            $oviggotas = $oviggotas->paginate(10);
        }

        return $oviggotas;
    }

    public function copyOviggotaStore($request)
    {

        try {
            DB::beginTransaction();

            ini_set('max_execution_time', 3600);

            $oviggotas = Oviggota::on('mysql2')->whereIn('uid', $request->oviggotaArr)->get();

            $oviggotaArr = [];
            if ($oviggotas->isNotEmpty()) {
                foreach ($oviggotas as $oviggota) {
                    $oviggotaArr['oviggota_no']           = $oviggota->oviggota_no;
                    $oviggotaArr['oviggota_title']        = $oviggota->oviggota_title;
                    $oviggotaArr['class_id']              = $oviggota->class_id;
                    $oviggotaArr['subject_uid']           = $oviggota->subject_uid;
                    $oviggotaArr['session']               = date('Y');
                    $oviggotaArr['is_copied']             = 0;

                    Oviggota::create($oviggotaArr);
                    $oviggota->update(['is_copied' => 1]);
                }

                DB::commit();
                return true;
            }
        } catch (Exception $e) {
            DB::rollback();
            return false;
        }
    }
}
