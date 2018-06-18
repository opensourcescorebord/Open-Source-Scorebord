<?php
include '../PHP/ConDB.php';
$result1 = $dbC->query("SELECT Team_1, Team_2, Active, Game_ID FROM games WHERE User='0' AND End_Time IS NULL");
if ($result1->num_rows > 0) {
  while ($row = $result1->fetch_assoc()) {
    $_COOKIE['Game_ID'] = $row['Game_ID'];
    $score['AcG'] = $row;
    echo json_encode($score);
  }
}
?>
