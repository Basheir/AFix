<?php
/**
 * بسم الله الرحمن الرحيم
 * User: Basheir
 * Date: 11‏/1‏/2016
 * Time: 12:26 ص
 *
 */


function writeErrorLog($d){

    $my_file = './log/error.log';
    $handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
    $data = "\n";
    fwrite($handle, $data);
    $new_data = "\n".'New data line 2';
    fwrite($handle, "\n".$d);
}