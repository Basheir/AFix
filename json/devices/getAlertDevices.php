<?php
//*

header('Content-Type: application/json');


@$getAll = $_GET['getAll'];
@$lastID = $_GET['lastID'];
@$show=(int)$_GET['isShow'];
@$id=(int)$_GET['id'];
include('../../config.php');


include_once ('../../Class/alertAPI.php');

$devicesApi=new DevicesAlertApi($dataInfoArray);

if (isset($_GET['getDevices'])){
     echo $devicesApi->getAlerDevices();
}


if (isset($show) and $id>0){
   echo  $devicesApi->setStatusDevices($id,$show);
}

?>

