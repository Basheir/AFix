<?php

include('../config.php');


$result = array(
    'suc' => false,
    'msg' => 'هناك خطااعد  المحاولة لاحق',
    'idNewDevices' => 0
);


$data = Array(
    'Ref' => $db->escape($_POST['title']),
);


$db->where('idDevices', (int)$_POST['ID']);
$infoList = $db->update('devices', $data, 1);


if ($infoList) {

    $result = array(
        'suc' => true,
        'msg' => 'تم اضافة رقم المرجع',
        'idMsg' => 1
    );

}


echo json_encode($result);


?>