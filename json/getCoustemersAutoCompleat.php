<?php

/**
 *
 *
 *
 */

$resultData=array();
include('../config.php');




$infoList = $db->where("Name LIKE '%$_POST[c]%' ");
$infoList = $db->get('Coustemers');




foreach ($infoList as $v) {

    $resultData[]=array(
        'Name'=>$v['Name'],
        'ID'=>$v['ID'],
        'MobileNumber'=>$v['MobileNumber'],
        'DateAdded'=>$v['DateAdded']


    );

}








echo json_encode($resultData);

?>