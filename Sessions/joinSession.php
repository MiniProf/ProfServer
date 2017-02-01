<?php
include_once '../API.php';
class JoinSession extends API
{
  function preInit(){
    $this->POSTVarsReq = array('SESSIONID');
  }
  public function doAPI(){
    $res = $this->DB->runDBCOMMAND("incrParticipants",array('SESSIONID'=>$_POST['SESSIONID']));
    if($res !== FALSE  && mysqli_num_rows($res) == 0)
      return (true);
    return false;
  }
}
new JoinSession();
?>
