<?php
/**
 * بسم الله الرحمن الرحيم
 * User: Basheir
 * Date: 10‏/1‏/2016
 * Time: 2:56 م
 *
 */


/**
 * @param $arr
 * @return string  اعادة  رقم الهاتف
 */
function listMobileNumber($arr)
{





    $html = '';

    if (is_array(array($arr))) {


        $res = explode(",", $arr);


        foreach ($res as $val) {
            $html .= '<span class="greenColor">'.$val.'<span/>';

        }

    } else {
        $html .= '<span class="greenColor">'.$arr.'<span/>';
    }


    return $html;


}



