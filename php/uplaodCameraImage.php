<?php
/**
 * Created by PhpStorm.
 * User: pc-sales
 * Date: 25‏/4‏/2016
 * Time: 10:29 م
 */


$encoded_data = $_POST['mydata'];
$binary_data = base64_decode($encoded_data);

// save to server (beware of permissions)
$result = file_put_contents('webcam.jpg', $binary_data);
if (!$result) die("Could not save image!  Check file permissions.");


?>