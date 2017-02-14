<?php
include_once '../../API.php';
class JoinSession extends API
{
  function preInit(){
    $this->POSTVarsReq = array('SESSIONID');
  }
  public function doAPI(){
    $res = $this->DB->runDBCOMMAND("getSession",array('SESSIONID'=>$_POST['SESSIONID']));
    if(mysqli_num_rows($res)!=1){
      $GLOBALS['dieSafely'](true,"Invalid Session");
    }
    $res = $this->DB->runDBCOMMAND("incrParticipants",array('SESSIONID'=>$_POST['SESSIONID']));
    return true;
  }
}
new JoinSession();
?>
