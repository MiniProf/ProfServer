<?php
//echo $_SERVER['REQUEST_METHOD'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  /*
   * add To TLS
   * Requires SESSIONID MINUTE
   */
   include_once 'addToTLS.php';
}
elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
  /*
   * Get TLS for sessionID
   * Requires TOKEN SESSIONID
   */
   include_once 'getTLS.php';
}

?>
