<?php
header('Content-Type: application/json');
header('Content-Type: text/html; charset=utf-8');

include('../../config.php');


$result = array(
    'suc' => false,
    'msg' => 'غير معروف حاول لاحقا' . '<br/>'
);


$namePost = $db->escape($_POST['Name']);
$mobileNumberPost = $db->escape($_POST['MobileNumber']);
$commentPost = $db->escape($_POST['Comment']);
$IDTypeDevicePost = (int)$_POST['IDTypeDevice'];
$idDevicesPost = (int)$_POST['idDevices'];
$monyPost = (int)$_POST['Mony'];
$serialPost = $db->escape($_POST['Serial']);
$IdCustemer = $db->escape($_POST['IdCustemer']);
$warrantyBy = $db->escape($_POST['warrantyBy']);


/*
 * تاكد من اضافة بيانات العميل
 */
if (empty($namePost)) {

    $result['msg'] = 'تاكد من اضافة بيانات العميل';
    echo json_encode($result);

    exit();
}



// علي حساب العميل
if (!isset($_POST['byCostemer'])) {

    $byCostemer = '0';
}
else {
    $byCostemer = '1';
}



/*
 * تاكد من نوعية الجهاز موجودة ام لا
 */
$db->where('ID', $IDTypeDevicePost);
$IDTypeDevices = $db->get('typeDevices', 1);


if (!$IDTypeDevices) {

    $result['msg'] = 'الرجاء اختيار نوع جهاز صحيح';
    echo json_encode($result);
    exit();
}


$custemerData = Array(
    'Name' => $namePost,
    'MobileNumber' => $mobileNumberPost
);


$db->where('ID', $IdCustemer);
$insertNewDevices = $db->update('coustemers', $custemerData);


// تعديل بيانات الجهاز

$devicesData = Array(
    'Serial' => trim($serialPost),
    'Comment' => trim($commentPost),
    'IDTypeDevice' => $IDTypeDevicePost,
    'byCostemer' => $byCostemer,
    'warrantyBy' => $warrantyBy,
    'Mony' => $monyPost
);

$db->where('idDevices', $idDevicesPost);
$insertNewDevices = $db->update('devices', $devicesData);


if ($insertNewDevices) {
    $result['suc'] = $insertNewDevices;
    $result['msg'] = 'تم تعديل الجهاز';


} else {
    $result['suc'] = true;
    $result['msg'] = 'لم يتم اضافة الجهاز بطريقة صحيحة' . '<br/>' . $db->getLastError();

}


//echo $db->getLastError();

echo json_encode($result);


?>