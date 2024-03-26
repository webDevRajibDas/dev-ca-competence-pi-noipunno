<?php

namespace App\Repositories\ChapterRepository;

use App\Models\Setting\Chapter;
use App\Models\Setting\Poricched;
use Illuminate\Support\Facades\DB;

class EloquentChapterRepository implements ChapterRepository
{
    public function getAll()
    {
        return Chapter::on('mysql2')->get();
    }

    public function getById($uid)
    {
        return Chapter::on('mysql2')->where('uid',$uid)->first();
    }

    public function create($data)
    {
        return Chapter::create($data);
    }

    public function update($uid, $data)
    {
        $chapter = Chapter::where('uid',$uid)->first();
        $chapter->update($data);
        return $chapter;
    }

    public function delete($uid)
    {
        $chapter = Chapter::where('uid',$uid)->first();
        $chapter->delete();
    }

    public function getBySubject($subject_id)
    {
        return Chapter::on('mysql2')->select('uid', 'name', 'chapter_id', 'class_uid', 'subject_uid')->where('subject_uid', $subject_id)->get();
    }



    public function getChapterByPagination($request)
    {
        $chapters = Chapter::on('mysql2')->with('poriccheds')->where('is_copied',0);

        if (!empty($request->session)) {
            $chapters = $chapters->where('session', $request->session);
        }else{
            $chapters = $chapters->where('session', date('Y')-1);
        }

        if (!empty($request->class_uid)) {
            $chapters = $chapters->where('class_uid', $request->class_uid);
        }

        if (!empty($request->subject_uid)) {
            $chapters = $chapters->where('subject_uid', $request->subject_uid);
        }


        if (!empty($request->limit) && ($request->limit == 'all')) {
            $chapters = $chapters->get();
        } else if (!empty($request->limit)) {
            $chapters = $chapters->paginate($request->limit);
        } else {
            $chapters = $chapters->paginate(10);
        }

        return $chapters;
    }

    public function copyChapterStore($request)
    {
        try {
            DB::beginTransaction();

            ini_set('max_execution_time', 3600);

            $chapters = Chapter::on('mysql2')->with('poriccheds')->whereIn('uid', $request->chapterArr)->get();

            // echo "<pre>";print_r($chapters->toArray());exit;
            $chaptersArr = [];
            if ($chapters->isNotEmpty()) {
                foreach ($chapters as $chapter) {
                    $chaptersArr['chapter_id']           = $chapter->chapter_id;
                    $chaptersArr['name']                 = $chapter->name;
                    $chaptersArr['name_en']              = $chapter->name_en;
                    $chaptersArr['class_uid']            = $chapter->class_uid;
                    $chaptersArr['subject_uid']          = $chapter->subject_uid;
                    $chaptersArr['session']              = date('Y');
                    $chaptersArr['is_copied']            = 0;

                    $chapterUid = Chapter::create($chaptersArr);
                    $chapter->update(['is_copied' => 1]);

                    if(!empty($chapter->poriccheds)){
                        foreach($chapter->poriccheds as $poricched){
                            $data = new Poricched;
                            $data->poricched_no = $poricched->poricched_no;
                            $data->poricched_title = $poricched->poricched_title;
                            $data->class_id = $poricched->class_id;
                            $data->subject_uid = $poricched->subject_uid;
                            $data->chapter_uid = $chapterUid->uid;
                            $data->save();
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
}
