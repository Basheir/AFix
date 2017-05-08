

<?php
/**
 * احضار معلومات الجهاز 
 */


include('../../config.php');
include('../../Class/functions.php');







$IDdevices = (int)$_GET['ID'];


echo '<div id="sizeBox"></div>';
echo '<div id="sizeBox"></div>';


$devicesList = $db->where('idDevices', $IDdevices);
$devicesN = $db->get('imagesWarranty');

if(!count($devicesN)){

    echo 'لايوجد صور تابع لهذا الجهاز';

}


foreach ($devicesN as $key=>$val){

   echo "<image src='./imagesWarranty/$val[imageUrl]' height='100%' width='100%' />";

}



?>

