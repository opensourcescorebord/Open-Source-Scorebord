<?php
include '../PHP/ConDB.php';
session_start();
$result1 = $dbC->query("SELECT Active, Game_ID FROM games WHERE End_Time IS NULL");
if ($result1->num_rows > 0) {
  while ($row = $result1->fetch_assoc()) {
    $_SESSION['Game_ID'] = $row['Game_ID'];
    $score['AcG'] = $row;
    echo json_encode($score);
  }
}
?>
