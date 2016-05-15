<?php
//*

header('Content-Type: application/json');


$resultData = array();
@$searchBy = $_GET['by'];
@$Parm = $_GET['Parm'];

include('../../config.php');


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


if ($Parm == 'InShowRoom') {
    $db->where('InShowRoomDevices', '1');
}


if ($Parm == 'MaxDate') {
    $db->where('DATEDIFF(NOW(),devices.DateAdded)', 25, ">=");
}


if ($Parm == 'Important') {
    $db->where('important', '1');
}


if ($Parm == 'notFinsh') {
    $db->where('devices.Finsh', '0');
}





$db->orderBy("devices.Finsh", "asc");
$db->orderBy("devices.DateAdded", "asc");
echo $devicesList = $db->JsonBuilder()->get('devices', null, "*,DATEDIFF(NOW(),devices.DateAdded) AS totalDays");
// $db->get('devices', null, "*,DATEDIFF(NOW(),devices.DateAdded) AS totalDays");

//echo $db->getLastQuery();


?>

