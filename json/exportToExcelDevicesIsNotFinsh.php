<?php

/**
 * تصدير العملاء الى اكسل
 */


include('../config.php');


// When executed in a browser, this script will prompt for download
// of 'test.xls' which can then be opened by Excel or OpenOffice.

require '../Class/php-export-data.class.php';

$exporter = new ExportDataExcel('browser', 'Coustemers.xls');

$exporter->initialize(); // starts streaming data to web browser


$db->join("typedevices", "devices.IDTypeDevice = typedevices.ID", "LEFT");
$db->join("coustemers", "devices.IdCustemer = coustemers.ID", "LEFT");


$devicesList = $db->where('devices.Finsh', '0');
$db->orderBy("devices.Finsh", "asc");
$db->orderBy("devices.DateAdded", "asc");
$devicesList = $db->get('devices');


$exporter->addRow(array('نوع الجهاز', 'سيريال', 'العميل', 'تاريخ الاستلام','مرجع','بوليصة الشحن :'));

foreach ($devicesList as $v) {

    $IDDevices = $v['idDevices'];
    $nd = $v['NameDevices'];
    $s = $v['Serial'];
    $n = $v['Name'];
    $d = $v['DateAdded'];
    $r=$v['Ref'];
    $t=$v['tracNumber'];

    $exporter->addRow(array($nd, $s, $n, $d,$r,$t));

}


$exporter->finalize(); // writes the footer, flushes remaining data to browser.

?>



