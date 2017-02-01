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
    $this->POSTVarsReq = array('NAME','PASSWORD');
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
  function doAPI(){

    //HASH PASSWORD
    $PASSHASH = strtoupper(sha1(sha1($_POST['PASSWORD'])));
    $res = $this->DB->runDBCOMMAND("userLegit",array('NAME' => $_POST['NAME'],'PASSHASH'=>$PASSHASH));
    //var_dump(mysqli_num_rows($res));
    if(mysqli_num_rows($res)!=1){
      $GLOBALS['dieSafely'](true,"User Not Recognized");
    }
    $row = mysqli_fetch_assoc($res);
    $ID = $row['ID'];

    while(true){
      $TOKEN = $this->generateString();
      $res = $this->DB->runDBCOMMAND("tokenExist",array('POSSIBLETOKEN' => $TOKEN));
      if(mysqli_num_rows($res) == 0)
        break;
    }
    $res = $this->DB->runDBCOMMAND("createToken",array('LECID'=> $ID ,'TOKEN' => $TOKEN));

    return array('Token'=>$TOKEN);
  }
}

new Login();
 ?>
