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
  typedevices.NameDevices AS N
FROM
  devices
  INNER JOIN typedevices ON (devices.IDTypeDevice = typedevices.ID)

  WHERE   devices.InShowRoomDevices = "1" 


GROUP BY
  devices.IDTypeDevice

');


foreach ($devicesN as $v) {


    $resultImploud[] = array('type' => $v['N'], 'count' => $v['C'], 'IDTypeDevice' => $v['T']);

}


//
//echo $db->getLastQuery();
//
//
//exit;
echo json_encode($resultImploud);


?>

