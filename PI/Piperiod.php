<?php
include '../PHP/ConDB.php';
session_start();
// $result = $dbC->query("SELECT Perdiod FROM games WHERE Game_ID = 'OLPCi'");
// if ($result->num_rows > 0) {
//  while ($row = $result->fetch_assoc()) {
// $active['Ac'] = $row;
// }}
//  echo json_encode($active);
 $result1 = $dbC->query("SELECT Perdiod FROM games WHERE Game_ID='$_SESSION[code]'");
   if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
     $FK = $row['Perdiod'];
     echo json_encode($FK);
   }
 }
 ?>
