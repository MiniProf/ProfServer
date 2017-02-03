<?php
include_once '../API.php';
/**
 *
 */
class GetTLS extends API
{
  function preInit(){
    $this->GETVarsReq = array('SESSIONID');
  }
  function doAPI(){
    $res1 = $this->DB->runDBCOMMAND("getSession",array('SESSIONID' => $_GET['SESSIONID']));
    $length = mysqli_fetch_assoc($res1)["Length"];
    var_dump($length);

    $res = $this->DB->runDBCOMMAND("getTLS",array('SESSIONID' => $_GET['SESSIONID']));

    //var_dump($res);
    $resultsJSON = array();
    $lastTime = 0;
    while($row = mysqli_fetch_assoc($res)){
      while($lastTime+1 <= $row["Minute"]){
        array_push($resultsJSON,array('time' => $lastTime,'TooFast' => 0,'TooSlow' => 0,'NeedHelp' => 0 ));
        $lastTime++;
      }
      array_push($resultsJSON,array('time' => $lastTime,'TooFast' => $row["noFast"],'TooSlow' => $row["noSlow"],'NeedHelp' => $row["noNH"] ));
      $lastTime++;
    }
    if($length!=0){
      while($lastTime<=$length){
        array_push($resultsJSON,array('time' => $lastTime,'TooFast' => 0,'TooSlow' => 0,'NeedHelp' => 0 ));
        $lastTime++;
      }
    }
	/*

	const data = [
	  { time: '1', "Too Fast": 0, TooSlow: 0, NeedHelp: 0 },
	  { time: '2', TooFast: 0, TooSlow: 6, NeedHelp: 10  },
	  { time: '3', TooFast: 0, TooSlow: 16, NeedHelp: 15 },
	  { time: '4', TooFast: 3, TooSlow: 18, NeedHelp: 17  },
	  { time: '5', TooFast: 6, TooSlow: 19, NeedHelp: 27 },
	  { time: '6', TooFast: 13, TooSlow: 19, NeedHelp: 36  },
	  { time: '7', TooFast: 15, TooSlow: 19, NeedHelp: 39 },
	  { time: '8', TooFast: 15, TooSlow: 34, NeedHelp: 44  },
	  { time: '9', TooFast: 20, TooSlow: 38, NeedHelp: 45 },
	  { time: '10', TooFast: 30, TooSlow: 41, NeedHelp: 53  },
	];

	*/
    return $resultsJSON;
  }
}

new GetTLS(false);
 ?>
