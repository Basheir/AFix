<?php

include('../../config.php');


$result = array(
    'suc' => false,
    'msg' => 'خطا :: حاول مرة اخرى',
    'idMsg' => 3
);


if (empty($_POST['msg'])) {

    $result['msg'] = 'الرجاء اضافة حالة صحيحة';

    echo json_encode($result);
    exit();

}


$Mdata = Array(
    'idDevices' => (int)$_POST['ID'],
    'msg' => $db->escape($_POST['msg'])
);


//$db->where('ID', $_GET['ID']);


$infoList = $db->insert('alert', $Mdata);


if ($db->count > 0) {

    $result = array(
        'suc' => true,
        'msg' => 'تمت العملية بنجاح',
        'idMsg' => 1
    );

}
else{

   
    $result = array(
        'suc' => false,
        'msg' => $db->getLastError(),
        'idMsg' => 1
    );
}


echo json_encode($result);


?>