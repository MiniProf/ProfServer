<?php
//this does a mysqli connection and puts it in $DBConnection
include ('DBConnection.php');
/**
 *
 */
class DBInterface
{
  public $COMMANDS = array();
  private $DBConnection;
  function __construct(){
    $this->COMMANDS = json_decode(file_get_contents(dirname(__FILE__) . "/DBCommands.json"),true);
    $this->DBConnection = $GLOBALS['DBConnection'];
  }
  public function getDBCommands(){
    return $this->COMMANDS;
  }
  public function runDBCOMMAND($COMMAND, $ArrayOfParams = Array()){
    //format of ArrayOfParams unkknown
    //var_dump($this->COMMANDS);
    if($Command = $this->getCommand($COMMAND,$ArrayOfParams))
      return$this->DBConnection->query($Command);

    die("Unknown DB COMMAND");
    }
  public function getCommand($COMMAND,$ArrayOfParams){
    foreach ($this->COMMANDS as $value) {
      if($value["name"] == $COMMAND){
        $sql = $value["SQL"];
        foreach ($value["params"] as $param) {
          if(strpos($ArrayOfParams[$param],";")!== false){
            return false;
          }
          $sql = str_replace("%" . $param . "%",$ArrayOfParams[$param],$sql);
        }
        //$GLOBALS['dieSafely'](true,$sql);
        return $sql;
      }
    }
    return false;
  }
}
 ?>
