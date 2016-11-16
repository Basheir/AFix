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








$db->join("typedevices", "devices.IDTypeDevice = typedevices.ID", "LEFT");


if ($searchBy == 's') {

    $db->where('Serial', $db->escape($_GET['c']));
}


if ($searchBy == 'r') {

    $db->where('Ref', $db->escape($_GET['c']));
}


// عرض بحسب نوع الجهاز
if ($searchBy == 't') {

    $db->where('IDTypeDevice', (int)$_GET['t']);
    $db->where('Finsh', '0');
}


if ($searchBy == 'ID') {
    $db->where('IdCustemer', (int)$_GET['ID']);
}


if ($searchBy == 'idDevices') {
    $db->where('idDevices', (int)$_GET['ID']);
}



if ($Parm == 'InShowRoom') {
    $db->where('InShowRoomDevices', '1');
}


if ($Parm == 'MaxDate') {
    $db->where('DATEDIFF(NOW(),devices.DateAdded)', $settingArray['maxDate'], ">=");
}


if ($Parm == 'Important') {
    $db->where('important', '1');
}


if ($Parm == 'notFinsh') {
    $db->where('devices.Finsh', '0');
}

if ($getAll == 'true') {
    $db->where('devices.Finsh', '1');
    $db->where('idDevices', $lastID, ">");
    $limit = 8;
}





$db->orderBy("devices.Finsh", "asc");
$db->orderBy("devices.DateAdded", "asc");
$devicesList = $db->JsonBuilder()->get('devices ', $limit, '*,DATEDIFF(NOW(),devices.DateAdded) AS totalDays ');


echo $devicesList;
//echo $db->getLastQuery();


?>

