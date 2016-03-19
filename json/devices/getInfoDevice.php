<?php
/**
 * احضار معلومات الجهاز 
 */


include('../../config.php');
include('../../Class/functions.php');

$i = 0;


function creatAppendMenu($v, $icon = null)
{


    if ($v == '') {
        $v = '&nbsp;';
    }


    return '  <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">
            <li class="dropdown-menu-list slimscroll tasks" style="overflow: hidden; width: auto; height: 100%;">
                <ul class="list-unstyled">
                    <li>
                            <div class="task-icon badge ">
                            <i class="glyphicon ' . $icon . '"></i>
                            </div>
                            <p class="task-details greenColor" >' . $v . '</p>

                    </li>
                </ul>
            </li>
        </div>

        ';


}


echo '<ul class="list-unstyled">';



$IDdevices = (int)$_GET['ID'];
$resultImploud = array();


echo implode('', $resultImploud);


$db->join("coustemers", "devices.IdCustemer = coustemers.ID", "LEFT");
$devicesList = $db->where('devices.idDevices', $IDdevices);
//$devicesList = $db->get('devices', 1);
$devicesN = $db->getOne('devices');



echo creatAppendMenu($devicesN['Name'], 'glyphicon-user');
echo creatAppendMenu($devicesN['MobileNumber'], 'glyphicon-phone-alt');
echo creatAppendMenu($devicesN['tracNumber'], 'glyphicon-plane');
echo creatAppendMenu($devicesN['Ref'], 'glyphicon-pushpin');
echo creatAppendMenu($devicesN['Comment'], 'glyphicon glyphicon-qrcode');
echo creatAppendMenu($devicesN['Mony'], 'glyphicon glyphicon-usd ');


echo '<ul/>';

?>

