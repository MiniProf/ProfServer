<?php
//echo $_SERVER['REQUEST_METHOD'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  /*
   * Submit a Review
   * Requires SESSIONID, REVIEW
   */
   include_once 'SubmitReview.php';
}
elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
  /*
   * Get Lecturer Reviews for a SESSION (Requires a Lecturer Token)
   * Requires TOKEN SESSIONID
   */
   include_once 'GetReviews.php';
}

?>
