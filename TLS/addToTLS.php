<?php
include_once '../API.php';
/**
 *
 */
class AddToTLS extends API
{
  function preInit(){
    //$this->VarsReq = array();
    $this->POSTVarsReq = array('MINUTE','SESSIONID','OPTION');
  }
  function doAPI(){
    //check OPTION
    if($_POST["OPTION"] != "Slow" && $_POST["OPTION"] != "Fast" && $_POST["OPTION"] != "NH"){
      $GLOBALS['dieSafely'](true,"Invalid Option");
    }
    // TODO:Figure OUT MINUTE
    $res = $this->DB->runDBCOMMAND("getSession",array('SESSIONID'=>$_POST['SESSIONID']));
    if(mysqli_num_rows($res)!=1){
      $GLOBALS['dieSafely'](true,"Invalid Session");
    }
    $result = mysqli_fetch_assoc($res);
    $MINUTE = intval( round( ( time() - $result['StartTime'] ) / 60 ) );
    //$now =
    var_dump($len);
    $res1 = $this->DB->runDBCOMMAND("getPreciseTLS",array('SESSIONID' => $_POST['SESSIONID'],'MINUTE'=>$MINUTE));
    if($res1 == false){
      $GLOBALS['dieSafely'](true,"Dunno");
    }
    if($res1->num_rows == 1){
      //UPDATE
      $res = $this->DB->runDBCOMMAND("submitTLS",array('SESSIONID' => $_POST['SESSIONID'],'MINUTE'=>$MINUTE,'OPINION'=>$_POST["OPTION"]));
    }
    else {
      $res = $this->DB->runDBCOMMAND("createTLS",array('SESSIONID' => $_POST['SESSIONID'],'MINUTE'=>$MINUTE,'OPINION'=>$_POST["OPTION"]));
    }

    if($res == false){
      $GLOBALS['dieSafely'](true,"SQL ERROR ON INSERT");
    }
    else {
      return true;
    }
  }
}

new AddToTLS();
 ?>
