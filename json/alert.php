<?php
    //*

    header('Content-Type: application/json');

    $result = [
        'suc'   => false,
        'msg'   => 'خطا :: حاول مرة اخرى',
        'idMsg' => 3
    ];

    include('../config.php');
    include_once('../Class/alertAPI.php');
    $alertApi = new AlertApi($dataInfoArray);










    /**
     * اضافة تنبيه للاجهزة
     */
    if (isset($_GET['addAlert'])) {

        $q = $alertApi->addStatusDevices([ 'idDevices' => (int) $_POST['ID'], 'msg' => $db->escape($_POST['msg']) ]);

        if ($q) {

            $result = [
                'suc'   => true,
                'msg'   => 'تمت العملية بنجاح',
                'idMsg' => 1
            ];

        }
        else {

            $result = [
                'suc'   => false,
                'msg'   => $db->getLastError(),
                'idMsg' => 3
            ];
        }


    }

    /**
     * اخفاء تنبيهات الاجهزة
     */

    if (isset($_GET['hideAlert'])) {

        $q = $alertApi->setStatusAlert((int) $_POST['id'], $_POST['isShow']);

        if ($q) {

            $result = [
                'suc'   => true,
                'msg'   => 'تمت العملية بنجاح',
                'idMsg' => 1
            ];

        }
        else {

            $result = [
                'suc'   => false,
                'msg'   => $db->getLastError(),
                'idMsg' => 3
            ];
        }


    }

    /**
     * احضار تنبيهات الاجهزة
     */

    if (isset($_GET['getAlert'])) {
        echo $alertApi->getAlerDevices();

//   echo $alertApi->getLastQuery();
        exit();
    }

    echo json_encode($result);

?>

