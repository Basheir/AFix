<?php
/**
 * Created by PhpStorm.
 * User: pc-sales
 * Date: 19‏/5‏/2016
 * Time: 5:37 م
 */

@$requType = $_GET['reqType'];


define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/config.php');


if ($requType == 'json') {
    echo $db->JsonBuilder()->get('setting ');

} else {
    $settingArray = $db->getOne('setting ');

}


?>
