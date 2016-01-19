<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once('Class/MysqliDb.php');
// HTTPS
define('HTTPS_SERVER', '127.0.0.1/AFix/');


// معرفات الثوابت الاساسية للسكربت

define('DIR_APPLICATION', "/AFix/");
define('DIR_SYSTEM', '/Applications/XAMPP/xamppfiles/htdocs/AFix/');
define('SITURL', $_SERVER['SERVER_NAME']);
define('IMAGEDEVICES', '/Applications/XAMPP/xamppfiles/htdocs/AFix/imageDevices/');
define('IMAGEDEVICESURL', 'http://' . SITURL . DIR_APPLICATION . '/imageDevices/');
define('IMAGEURL', 'http://' . SITURL . DIR_APPLICATION . '/images/');
define('IMAGSFOLDR', SITURL . '/images/');


// متغيرات الاتصال بقاعدة البيانات
$db = new MysqliDb (Array(
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'db' => 'AFix',
    'port' => 3306,
    'prefix' => '',
    'charset' => 'utf8'));


?>
