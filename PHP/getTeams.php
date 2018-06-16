<?php
include '../PHP/ConDB.php';
session_start();
ob_start();
$result = $dbC->query("SELECT Team_1, Team_2 FROM games WHERE Game_ID='$_COOKIE[code]'");
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $score['Team'] = $row;
        echo json_encode($score);
  }
}
?>
