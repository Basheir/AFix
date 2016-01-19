<?php
header('Content-Type: application/json');
header('Content-Type: text/html; charset=utf-8');

include('../config.php');


$result = array(
    'suc' => false,
    'msg' => 'غير معروف حاول لاحقا' . '<br/>',
    'idNewDevices' => 0
);


$namePost = $db->escape($_POST['Name']);
$mobileNumberPost = $db->escape($_POST['MobileNumber']);
$commentPost = $db->escape($_POST['Comment']);
$IDTypeDevicePost = (int)$_POST['IDTypeDevice'];
$monyPost = (int)$_POST['Mony'];
$serialPost = $db->escape($_POST['Serial']);


/*
 * تاكد من اضافة بيانات العميل
 */
if (empty($namePost)) {

    $result['msg'] = 'تاكد من اضافة بيانات العميل';
    echo json_encode($result);

    exit();
}


/** اضافة حالة الجهاز
 * @param $ID رقم الجهاز
 * @param $db  مقبس ربط قاعدة البيانات
 */
function insertFirstStatusDevices($ID, $db)
{

    $s = Array(
        'title' => 'استلام جهاز',
        'idDevices' => $ID,

    );

    $db->insert('statusdevices', $s);
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


// حصول على رقم العميل الح
//الي
$db->where('MobileNumber', trim($mobileNumberPost));
$Coustemers = $db->getOne("Coustemers");
$IDCusremer = $Coustemers['ID'];


// iff isset Custemer
if ($IDCusremer) {


    $devicesData = Array(
        'Serial' => trim($serialPost),
        'Comment' => trim($commentPost),
        'IDTypeDevice' => $IDTypeDevicePost,
        'Mony' => $monyPost,
        'IdCustemer' => $IDCusremer
    );

    $insertNewDevices = $db->insert('Devices', $devicesData);

    if ($insertNewDevices) {
        $result['suc'] = true;
        $result['msg'] = 'تم اضافة الجهاز';
        $result['idNewDevices'] = $insertNewDevices;

        insertFirstStatusDevices($insertNewDevices, $db);


    } else {
        $result['suc'] = true;
        $result['msg'] = 'لم يتم اضافة الجهاز بطريقة صحيحة' . '<br/>' . $db->getLastError();
        $result['idNewDevices'] = $insertNewDevices;
    }


} else {

    $db->startTransaction();

    $dataCustemer = Array(
        'Name' => $_POST['Name'],
        'MobileNumber' => $_POST['MobileNumber']
    );

    $insertCoustemer = $db->insert('coustemers', $dataCustemer);


    if (!$insertCoustemer) {
        //Error while saving, cancel new record
        $result['msg'] = 'تم حذف العميل';
        //   echo $db->getLastError();

        $db->rollback();


    } else {


        $devicesData = Array(
            'Serial' => trim($serialPost),
            'Comment' => trim($commentPost),
            'IDTypeDevice' => $IDTypeDevicePost,
            'Mony' => $monyPost,
            'IdCustemer' => $insertCoustemer
        );


        $idNewDevices = $db->insert('devices', $devicesData);

        if (!$idNewDevices) {
            // echo $db->getLastError();

            $db->rollback();

        } else {
            $db->commit();
            $result['msg'] .= 'تم اضافة العميل';
        }


        insertFirstStatusDevices($idNewDevices, $db);


        if ($idNewDevices) {


            $result['suc'] = true;
            $result['idNewDevices'] = $idNewDevices;
            $result['msg'] .= '<br/>';
            $result['msg'] .= 'تم اضافة الجهاز';


        }


    }


}

//echo $db->getLastError();

echo json_encode($result);


?>