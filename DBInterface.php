<?php

/**
 *
 */
class DBInterface extends AnotherClass
{
  $COMMANDS = array();
  function __construct(){
    $COMMANDS = json_decode(file_get_contents("./DBCommands.json"));
  }
  function getDBCommands(){
    return $COMMANDS
  }
  function runDBCOMMAND($COMMAND, $ArrayOfParams){
    //format of ArrayOfParams unkknown
    var_dump($this->COMMANDS);
  }
}
$DB = new DBInterface();
$DB->runDBCOMMAND();

 ?>
