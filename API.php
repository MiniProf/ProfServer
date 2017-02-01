<?php
include_once 'Validation.php';
include_once 'DB/DBInterface.php';

header('Access-Control-Allow-Origin: *');
error_reporting(-1);
ini_set('display_errors', 'On');

$GLOBALS['dieSafely'] = function($err,$message){
  $array = array('error' => $err, 'msg' => $message);
  die(json_encode($array));
};
if($_SERVER['REQUEST_METHOD']=="OPTIONS"){
header("");
}
abstract class API
{
  protected $USER = "ANON";
  protected $USERID = "";
  protected $DB;
  protected $TOKEN = "";
  protected $GETVarsReq = array();
  protected $POSTVarsReq = array();
  public function __construct($allowAnon = true)
  {
    if(!$allowAnon && !isset($_GET['TOKEN'])){
      $GLOBALS['dieSafely'](true,"No Token");
    }
    $this->preCheck();
    if(!$allowAnon){
        $this->TOKEN = $_GET['TOKEN'];
        $var = mysqli_fetch_assoc($this->DB->runDBCOMMAND("getUserName",array("TOKEN"=>$this->TOKEN)));
        $this->USER = $var["Name"];
        $this->USERID = $var["ID"];
    }
    $this->preInit();
    $GLOBALS['dieSafely'](false,$this->doAPI());
  }
  private function preCheck()
  {
    $this->DB = new DBInterface();
    foreach ($this->GETVarsReq as $value) {
      if(!isset($_GET[$value]))
        $GLOBALS['dieSafely'](true,"This Require $value to be set via GET");
    }
    foreach ($this->POSTVarsReq as $value) {
      if(!isset($_POST[$value]))
        $GLOBALS['dieSafely'](true,"This Require $value to be set via POST");
    }
  }
  protected function preInit(){

  }
  abstract function doAPI();
}

 ?>
