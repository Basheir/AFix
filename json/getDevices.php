<?php
//*

header('Content-Type: application/json');



$resultData = array();
include('../config.php');


function getDays($d)
{
    $now = time(); // or your date as well
    $your_date = strtotime($d);
    $datediff = $now - $your_date;
    $num = floor($datediff / (60 * 60 * 24));

    if ($num == -1) {

        return 'اليوم';
    } else {
        return $num + 1;
    }


}


$db->join("typedevices", "devices.IDTypeDevice = typedevices.ID", "LEFT");




if (isset($_GET['s'])) {

    $devicesList = $db->where('Serial',$_GET['s']);
}


if (isset($_GET['r'])) {

    $devicesList = $db->where('Ref',$_GET['r']);
}



if ((int)$_GET['ID'] != 0) {
    $devicesList = $db->where('IdCustemer', (int)$_GET['ID']);
}


$db->orderBy("devices.Finsh", "asc");
$db->orderBy("devices.DateAdded", "asc");
$devicesList = $db->get('devices');


foreach ($devicesList as $v) {

    $IDDevices = $v['idDevices'];

    if ($v['Finsh'] == '1') {
        $isFinsh = 'panel-success';
        $redColor = 'greenColor';
    } else {
        $isFinsh = 'panel-danger';
        $redColor = 'redColor';

    }


    $tools = '

        <button type="button" data-toggle="tooltip" data-placement="top" title="اضافة حالة"
                    onclick="showModel(' . $IDDevices . ')" class="close" aria-label="Close"><span
                    class="glyphicon glyphicon-plus toolsHeader"></span></button>

            <button type="button" data-toggle="tooltip" data-placement="top" title="اانهاء حالة الجهاز"
                    onclick="finshDevice(' . $IDDevices . ')" class="close" aria-label="Close"><span
                    class="glyphicon glyphicon-ok ' . $redColor . '  toolsHeader"></span></button>

            <button type="button" data-toggle="tooltip" data-placement="top" title="طباعة الفاتورة"
                    onclick="printDevice(' . $IDDevices . ')" class="close" aria-label="Close"><span
                    class="glyphicon glyphicon-print toolsHeader"></span></button>

 <button type="button" data-toggle="tooltip" data-placement="top" title="اضافة رقم المرجع"
                    onclick="editRefDevices(' . $IDDevices . ')" class="close" aria-label="Close"><span
                    class="glyphicon  glyphicon-pushpin toolsHeader"></span></button>


                    <button type="button" data-poload="json/getStatusDevices.php?h=true&ID=' . $IDDevices . '"
                     class="close" aria-label="Close"><span
                    class="glyphicon glyphicon glyphicon-comment toolsHeader"></span></button>


 <button  type="button" data-toggle="tooltip" data-placement="top" title="بوليصة الشحن"
                    onclick="editTracNumber(' . $IDDevices . ')" class="close" aria-label="Close"><span
                    class="glyphicon glyphicon-plane toolsHeader"></span></button>


 <button type="button"  data-toggle="tooltip" data-placement="top" title="تعديل مبلغ الصيانة"
                    onclick="editMonyDevices(' . $IDDevices . ')" class="close" aria-label="Close"><span
                    class="glyphicon glyphicon-usd  toolsHeader"></span></button>






    ';

    $resultData[] = '

<div class="col-sm-3">
    <div class="panel  ' . $isFinsh . '">
        <div class="panel-heading">

            <p class="panel-title">' . $v['NameDevices'] . '</p>



                    <button type="button" data-toggle="tooltip" data-poload="json/devices/getInfoDevice.php?&ID=' . $IDDevices . '" data-placement="top" title="معلومات الجهاز"
                    class="close" aria-label="Close"><span
                    class="fa fa-info-circle   toolsHeader"></span></button>



            <span data-toggle="tooltip"
             data-placement="top"
             title="تاريخ الاستلام -->  ' . $v['DateAdded'] . '"
             class="badge pull-right badge-success">' . getDays($v['DateAdded']) . '</span>

        </div>

        <div class="panel-body">

            <div class="imgListDevices">
                <img  src="' . IMAGEDEVICESURL . $v['imageUrl'] . '" alt="img">
            </div>

        </div>

        <div class="panel-footer clearfix">
            <div class="pull-right">


            </div>
'.$tools.'

        </div>

    </div>
</div>

        ';


}

echo '<div class="row">';
echo implode(' ', $resultData);
echo '</div>';


?>

