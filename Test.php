<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
sleep(1);
$time = date('r');
echo "data: The server time is: {$time}\n\n";
flush();
?>
