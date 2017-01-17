<?php
 header('Access-Control-Allow-Origin: *');
$_GET['ID'] = "FiRsT";
if($_GET['VOTE']!="A" && $_GET['VOTE']!="B" && $_GET['VOTE']!="C" && $_GET['VOTE'] != "D"){
  $_GET['VOTE']="A";
}
$Poll = json_decode(file_get_contents("./SESSIONS/" . $_GET['ID'] .".json"),true);
$Poll["results"][$_GET['VOTE']]++;
var_dump($Poll);
file_put_contents("./SESSIONS/" . $_GET['ID'] . ".json",json_encode($Poll));
?>
