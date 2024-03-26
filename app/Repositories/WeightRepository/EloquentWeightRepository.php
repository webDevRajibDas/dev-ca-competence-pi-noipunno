<?php

namespace App\Repositories\WeightRepository;

use App\Models\Setting\Weight;

class EloquentWeightRepository implements WeightRepository
{
    public function getAll()
    {
        return Weight::on('mysql2')->select(['uid', 'name', 'type', 'number', 'session', 'symbol'])->get();
    }

    public function getById($uid)
    {
        return Weight::on('mysql2')->where('uid',$uid)->first();
    }

    public function create($data)
    {
        if(isset($data['symbol']) && $data['symbol']->isValid()) {
            $file = $data['symbol'];
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move('symbol', $fileName);
            $data['symbol'] = 'symbol/'.$fileName;
        }
        return Weight::create($data);
    }

    public function update($uid, $data)
    {
        $weight = Weight::where('uid',$uid)->first();

        if(isset($data['symbol']) && $data['symbol']->isValid()) {
            $file = $data['symbol'];
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move('symbol', $fileName);
            if ($weight && !empty($weight->symbol)) {
                unlink(public_path($weight->symbol));
            }
            $data['symbol'] = 'symbol/'.$fileName;
        }

        $weight->update($data);
    }

    public function delete($uid)
    {
        $weight = Weight::where('uid',$uid)->first();
        if ($weight && !empty($weight->symbol)) {
            unlink(public_path($weight->symbol));
        }
        $weight->delete();
    }
}
