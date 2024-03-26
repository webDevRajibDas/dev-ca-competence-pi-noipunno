<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PiCompetence\Competence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompetenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ini_set('max_execution_time', 3600);
        Competence::on('mysql2')->where('session', date('Y'))->delete();
        Competence::on('mysql2')->where('session', date('Y'))->where('deleted_at', '!=', null)->forceDelete();
        // echo "success";
        // exit;
        $targets = Competence::on('mysql2')->get();

        $newArr = [];
        // if($targets->isNotEmpty()){
        //     foreach ($targets as $target) {
        //         $newArr['competence_id']        = $target->competence_id;
        //         $newArr['competence_no']        = $target->competence_no;
        //         $newArr['name_en']              = $target->name_en;
        //         $newArr['name_bn']              = $target->name_bn;
        //         $newArr['details_en']           = $target->details_en;
        //         $newArr['details_bn']           = $target->details_bn;
        //         $newArr['session']              = date('Y');
        //         $newArr['status']               = $target->status;
        //         $newArr['class_uid']            = $target->class_uid;
        //         $newArr['subject_uid']          = $target->subject_uid;
        //         Competence::create($newArr);
        //     }
        //     echo "data copied successfully!!";
        // }

        echo "data Does not copied!!";


    }
}
