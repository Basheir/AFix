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

include('../../json/getSetting.php');





$db->where('Serial','%'.$_GET['c'], "LIKE");



$db->join("coustemers", "devices.IdCustemer = coustemers.ID", "LEFT");
$devicesList = $db->JsonBuilder()->get('devices');


echo $devicesList;
//echo $db->getLastQuery();


?>

