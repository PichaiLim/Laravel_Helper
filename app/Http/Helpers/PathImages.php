<?php
/**
 * Created by PhpStorm.
 * User: pichailim
 * Date: 12/4/2018 AD
 * Time: 15:20
 */
define('defImage', 'http://via.placeholder.com/350x350');
define('defImageNotSize', 'http://via.placeholder.com/');
define('pathBuilding', 'images/building/');
define('pathUser', 'images/users/');
define('pathNewsletter', 'images/newsletter/');
define('pathContent', 'images/contents/');

function hasViewImageBuilding($img=null)
{
    $defaultPathBuilding = pathBuilding;

    if (file_exists($defaultPathBuilding . $img)) {
        return $defaultPathBuilding . $img;
    }

    return defImage;
}

function pathImageBuilding(){
    return pathBuilding;
}

function _hasViewImageBuilding($img, $type='view'){
    $defPath = pathBuilding;

    switch ($type) {
        case 'view':
            if (file_exists(public_path($defPath . $img)) && !empty($img)) {
                return asset($defPath . $img);
            } else {
                return defImage;
            }
            break;

        case 'remove':
            return public_path($defPath . $img);
        case 'copy':
        case 'move':
        default:
            return $defPath . $img;
    }
}

function hasViewAvatarUser($img = '', $type = 'view')
{
    $defPath = pathUser;

    switch ($type) {
        case 'view':
            if (file_exists(public_path($defPath . $img)) && !empty($img)) {
                return asset($defPath . $img);
            } else {
                return defImage . strtoupper(mb_substr("" . Auth::user()->name . "", 0, 1, "UTF-8"));
            }
            break;

        case 'remove':
            return public_path($defPath . $img);
        case 'copy':
        case 'move':
        default:
            return $defPath . $img;
    }

}

function hasViewNewsletter($img = '', $type = 'view')
{
    switch ($type){
        case 'view':
            if (file_exists(public_path(pathNewsletter . $img)) && !empty($img)) {
                return asset(pathNewsletter . $img);
            } else {
                return defImageNotSize.'350x200&text=Newsletter';
            }
            break;
        default:
            return defImageNotSize . '350x200&text=Newsletter';
    }
}

function hasViewContents($img = '', $type = 'view')
{
    switch ($type){
        case 'view':
            if (file_exists(public_path(pathContent . $img)) && !empty($img)) {
                return asset(pathContent . $img);
            } else {
                return defImageNotSize.'200x200&text=Contents';
            }
            break;
        case 'move':
            if (empty($img)) {
                return abort(500, '');
            } else {
                return public_path(pathContent . $img);
            }
        case 'remove':
            @unlink(public_path(pathContent . $img));
            break;
        default:
            return defImageNotSize . '200x200&text=Contents';
    }
}

function newFileName($extension = 'jpg')
{
    return date('ymjHis') . str_random(10) . '.' . $extension;
}
