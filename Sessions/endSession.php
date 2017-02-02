<?php
include_once '../API.php';
class EndSession extends API
{
  function preInit(){
    $this->POSTVarsReq = array('SESSIONID');
  }
  public function doAPI(){
    
    $res = $this->DB->runDBCOMMAND("endSession",array('SESSIONID'=>$_POST['SESSIONID'], 'LENGTH'=> ));
    if($res !== FALSE  && mysqli_num_rows($res) == 0)
      return (true);
    return false;
  }
}
new JoinSession(false);
?>
