<?php
/**
 * Created by PhpStorm.
 * User: pichailim
 * Date: 20/4/2018 AD
 * Time: 00:03
 */

function facebook($arg = '')
{
    return (empty($arg)) ? null : 'https://www.facebook.com/';
}

function line($arg = '')
{
    return (empty($arg)) ? null : 'http://line.me/ti/p/~';
}
