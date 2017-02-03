<?php
include_once '../../API.php';
class GetALLSessions extends API
{
  function preInit(){
    $this->GETVarsReq = array('LECID');
  }
  public function doAPI(){
    $SessionsRes = $this->DB->runDBCOMMAND("getSessionByLecturerID",
                                         array("LECTURERID"=>$_POST['LECID']));
    $Sessions = array();
    while ($row = mysqli_fetch_assoc($SessionsRes)){
      if($row['Length'] == 0){
          return $row;
      }
    }
    return null;
  }
}
new GetALLSessions();
?>
