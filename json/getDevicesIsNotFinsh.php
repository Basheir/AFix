


<div class="col-lg-12 col-md-12">
    <div class="panel info-box panel-white">
        <div class="panel-body">



            <div class="col-md-12 text-center ">
                <a class="btn btn-primary btn-lg menu-icon glyphicon glyphicon-list" href="json/exportToExcelDevicesIsNotFinsh.php">تصدير اكسل</a>
            </div>



<?php

$resultData = array();
include('../config.php');


function getDays($d)
{
    $now = time(); // or your date as well
    $your_date = strtotime($d);
    $datediff = $now - $your_date;
    return floor($datediff / (60 * 60 * 24));
}


$db->join("typedevices", "devices.IDTypeDevice = typedevices.ID", "LEFT");
$db->join("coustemers", "devices.IdCustemer = coustemers.ID", "LEFT");



$devicesList = $db->where('devices.Finsh', '0');
$db->orderBy("devices.Finsh", "asc");
$db->orderBy("devices.DateAdded", "asc");
$devicesList = $db->get('devices');
//echo $db->getLastQuery();

foreach ($devicesList as $v) {

    $IDDevices = $v['idDevices'];

    if ($v['Finsh'] == '1') {
        $isFinsh = 'panel-success';
    } else {
        $isFinsh = 'panel-danger';
    }

    $resultData[] = '

<tr>
        <td>' . $v['ID'] . '</td>
        <td>' . $v['NameDevices'] . '<p data-ID="' . $v['ID'] . '">-</p></td>
        <td>' . $v['Serial'] . '</td>
        <td>' . $v['Name'] . '</td>
        <td>' . $v['Ref'] . '</td>
        <td>' . $v['tracNumber'] . '</td>
        <td>' . $v['DateAdded'] . '</td>




        <td>

              <div class="panel-footer clearfix">
            <div class="pull-right">
               <button type="button" data-toggle="tooltip" data-placement="top" title="اضافة حالة"  onclick="showModel(' . $IDDevices . ')" class="close"   aria-label="Close"><span class="glyphicon glyphicon-plus"></span></button>
              <button type="button" data-toggle="tooltip" data-placement="top" title="اانهاء حالة الجهاز" onclick="finshDevice(' . $IDDevices . ')" class="close"   aria-label="Close"><span class="glyphicon glyphicon-ok"></span></button>
               <button type="button" data-toggle="tooltip" data-placement="top" title="طباعة الفاتورة" onclick="printDevice(' . $IDDevices . ')" class="close"   aria-label="Close"><span class="glyphicon glyphicon-print"></span></button>

            </div>
        </div>

</td>



      </tr>


        ';


}

echo '<div class="row"><table id="exported" class="table table-striped table-bordered hover"  cellspacing="0" width="100%"><thead>
      <tr>
        <th>ID</th>
        <th>نوع الجهاز
        </th>
        <th>رقم تسلسلي</th>
        <th>العميل</th>
        <th>رقم المرجع</th>
        <th>بوليصة الشحن</th>∂
        <th>تاريخ الاضافة</th>∂
        <th>ادوات</th>

      </tr>
    </thead>    <tbody>

';
echo implode(' ', $resultData);
echo '</tbody></table></div>        </div>

        </div>
    </div>
</div>';


?>


