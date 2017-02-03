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
    if($Session['Length'] === 0){
      $length = (time() - $Session['StartTime'])/60;
      $res = $this->DB->runDBCOMMAND("endSession",array('SESSIONID'=>$Session['ID'], 'LENGTH'=> $length));
      if($res !== FALSE )
        return (true);
    }
    $GLOBALS['dieSafely'](true,"Session Has Been Ended");
  }
}
new EndSession(true);
?>
