<?php
include_once '../API.php';
class EndSession extends API
{
  function preInit(){
    $this->POSTVarsReq = array('SESSIONID');
  }
  public function doAPI(){
    $SessionRes = $this->DB->runDBCOMMAND("getSession",array("SESSIONID"=>$_POST['SESSIONID']));
    if(1 != mysqli_num_rows($SessionRes)){
      $GLOBALS['dieSafely'](true,"Session not valid");
    }
    $Session = mysqli_fetch_assoc($SessionRes);
    $length = (time() - $Session['StartTime'])/60;
    $res = $this->DB->runDBCOMMAND("endSession",array('SESSIONID'=>$_POST['SESSIONID'], 'LENGTH'=> $length));
    if($res !== FALSE  && mysqli_num_rows($res) == 0)
      return (true);
    return false;
  }
}
new JoinSession(false);
?>
