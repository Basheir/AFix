<?php
//*

header('Content-Type: application/json');


$resultData = array();
include('../../config.php');


$db->join("typedevices", "devices.IDTypeDevice = typedevices.ID", "LEFT");


if (isset($_GET['s'])) {

    $db->where('Serial', $db->escape($_GET['s']));
}


if (isset($_GET['r'])) {

    $db->where('Ref', $db->escape($_GET['r']));
}


// عرض بحسب نوع الجهاز
if (isset($_GET['t'])) {

    $db->where('IDTypeDevice', (int)$_GET['t']);
    $db->where('Finsh', '0');
}


if (isset($_GET['ID'])) {
    $db->where('IdCustemer', (int)$_GET['ID']);
}


$db->orderBy("devices.Finsh", "asc");
$db->orderBy("devices.DateAdded", "asc");
echo $devicesList = $db->JsonBuilder()->get('devices', null, "*,DATEDIFF(NOW(),devices.DateAdded) AS totalDays");

//echo $db->getLastQuery();


?>

