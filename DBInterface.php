<?php

/**
 *
 */
class DBInterface
{
  public $COMMANDS = array();
  function __construct(){
    $this->COMMANDS = json_decode(file_get_contents("./DBCommands.json"),true);
  }
  function getDBCommands(){
    return $this->COMMANDS;
  }
  function runDBCOMMAND($COMMAND, $ArrayOfParams = Array()){
    //format of ArrayOfParams unkknown
    var_dump($this->COMMANDS);
    if($Command = $this->getCommand($COMMAND,$ArrayOfParams)){
      var_dump($Command);
    }
    else{
      die("Unknown DB COMMAND");
    }
  }
  function getCommand($COMMAND,$ArrayOfParams){
    foreach ($this->COMMANDS as $value) {
      if($value["name"] == $COMMAND){
        $sql = $value["SQL"];
        foreach ($value["params"] as $param) {
          if(strpos($ArrayOfParams[$param],";")!== false){
            return false;
          }
          $sql = str_replace($param,$ArrayOfParams[$param],$sql);
        }
        return $sql;
      }
    }
    return false;
  }
}
$DB = new DBInterface();
$DB->runDBCOMMAND("getPollData",Array("POLLID"=>"23895"));

 ?>
