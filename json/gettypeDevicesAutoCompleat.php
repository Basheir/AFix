<?php

/**
 *
 *
 *
 */

$resultData=array();
include('../config.php');


if (trim($_POST['d']) != null) {
    $infoList = $db->where("NameDevices LIKE '%$_POST[d]%' ");

}

$infoList = $db->get('typeDevices');




foreach ($infoList as $v) {

    $resultData[]=array(
        'NameDevices'=>$v['NameDevices'],
        'ID'=>$v['ID'],
        'imageUrl' => IMAGEDEVICESURL . $v['imageUrl']


    );

}








echo json_encode($resultData);

?>