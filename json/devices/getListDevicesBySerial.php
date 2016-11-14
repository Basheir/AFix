<?php
//*

header('Content-Type: application/json');


$resultData = array();
@$searchBy = $_GET['by'];
@$Parm = $_GET['Parm'];
@$getAll = $_GET['getAll'];
$limit = null;
@$lastID = $_GET['lastID'];

include('../../config.php');


include_once ('../../Class/DevicesApi.php');

$devicesApi=new DevicesApi($dataInfoArray);
echo $devicesApi->getDevicesBySeiral();



?>

