<?php
include_once '../API.php';
class StartSession extends API
{
  function preInit(){
    $this->POSTVarsReq = array('NAME');
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
    $TOKEN = $this->generateSessionID();

    $res = $this->DB->runDBCOMMAND("createSession",array('ID'=>$TOKEN, 'NAME'=> $_POST['NAME'],'LECID'=>$this->USERID,'STARTTIME'=>time()));
    if($res !== FALSE)
      return (array('TOKEN' => $TOKEN));
  }
}
new StartSession(true);//needs to be true when live
?>
