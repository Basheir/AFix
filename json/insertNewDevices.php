<?php

include('../config.php');


$result = array(
    'suc' => false,
    'msg' => 'خطا :: حاول مرة اخرى',
    'idMsg' => 3
);


if (!trim($_POST['NameDevices'])) {

 $result['msg'] = 'قم باضافة نوع الجهاز';

 echo json_encode($result);
 exit();

}


include '../Class/ImageResize.php';


$ImgDir = IMAGEDEVICES . $_POST['ImageUrl'];
$ext = pathinfo($ImgDir, PATHINFO_EXTENSION);
$time=time().'.'.$ext;

use \Eventviva\ImageResize;
$image = new ImageResize($ImgDir);
$image->resizeToBestFit(300, 300);
$image->save(IMAGEDEVICES . $time);






$Mdata = Array(
    'NameDevices' => $db->escape($_POST['NameDevices']),
    'ImageUrl' => $time
);


//$db->where('ID', $_GET['ID']);


$infoList = $db->insert('typeDevices', $Mdata);


if ($db->count > 0) {

 $result = array(
     'suc' => true,
     'msg' => 'تمت العملية بنجاح',
     'idMsg' => 1
 );

}


echo json_encode($result);


?>