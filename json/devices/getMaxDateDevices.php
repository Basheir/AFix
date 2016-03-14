<?php
/**
 *  تاريخها اكبر مثلاثون يوم لعرضها في قائمة التنبيه
 */


$maxDate = 25;

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

  WHERE   DATE(devices.DateAdded) > ' . $maxDate . ' AND devices.Finsh="1"


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

