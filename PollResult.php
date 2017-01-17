<?php
include_once 'API.php';


class PollResult extends API
{
  public function doAPI(){
    $_GET['ID'] = "FiRsT";
    echo file_get_contents("./SESSIONS/" . $_GET['ID'] .".json");
  }
}
new PollResult();
 ?>
