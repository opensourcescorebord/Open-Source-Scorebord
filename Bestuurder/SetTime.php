<?php
include '../PHP/ConDB.php';
session_start(); //Start the session
if(!isset($_SESSION['code'])) {//If session not registere
header("location:../Index.php"); // Redirect to login.php page
}
else //Continue to current page
header( 'Content-Type: text/html; charset=utf-8' );

$result1 = $dbC->query("SELECT Sport_FK FROM games WHERE Game_ID = '$_SESSION[code]'");
  if ($result1->num_rows > 0) {
   while ($row = $result1->fetch_assoc()) {
    $FK = $row['Sport_FK'];
    echo $FK;
  }
}
$result2 = $dbC->query("SELECT Total_Time, Periods FROM sports inner join games on Sport_ID = Sport_FK WHERE sport_FK = $FK");
  if ($result2->num_rows > 0) {
   while ($row = $result2->fetch_assoc()) {
    $T_Time = $row['Total_Time'];
    $P = $row['Periods'];
    $P_Time = ($T_Time/$P);
  }
}

$sql="UPDATE games SET Perdiod= '1',User= '1',Active='1', Start_Time=Now() WHERE Game_ID = '$_SESSION[code]'";
if(mysqli_query($dbC, $sql)){
header("location:/Bestuurder/Controller.php");

}
 ?>
