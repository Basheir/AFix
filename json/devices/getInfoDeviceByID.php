<?php
/**
 * احضار معلومات الجهاز للتعديل
 */


include('../../config.php');


$IDdevices = (int)$_GET['ID'];


$db->join("coustemers", "devices.IdCustemer = coustemers.ID", "LEFT");
$db->join("typedevices", "devices.IDTypeDevice = typedevices.ID", "LEFT");
$devicesList = $db->where('devices.idDevices', $IDdevices);
//$devicesList = $db->get('devices', 1);
echo $db->JsonBuilder()->getOne('devices');

//echo $db->getLastQuery();

?>

