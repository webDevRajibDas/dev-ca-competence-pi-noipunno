<?php

namespace App\Helper;

use Illuminate\Support\Facades\Cookie;


class UtilsCookie {

    public static $name = 'ca-token';

    public static function getCookie() {
        return Cookie::get(UtilsCookie::$name, null);
    }

    public static function deleteCookie() {
        return Cookie::queue(Cookie::forget(UtilsCookie::$name, null, config('app.auth_domain')));
    }
}
