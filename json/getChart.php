<?php
/**
 * بسم الله الرحمن الرحيم
 * User: Basheir
 * Date: 15‏/1‏/2016
 * Time: 3:08 م
 *
 */

header('Content-Type: application/json');


$resultData['Pia']= array();
include('../config.php');




$db->where('Finsh','1');
$devicesList = $db->get('devices');



$resultData['Pia'][] = array(
    'value' => $db->count,
    'highlight' => '#FF5A5E',
    'label' => 'تم الانتهاء من صيانتها'
);





$db->where('Finsh','0');
$devicesList = $db->get('devices');

$resultData['Pia'][] = array(
    'value' => $db->count,
    'highlight' => '#FF5A5E',
    'label' => 'الباقي'
);









// get custemer




$db->join("coustemers", "devices.IdCustemer = coustemers.ID", "LEFT");
$db->where('devices.Finsh', '1');


$db->groupBy ("devices.Finsh");
$db->groupBy ("coustemers.ID");
$custemers=$db->get('devices');

foreach ($custemers as $v) {

    $resultData['Bar'][] = array(
        'value' => $v['Finsh'],
        'highlight' => '#FF5A5E',
        'label' => $v['Name']
    );

}








echo json_encode($resultData);


?>

