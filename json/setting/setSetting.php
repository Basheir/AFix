<?php


include('../../config.php');


$data = array('maxDate' => (int)$_POST['maxDate'],'search'=>$_POST['searchID']);

//$db->where('idDevices', (int)$_POST['ID']);
$infoList = $db->update('setting', $data);

if ($infoList) {
    echo 'Ok';
} else {
    echo 'Error';
}


?>