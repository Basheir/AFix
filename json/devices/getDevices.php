<?php
    header('Content-Type: application/json');

    $result = [
        'suc'   => false,
        'msg'   => 'خطا :: حاول مرة اخرى',
        'idMsg' => 3
    ];

    include('../../config.php');
    include_once('../../Class/DevicesApi.php');
    include_once('../../Class/Functions.php');
    $devicesApi = new DevicesApi($dataInfoArray);

    /**
     * اضافة تنبيه للاجهزة
     */
    if (isset($_GET['track'])) {

        $q       = $devicesApi->getDevices(12);
        $jsonMsg = jsonMsg($q);
    }

    if (isset($_GET['setTrack'])) {

        $d       = [ 'trackNumber' => $_POST['trackNumber'] ];
        $q       = $devicesApi->setTrackDevices($d, $_POST['idDevices']);
        $jsonMsg = jsonMsg($q);
    }

    echo json_encode([ 'msg' => $jsonMsg, 'data' => $q ]);

?>

