<?php
//*

header('Content-Type: application/json');

$result = array(
    'suc' => false,
    'msg' => 'خطا :: حاول مرة اخرى',
    'idMsg' => 3
);


include('../config.php');
include_once('../Class/alertAPI.php');
$alertApi = new AlertApi($dataInfoArray);


/**
 * اضافة تنبيه للاجهزة
 */


if (isset($_GET['addAlert'])) {

    $q = $alertApi->addStatusDevices(array('idDevices' => (int)$_POST['ID'], 'msg' => $db->escape($_POST['msg'])));

    if ($q) {

        $result = array(
            'suc' => true,
            'msg' => 'تمت العملية بنجاح',
            'idMsg' => 1
        );

    } else {


        $result = array(
            'suc' => false,
            'msg' => $db->getLastError(),
            'idMsg' => 3
        );
    }


}


/**
 * اخفاء تنبيهات الاجهزة
 */

if (isset($_GET['hideAlert'])) {

    $q = $alertApi->setStatusAlert((int)$_POST['id'],$_POST['isShow']);


    if ($q) {

        $result = array(
            'suc' => true,
            'msg' => 'تمت العملية بنجاح',
            'idMsg' => 1
        );

    } else {


        $result = array(
            'suc' => false,
            'msg' => $db->getLastError(),
            'idMsg' => 3
        );
    }


}


/**
 * احضار تنبيهات الاجهزة
 */

if (isset($_GET['getAlert'])) {
    echo $alertApi->getAlerDevices();

    exit();
}


echo json_encode($result);


?>

