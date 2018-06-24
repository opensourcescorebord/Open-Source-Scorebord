<?php
include '../PHP/ConDB.php';
 $result1 = $dbC->query("SELECT Game_ID, Perdiod FROM games WHERE User='1' AND Active='1' AND End_Time IS NULL");
   if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
     $score['AcG'] = $row;
     echo json_encode($score);
   }
 }
 ?>
