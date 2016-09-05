<?php



include('../../config.php');

echo $db->JsonBuilder()->getOne('setting');

//echo $db->getLastQuery();

?>

