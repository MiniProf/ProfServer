<?php
include_once '../API.php';
class StartSession extends API
{
  function preInit(){
    $this->POSTVarsReq = array('NAME');
  }
  public function doAPI(){
    $res = $this->DB->runDBCOMMAND("createSession",array('NAME'=> $_POST['NAME'],'LECID'=>$this->USERID,'STARTTIME'=>"NOW()"));
    if($res !== FALSE)
      return (true);
  }
}
new PollStats(true);//needs to be true when live
?
