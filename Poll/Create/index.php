<?php
include_once '../../API.php';
class StartPoll extends API
{
  function preInit(){
    $this->POSTVarsReq = array('SESSIONID');
  }
  public function doAPI(){
    $res = $this->DB->runDBCOMMAND("createPoll",array('SESSIONID'=> $_POST['SESSIONID']));
    if($res === FALSE)
      $GLOBALS['dieSafely'](true,$this->DB->getError());
    return (array('POLLID' => $this->DB->getInsertID()));

  }
}
new StartPoll(true);
?>
