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
      if($row['Length'] == 0){
          return $row;
      }
    }
  }
}
new GetALLSessions();
?>
