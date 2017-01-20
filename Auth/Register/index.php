<?php
include_once '../../API.php';
/**
 *
 */
 if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
   $GLOBALS['dieSafely'](true,"This can only be used using POST");
 }
class Login extends API
{
  function preInit(){
    $this->POSTVarsReq = array('NAME','UNI','PASSWORD');
  }
  function doAPI(){

    //HASH PASSWORD
    $PASSHASH = strtoupper(sha1(sha1($_POST['PASSWORD'])));
    $res = $this->DB->runDBCOMMAND("createLecUser",array('NAME' => $_POST['NAME'],'UNI' => $_POST['UNI'],'PASSHASH'=>$PASSHASH));
    
    return "Success";
  }
}

new Login(false);
 ?>
