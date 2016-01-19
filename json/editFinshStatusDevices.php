<?php

include('../config.php');


$result = array(
    'suc' => false,
    'msg' => 'هناك خطااعد  المحاولة لاحق',
    'idNewDevices' => 0
);


$w = $db->where('idDevices', (int)$_GET['ID']);
$st = $db->getOne("devices");

//echo $st['Finsh'];


if ($st['Finsh'] == '0') {
    $newStatUs = '1';
    $idMsg = 1;
    $msg = 'تم تسليم الجهاز للعميل';
} else {
    $newStatUs = '0';
    $idMsg = 4;
    $msg = 'تم اعادة تسليم الجهاز';

}


$data = Array(
    'Finsh' => $newStatUs,
);


$db->where('idDevices', (int)$_GET['ID']);
$infoList = $db->update('devices', $data, 1);


if ($infoList) {

    $result = array(
        'suc' => true,
        'msg' => $msg,
        'idMsg' => $idMsg
    );

}


echo json_encode($result);


?>