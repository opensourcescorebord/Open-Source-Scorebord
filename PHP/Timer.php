<?php
include '../PHP/ConDB.php';
session_start();
ob_start();
$result = $dbC->query("SELECT Timeout_Time, Perdiod, CASE WHEN Perdiod = 1 THEN TIME_TO_SEC(timediff(now(), Start_Time)) WHEN Perdiod = 2 THEN TIME_TO_SEC(timediff(now(), Intermediate_Time)) + 45*60 End as cur_time FROM games WHERE Game_ID='$_SESSION[code]'");
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $score['gT'] = $row;
        echo json_encode($score);
  }
}
?>
