<?php
/**
 *  تاريخها اكبر مثلاثون يوم لعرضها في قائمة التنبيه
 */


include('../../config.php');
include('../../Class/functions.php');
include('../../json/getSetting.php');


//

$maxDate = $settingArray['maxDate'];
if ((int)$maxDate == 0) {
    // القيمة الافتراضية للتاريخ ان لم يكن صحيحا
    $maxDate = 25;
}


/**
 * معالجة عدد الاجهزة
 * @param $arr
 * @param $maxDate
 * @return int
 */

function getTotalType($arr,$maxDate){

    $count=0;

    foreach ($arr as $val){

        if ($val['totalDays']>=$maxDate){

            $count++;
        }

    }

    return $count;
}





$devicesN = $db->get('typedevices');


$devicesItems=array();

foreach ($devicesN as $value){


    $IDArray=$value['ID'];

    $db->where('IDTypeDevice',$IDArray);
    $db->where('Finsh','0');
    $q=$db->get('devices',null,"*,DATEDIFF(NOW(),DateAdded) AS totalDays");
    $c=getTotalType($q,$maxDate);


    if ($c>0){
        $devicesItems[]=array('type'=>$value['NameDevices'],'count'=>$c,'IDTypeDevice'=>$IDArray);

    }

}


echo json_encode($devicesItems);


?>

