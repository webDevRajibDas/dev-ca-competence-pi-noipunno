<?php

if (!function_exists('toRawSql')) {
    function toRawSql($query) {
        $format = $query->toSql();
        $replacements = $query->getBindings();
        $to_raw_sql = preg_replace_callback('/\?/', function($matches) use (&$replacements) {
            return array_shift($replacements);
        }, $format);
        dd($to_raw_sql);
    }
}

if (!function_exists('dddd')) {
    function dddd($query)
    {
        dd($query->toArray());
    }
}

if (!function_exists('isApi')) {
    function isApi()
    {
        return Str::startsWith(request()->path(), 'api');
    }
}