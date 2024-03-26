<?php

namespace App\Repositories\SubjectRepository;

use App\Models\Setting\Subject;

class EloquentSubjectRepository implements SubjectRepository
{
    public function getAll()
    {
        return Subject::on('mysql2')->select(['uid', 'subject_id', 'subject_no', 'name', 'class_uid', 'version'])->get();
    }

    public function getById($uid)
    {
        return Subject::on('mysql2')->where('uid',$uid)->first();
    }

    public function create($data)
    {
        return Subject::create($data);
    }

    public function update($uid, $data)
    {
        $subject = Subject::where('uid',$uid)->first();
        $subject->update($data);
    }

    public function delete($uid)
    {
        $subject = Subject::where('uid',$uid)->first();
        $subject->delete();
    }

    public function getByClass($class_uid)
    {
        $subjects = Subject::on('mysql2')->select(['uid', 'subject_id', 'subject_no', 'name', 'class_uid', 'version'])->where('class_uid', $class_uid)->get();
        return $subjects;
    }
}
