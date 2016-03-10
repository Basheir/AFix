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


$important = '0';

$MsgImportant['0'] = 'غير مهم';
$MsgImportant['1'] = 'مهم';


$db->where('idDevices', (int)$_POST['ID']);
$res = $db->getOne("devices", 'important', 1);


if ($res['important'] == '0') {
    $important = '1';
}


if ($res['important'] == '1') {
    $important = '0';
}


$data = Array(
    'important' => $important,
);


$db->where('idDevices', (int)$_POST['ID']);
$infoList = $db->update('devices', $data, 1);


if ($infoList) {

    $result = array(
        'suc' => true,
        'msg' => 'تم تعديل حالة الاهمية الى ' . $MsgImportant[$important],
        'idMsg' => 1
    );

}


echo json_encode($result);


?>