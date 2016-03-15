<?php
/**
 * احضار معلومات الاجهزة وانواعها لعرضها في قائمة التنبيه
 */


include('../../config.php');
include('../../Class/functions.php');

$resultImploud = array();

$devicesN = $db->rawQuery('

    SELECT
  COUNT(devices.Finsh) AS C,
  devices.IDTypeDevice AS T,
  typedevices.NameDevices AS N,
  coustemers.Name AS cusName
FROM
  devices
  INNER JOIN typedevices ON (devices.IDTypeDevice = typedevices.ID)
  INNER JOIN coustemers ON (devices.IdCustemer = coustemers.ID)

  WHERE   devices.InShowRoomDevices = "1" AND Finsh !="1"


GROUP BY
  devices.IDTypeDevice

');


foreach ($devicesN as $v) {


    $resultImploud[] = array('type' => $v['N'], 'cusName' => $v['cusName'], 'count' => $v['C'], 'IDTypeDevice' => $v['T']);

}


//
//echo $db->getLastQuery();
//
//
//exit;
echo json_encode($resultImploud);


?>

