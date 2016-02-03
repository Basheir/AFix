<?php

$resultData = '';
@$h = $_GET['h'];
include('../config.php');
include('../Class/functions.php');

$i=0;






$IDdevices = (int)$_GET['ID'];
$resultImploud = array();

$db->orderBy("ID", "DESC");
$db->where('idDevices', $IDdevices);
$devicesList = $db->get("statusdevices");



echo '<ul class="list-unstyled">';

foreach ($devicesList as $v) {

    $i++;

    $resultImploud[] = '


   <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">
            <li class="dropdown-menu-list slimscroll tasks" style="overflow: hidden; width: auto; height: 100%;">
                <ul class="list-unstyled">
                    <li>

                            <div class="task-icon badge badge-success">'.$i.'</div>
                            <span class="pull-right" > <i onclick="deleteThisStatUs(' . $v['ID'] . ',' . $IDdevices . ');" class="icon-close closeX"></i></span>
                            <p class="task-details">' . $v['title'] . '</p>
                            <span class="greenColor pull-right">' . date("m-d-y", strtotime($v['DateAdded'])) . '</span>

                    </li>
                </ul>
            </li>
        </div>



';


}


echo implode('', $resultImploud);


echo '<ul/>';

?>

