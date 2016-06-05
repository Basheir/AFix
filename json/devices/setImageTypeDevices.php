<?php

include('../../config.php');


$result = array(
    'suc' => false,
    'msg' => 'هناك خطااعد  المحاولة لاحق',
    'idMsg' => 0
);


$data = Array(
    'imageUrl' => $db->escape($_POST['imageUrl']),
);


$db->where('ID', (int)$_POST['ID']);
$infoList = $db->update('typedevices', $data, 1);


if ($infoList) {

    $result = array(
        'suc' => true,
        'msg' => 'تم تعديل الصورة',
        'idMsg' => 1
    );

}


echo json_encode($result);


?>