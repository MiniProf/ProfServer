<?php
include_once '../API.php';

class PollStats extends API
{
  function preInit(){
    $this->GETVarsReq = array('ID');
  }
  public function doAPI(){
    $res = $this->DB->runDBCOMMAND("getPollData",array('POLLID'=> $_GET['ID']));
    if($res !== FALSE)
      return (mysqli_fetch_assoc($res));

  }
}

new PollStats(false);//needs to be true when live

?>
