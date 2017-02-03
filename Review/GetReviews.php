<?php
include_once '../API.php';
/**
 *
 */
class GetReviews extends API
{
  function preInit(){
    $this->GETVarsReq = array('SESSIONID');
  }
  function doAPI(){

    //HASH PASSWORD
    $res = $this->DB->runDBCOMMAND("getReviews",array('SESSIONID' => $_GET['SESSIONID']));

    //var_dump($res);
    $resultsJSON = array();
    while($row = mysqli_fetch_assoc($res)){
      array_push($resultsJSON, $row['Quote']);
    }
    return $resultsJSON;
  }
}

new GetReviews(true);
 ?>
