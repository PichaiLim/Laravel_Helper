<?php
/**
 * Created by PhpStorm.
 * User: pichailim
 * Date: 2/5/2018 AD
 * Time: 20:56
 *
 * @param string $default
 * @param $lang
 *
 * @return string
 */

function _trans($default = 'th', $lang)
{
    if (app()->getLocale() == 'th') {
        return $default;
    } else {
        return (!empty($lang)) ? $lang : $default;
    }
}
