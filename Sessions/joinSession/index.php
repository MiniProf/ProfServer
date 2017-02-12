<?php
include_once '../../API.php';
class JoinSession extends API
{
  function preInit(){
    $this->POSTVarsReq = array('SESSIONID');
  }
  public function doAPI(){
    $res = $this->DB->runDBCOMMAND("incrParticipants",array('SESSIONID'=>$_POST['SESSIONID']));
    return $res;
  }
}
new JoinSession();
?>
