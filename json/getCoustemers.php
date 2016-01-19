<?php

/**
 *
 *
 *
 */

$resultData=array();
include('../config.php');




$searchBy=array('n'=>'Name','m'=>'MobileNumber','s'=>'Serial');

$get=$db->escape($_GET['by']);

$getCustemer=$db->escape($_GET['c']);

if(!array_key_exists($get,$searchBy)){


    echo 'Errorrr::';
   exit();
}



    $db->where("$searchBy[$get] LIKE '%$getCustemer%' ");
   // $db->orWhere("MobileNumber LIKE '%$_GET[c]%' ");

    $Custemers = $db->get('Coustemers');

//echo $db->getLastQuery();



foreach ($Custemers as $v) {

    $resultData[]=array(
        'Name'=>$v['Name'],
        'ID'=>$v['ID'],
        'MobileNumber'=>$v['MobileNumber'],
        'DateAdded'=>$v['DateAdded']


    );

}








echo json_encode($resultData);

?>