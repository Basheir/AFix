<!DOCTYPE html>
<html>
<head>
    <title>طباعة الفاتورة</title>
    <link href="css/printInVoice.css" rel="stylesheet">

</head>
<body>


<?php


/**
 * بسم الله الرحمن الرحيم
 * Created by PhpStorm.
 * User: Basheir
 * Date: 29‏/12‏/2015
 * Time: 2:09 م
 * طباعة الفاتورة
 */


$resultData = array();
include('config.php');


//$db->join("typedevices", "devices.IDTypeDevice = typedevices.ID", "LEFT");
//$devicesList = $db->where('IdCustemer', $_GET['ID']);
//$devicesList = $db->get('devices');


$InVoice = $db->rawQuery('SELECT * FROM devices INNER JOIN coustemers ON (devices.IdCustemer = coustemers.ID)  INNER JOIN typedevices ON (devices.IDTypeDevice = typedevices.ID) WHERE  devices.idDevices = ?', Array($_GET['d']));


foreach ($InVoice as $v) {


    echo "


<table>
    <thead>
    <tr>

            <img alt=\"Logo\" class='logo' src='" . IMAGEURL . "/4tech.png' height=\"60\"  width=\"150\">

    </tr>
    <tr>
        <th scope=\"col\" colspan=\"2\">فاتورة صيانة</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
  $v[Name] </td>
        <td class=\"item-price\">$v[Name]</td>
    </tr>
    <tr>
        <td>
  $v[NameDevices]</td>
        <td class=\"item-price\">نوع الجهاز </td>
    </tr>
    <tr>
        <td>
  $v[Serial] </td>
        <td class=\"item-price\">رقم تسلسلي</td>
    </tr>
    <tr>
        <td>
  $v[DateAdded]</td>
        <td class=\"item-price\">تاريخ</td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <td>$v[Comment]</td>
        <td>ملاحظة</td>
    </tr>
    <tr>
        <td>$v[Mony]</td>
        <td>مبلغ الصيانة</td>
    </tr>
    <tr>
        <td>$v[MobileNumber]</td>
        <td>رقم الهاتف:</td>
    </tr>

    </tfoot>
</table> ";


}


?>


</body>


<script type="application/javascript">
    window.print();
</script>


</html>
