<?php
/**
 * احضار التعليقات لمشاكل الجهاز
 */
include('../../config.php');

//
@$p = $_POST['notie-input-field'];

if (trim($p) != null) {
    $infoList = $db->where("Comment LIKE '$_POST[$p]' ");

}


$db->groupBy('title');
echo $db->jsonBuilder()->get('statusdevices', null, 'title');

 
?>