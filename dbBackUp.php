<?php
/**
 * نسخ احتياطي لقاعدة البيانات
 * User: pc-sales
 * Date: 2‏/6‏/2016
 * Time: 4:09 م
 */


require('Class/MySQLDump.php');
require('config.php');


set_time_limit(0);
$time = microtime(TRUE);
ignore_user_abort(TRUE);
$dump = new MySQLDump(new mysqli($dataInfoArray['host'] . ":$dataInfoArray[port]", $dataInfoArray['username'], $dataInfoArray['password'], $dataInfoArray['db']));
$dump->save(DIR_SYSTEM . '/b/dump' . date('Y-m-d H-i') . $time . '.sql.gz');

echo "تم اخذ نسخة احتياطية بنجاح ";


?>