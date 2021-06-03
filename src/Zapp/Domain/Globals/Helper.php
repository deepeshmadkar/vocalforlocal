<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08-01-2021
 * Time: 09:11 AM
 */


if (!function_exists('zparcel')) {
    function zparcel($id)
    {
        return  'zt-'.$id.'-'.\Illuminate\Support\Str::uuid();
    }
}

if (!function_exists('zslug')) {
    function zslug($name)
    {
        return strtolower(preg_replace('/\s+/', '-', trim(preg_replace('/\s+/', ' ', preg_replace('/[^a-zA-Z0-9]/', " ", $name)))));
    }
}

if (!function_exists('toPaise')) {
    function toPaise($val)
    {
        return $val * 100;
    }
}

if (!function_exists('toRs')) {
    function toRs($val)
    {
        return $val / 100;
    }
}

if (!function_exists('zassets')) {
    function zassets($filename)
    {
        return \Illuminate\Support\Facades\Storage::disk('zassets')->url($filename);
    }
}

if (!function_exists('zdatehuman')) {
    function zdatehuman($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }
}


if (!function_exists('zinitials')) {
    function zinitials($str, $counter = 2)
    {
        $ret = '';
        foreach (explode(' ', $str) as $key => $word){
            if($key < $counter){
                $ret .= strtoupper($word[0]);
            }
        }
        return $ret;
    }
}