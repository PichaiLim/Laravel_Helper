<?php
/**
 * Created by PhpStorm.
 * User: pichailim
 * Date: 23/4/2018 AD
 * Time: 15:50
 */

function textBoxAlertMessage($error)
{
    return ($error == false) ? 'is-valid' : 'is-invalid';
}

function boxAlertMessages($m)
{
    return ($m == false) ? 'invalid-feedback' : 'valid-feedback';
}

function alertMessages($errors, $m)
{
    return ($errors == false) ? $m : null;
}


function oldValue($oldInput, $modelValue)
{
    return (empty($oldInput)) ? $modelValue : $oldInput;
}


function selectOption($id, $qId, $oldValue)
{
    return ($id == $qId || $oldValue == $id) ? 'selected="selected"' : '';
}
