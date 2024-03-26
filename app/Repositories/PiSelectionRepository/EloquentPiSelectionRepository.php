<?php

namespace App\Repositories\PiSelectionRepository;

use App\Models\PiCompetence\PiSelection;

class EloquentPiSelectionRepository implements PiSelectionRepository
{
    public function getAll()
    {
        return PiSelection::on('mysql2')->with('pi_list')->get();
    }

    public function getById($uid)
    {
        return PiSelection::on('mysql2')->where('uid', $uid)->first();
    }
    public function getBySession($session)
    {
        return PiSelection::on('mysql2')->with('pi_list')
        ->where('session', $session)
        ->get();
    }
    public function getBySubject($data)
    {
        return PiSelection::on('mysql2')->with('pi_list')->where('session', $data['session'])->where('subject_uid', $data['subject_uid'])->get();
    }

    public function create($data)
    {
        return PiSelection::create($data);
    }

    public function update($uid, $data)
    {
        $pi_selection = PiSelection::where('uid', $uid)->first();
        $pi_selection->update($data);
        return $pi_selection;
    }

    public function delete($uid)
    {
        $pi_selection = PiSelection::where('uid', $uid)->first();
        $pi_selection->delete();
    }
}
