<?php

/**
 *
 *عرض قائمة العملاء في الجهة اليمين
 *
 */

$resultData=array();
include('../config.php');





//$db->orderBy ("ID","DESC");
//
//$infoList = $db->get('Coustemers');

$custemerList=$db->rawQuery('SELECT
  coustemers.Name,
  coustemers.MobileNumber,
  coustemers.DateAdded,
  coustemers.ID,
  devices.IdCustemer,
  COUNT(devices.IdCustemer) AS c,
  devices.Finsh
FROM
  coustemers
  INNER JOIN devices ON (coustemers.ID = devices.IdCustemer)
GROUP BY
  coustemers.Name,
  coustemers.ID,
  devices.IdCustemer,
  devices.Finsh
  order by devices.Finsh,
  coustemers.DateAdded


  ');





foreach ($custemerList as $v) {

    $resultData[]=array(
        'Name'=>$v['Name'],
        'ID'=>$v['ID'],
        'MobileNumber'=>$v['MobileNumber'],
        'DateAdded'=>date('d-m-Y', strtotime($v['DateAdded']))


    );

}








echo json_encode($resultData);





//SELECT
//  coustemers.Name,
//  coustemers.ID,
//  devices.IdCustemer,
//  COUNT(devices.IdCustemer) AS c,
//  devices.Finsh
//FROM
//  coustemers
//  INNER JOIN devices ON (coustemers.ID = devices.IdCustemer)
//GROUP BY
//  coustemers.Name,
//  coustemers.ID,
//  devices.IdCustemer,
//  devices.Finsh
//  order by devices.Finsh



?>


