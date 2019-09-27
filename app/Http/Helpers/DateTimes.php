<?php
/**
 * Created by PhpStorm.
 * User: pichailim
 * Date: 19/4/2018 AD
 * Time: 10:52
 */

function defaultDateTimes($date, $format = 'Y-m-d H:i:s')
{
    return date($format, strtotime($date));
}

function defaultDateTimesTimeZone($date, $format="Y-m-d H:i:s", $setTimezone="Asia/Bangkok"){
    $date = date_create($date, timezone_open($setTimezone));
    return date_format($date, $format);
}


function formatDateThai($strDate, $s = 0)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];

    if ($s != 0) {
        return "$strDay $strMonthThai $strYear $strHour:$strMinute:$strSeconds";
    }

    return "$strDay $strMonthThai $strYear $strHour:$strMinute";
}
