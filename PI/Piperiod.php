<?php
include '../PHP/ConDB.php';
 $result1 = $dbC->query("SELECT Perdiod FROM games WHERE Game_ID='$_COOKIE[code]'");
   if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
     $FK = $row['Perdiod'];
     echo json_encode($FK);
   }
 }
 ?>
