<?php
include_once '../../API.php';
class GetALLSessions extends API
{
  function preInit(){

  }
  public function doAPI(){
    $SessionsRes = $this->DB->runDBCOMMAND("getSessionByLecturerID",
                                         array("LECTURERID"=>$this->USERID));
    $Sessions = array();
    while ($row = mysqli_fetch_assoc($SessionsRes)){
      array_push($Sessions, $row);
    }
    return($Sessions);
  }
}
new GetALLSessions(true);
?>
