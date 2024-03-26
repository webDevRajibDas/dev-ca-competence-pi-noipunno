<?php

namespace App\Helper;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\User;


class UtilsValidAuthUser
{

    public static function getUser($data)
    {
        try {
            $user_type = @$data['user_user_type_id'];
            if ($user_type != 4) {
                $userInfo = UtilsUserInfo::userInfo();
                if ($userInfo->status) {
                    $permissions = $userInfo->data['permission_access_modules'];
                    $permission = array_column($permissions, 'id');
                    if (!in_array(2, $permission) === true && !isApi()) {
                        return redirect()->to(config('app.auth_url'));
                    }
                } else {
                    return redirect()->to(config('app.auth_url'));
                }
            }
        } catch (\Exception $e) {
            return redirect()->to(config('app.auth_url'));
        }
        $user = User::where('caid', @$data['user_caid'])->first();
        if (!$user) {
            $user = User::create([
                'caid' => @$data['user_caid'],
                'name' => @$data['user_name'] ?? 'Noipunno User',
                'email' => @$data['user_email'] ?? 'admin@admin.com',
                'user_type_id' => @$data['user_user_type_id'] ?? 4,
                'password' => Hash::make(@$data['user_caid']),
            ]);
        }
        return $user;
    }
}
