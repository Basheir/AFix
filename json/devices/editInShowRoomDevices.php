<?php

/**
 * تعديل اهمية حالة الجهاز
 */


include('../../config.php');


$result = array(
    'suc' => false,
    'msg' => 'هناك خطااعد  المحاولة لاحق',
    'idNewDevices' => 0
);


$InShowRoomDevices = '0';

$MsgImportant['0'] = 'وصل الى المعرض';
$MsgImportant['1'] = 'لم يصل الى المعرض';


$db->where('idDevices', (int)$_POST['ID']);
$res = $db->getOne("devices", 'InShowRoomDevices', 1);


if ($res['InShowRoomDevices'] == '0') {
    $important = '1';
}


if ($res['InShowRoomDevices'] == '1') {
    $important = '0';
}


$data = Array(
    'InShowRoomDevices' => $important,
);


$db->where('idDevices', (int)$_POST['ID']);
$infoList = $db->update('devices', $data, 1);
 

if ($infoList) {

    $result = array(
        'suc' => $db->count,
        'msg' => 'الجهاز ' . $MsgImportant[$important],
        'idMsg' => 1
    );

}


echo json_encode($result);


?>