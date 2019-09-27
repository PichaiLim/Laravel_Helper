<?php
/**
 * Created by PhpStorm.
 * User: pichailim
 * Date: 12/5/2018 AD
 * Time: 19:53
 */

// Document: https://samples.codestep.io/php/thai-money-currency-format
function ThaiMoney($number){
    // ข้อมูลตัวเลขภาษาไทย
    $arrGroup = [ '', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน' ];
    $arrDigit = [ '', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า' ];

// วิเคราะห์ตัวเลข
//    $intNum = '1323321.21';
    $intNum = $number;
    $number = explode('.', str_replace(',', '', $intNum));

// เก็บข้อมูลตัวเลขใหม่
    $arrNumber = [];

// ลูป
    foreach ($number as $key => $value) {

        // คำนวนหลัก
        $lenNumber = (strlen($value) - 1);
        $arrNumWord = str_split($value); // แปลงเป็น array เช่น 1000 = [ 1, 0, 0, 0 ]
        $count = $lenNumber; // หลัก เช่น 1000 = 4 หลัก

        // วนลูป
        foreach ($arrNumWord as $num) {

            if ($num != 0) {
                if ($count > 1 || $num > 2) {
                    $arrNumber[$key][] = ($arrDigit[$num] . $arrGroup[$count]);
                } else {
                    if ($count == 1) {
                        $arrNumber[$key][] = ($num == 2 ? 'ยี่สิบ' : 'สิบ');
                    }
                    if ($count == 0) {
                        $arrNumber[$key][] = ($num == 1 ? 'เอ็ด' : ($num > 1 ? $arrDigit[$num] : null));
                    }
                }
            }

            $count--; // ลบ -1

        }

        $arrNumber[$key] = implode('', $arrNumber[$key]);

    }

    echo implode('จุด', $arrNumber);

// input: 1,323,321.21 บาท
// output: หนึ่งล้านสามแสนสองหมื่นสามพันสามร้อยยี่สิบเอ็ดจุดยี่สิบเอ็ดบาท
}
