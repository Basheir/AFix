<?php


/**
 * Created by PhpStorm.
 * User: pc-sales
 * Date: 6‏/5‏/2017
 * Time: 6:13 م
 */

include('./config.php');

require('./Class/Uploader.php');

$upload_dir = './imagesWarranty/';
$valid_extensions = array('gif', 'png', 'jpeg', 'jpg');

$Upload = new FileUpload('uploadfile');
$result = $Upload->handleUpload($upload_dir, $valid_extensions);

if (!$result) {
    echo json_encode(array('success' => false, 'msg' => $Upload->getErrorMsg()));

    echo json_encode($result);



} else {

    $fileName=$Upload->getFileName();
    $now=time();
    $newName="$now$fileName";
    rename("$upload_dir/$fileName", "$upload_dir/$newName");






    $Mdata = Array(
        'idDevices' => $db->escape($_GET['ID']),
        'imageurl' => $newName
    );


//$db->where('ID', $_GET['ID']);


    $infoList = $db->insert(' imagesWarranty', $Mdata);


    if ($db->count > 0) {

        $result = array(
            'suc' => true,
            'msg' => 'تمت العملية بنجاح',
            'idMsg' => 1
        );

    }
  else {

        $result = array(
            'suc' => true,
            'msg' => $db->getLastError(),
            'idMsg' => 1
        );

    }

    echo json_encode(array('success' => true,'isLoading' => $result['msg'], 'file' => $newName));



}


?>