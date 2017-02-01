<?php
include_once '../API.php';
/**
 *
 */
class SubmitReview extends API
{
  function preInit(){
    //$this->VarsReq = array();
    $this->POSTVarsReq = array('REVIEW','SESSIONID');
  }
  function doAPI(){

    //HASH PASSWORD
    $res = $this->DB->runDBCOMMAND("submitReview",array('SESSIONID' => $_POST['SESSIONID'],'REVIEW'=>$_POST['REVIEW']));
    if($res == false){
      $GLOBALS['dieSafely'](true,"SQL ERROR");
    }
  }
}

new SubmitReview();
 ?>
