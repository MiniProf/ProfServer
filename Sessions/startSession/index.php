<?php
include_once '../../API.php';
class StartSession extends API
{
  function preInit(){
    //$this->POSTVarsReq = array('NAME');
  }
  function generateString($length = 32){
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
  function generateSessionID(){
    while(true){
      $TOKEN = $this->generateString();
      $res = $this->DB->runDBCOMMAND("getSession",array('SESSIONID' => $TOKEN));
      if(mysqli_num_rows($res) == 0)
        break;
    }
    return $TOKEN;
  }
  public function doAPI(){
    $TOKEN = $this->generateSessionID(6);
    if(!isset($_POST['NAME'])){
      $Name = date("Y-m-d H:i:s");
    }
    else{
      $Name = $_POST['NAME'];
    }
    $res = $this->DB->runDBCOMMAND("createSession",array('ID'=>$TOKEN, 'NAME'=> $Name,'LECID'=>$this->USERID,'STARTTIME'=>time()));
    if($res === FALSE)
      $GLOBALS['dieSafely'](true,"SQL Failed");
    return (array('SESSIONID' => $TOKEN));

  }
}
new StartSession(true);
?>
