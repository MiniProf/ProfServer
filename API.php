<?php
include_once 'Validation.php';
include_once 'DBInterface.php';

header('Access-Control-Allow-Origin: *');

abstract class API
{
  protected $USER = "ANON";
  protected $TOKEN = "";
  public function __construct($allowAnon = true)
  {
    if(!$allowAnon && $_GET['token']){
      die("No Token");
    }
    $this->TOKEN = $_GET['TOKEN'];
    $this->run();
    die(json_encode($this->doAPI()));
  }
  private function run()
  {
    $DB = new DBInterface();
    $DB->runDBCOMMAND("getUser",array('TOKEN' => $this->TOKEN));
  }
  abstract function doAPI();
}
 ?>
