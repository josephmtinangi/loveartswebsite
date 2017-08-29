<?php
/**
 * Check if string is set and not empty
 *
 * @param $str
 * @return boolean
 */

if (!function_exists('is_set')) {

    function is_set($str = null)
    {
        return isset($str) && !empty($str);
    }

}


/**
 * Show string if available else show default string.
 *
 * @param $str string
 * @return string
 */

if (!function_exists('show_if_available')) {

    function show_if_available($str = null, $default = 'Not Available')
    {
        if (is_set($str)) return $value;

        else return $default;
    }

}
