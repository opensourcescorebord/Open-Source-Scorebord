<?php
include '../PHP/ConDB.php';
ob_start();
session_start();
$result1 = $dbC->query("SELECT Timeout FROM games WHERE Game_ID = '$_SESSION[Game_ID]'");
if ($result1->num_rows > 0) {
  while ($row = $result1->fetch_assoc()) {
      $score['gT'] = $row;
        echo json_encode($score);

  }
}
?>
