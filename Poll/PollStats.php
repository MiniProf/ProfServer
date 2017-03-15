<?php
include_once '../API.php';

class PollStats extends API
{
  function preInit(){
    $this->GETVarsReq = array('SESSIONID');
  }
  public function doAPI(){
    $res = $this->DB->runDBCOMMAND("getPollData",array('SESSIONID'=> $_GET['SESSIONID']));
    if($res !== FALSE)
      return (mysqli_fetch_assoc($res));

  }
}

new PollStats(true);//needs to be true when live

?>
