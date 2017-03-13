<?php
include_once '../API.php';

class SendToPoll extends API
{
  function preInit(){
    $this->GETVarsReq = array('VOTE','SESSIONID');
  }
  public function doAPI(){
    $VOTE = strtoupper($_GET['VOTE']);
    if($VOTE!="A" && $VOTE!="B" && $VOTE!="C" && $VOTE != "D")
      $GLOBALS['dieSafely'](true,"Invalid Vote");

    $res = $this->DB->runDBCOMMAND("addToPoll",array('SESSIONID'=> $_GET['SESSIONID'] ,'VOTE' => $VOTE));
    if($res !== FALSE)
      return "Submitted";
    $GLOBALS['dieSafely'](true,"SQL Fail");
  }
}

new SendToPoll();

?>
