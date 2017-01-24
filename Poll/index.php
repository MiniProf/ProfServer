<?php
//echo $_SERVER['REQUEST_METHOD'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  /*
   * Add to The Poll
   * Requires ID, VOTE
   */
   include_once 'SendToPoll.php';
}
elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
  /*
   * Get Poll Statistics (Requires a Lecturer Token)
   * Requires ID
   */
   include_once './PollStats.php';
}

?>
