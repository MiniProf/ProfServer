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
      $GLOBALS['dieSafely'](true,"Invalid OPTION");
    }
    $res1 = $this->DB->runDBCOMMAND("getPreciseTLS",array('SESSIONID' => $_POST['SESSIONID'],'MINUTE'=>$_POST['MINUTE']));
    if($res1 == false){

    }
    if($res1->num_rows == 1){
      //UPDATE
      $res = $this->DB->runDBCOMMAND("submitTLS",array('SESSIONID' => $_POST['SESSIONID'],'MINUTE'=>$_POST['MINUTE'],'OPINION'=>$_POST["OPTION"]));
    }
    else {
      $res = $this->DB->runDBCOMMAND("createTLS",array('SESSIONID' => $_POST['SESSIONID'],'MINUTE'=>$_POST['MINUTE'],'OPINION'=>$_POST["OPTION"]));
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
