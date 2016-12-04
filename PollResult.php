<?php
 header('Access-Control-Allow-Origin: *');  
$_GET['ID'] = "FiRsT";
echo file_get_contents("./SESSIONS/" . $_GET['ID'] .".json");

 ?>
