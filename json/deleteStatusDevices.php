<?php

include('../config.php');


$result = array(
    'suc' => false,
    'msg' => 'خطا :: حاول مرة اخرى',
    'idMsg' => 3
);


if (!trim($_POST['ID'])) {

    $result['msg'] = 'الرجاء اضافة حالة صحيحة';

    echo json_encode($result);
    exit();

}


//$db->where('ID', $_GET['ID']);

$db->where('ID', (int)$_POST['ID']);
if ($db->delete('statusdevices')) {

    $result = array(
        'suc' => true,
        'msg' => 'تمت العملية بنجاح',
        'idMsg' => 1
    );

}


echo json_encode($result);


?>