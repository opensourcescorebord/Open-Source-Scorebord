<?php
session_start();

include 'ConDB.php'; //Initiate the MySQL connection

if ($_POST['Score'] == '1+')
{
  $sql="UPDATE games SET Score_1 = Score_1 + 1
  WHERE Game_ID = '$_SESSION[code]';";
  $result=mysqli_query($dbC, $sql);
}
if ($_POST['Score'] == '1-')
{
  $sql="UPDATE games SET Score_1 = Score_1 - 1
  WHERE Game_ID = '$_SESSION[code]';";
  $result=mysqli_query($dbC, $sql);
}
if ($_POST['Score'] == '2+')
{
  $sql="UPDATE games SET Score_2 = Score_2 + 1
  WHERE Game_ID = '$_SESSION[code]';";
  $result=mysqli_query($dbC, $sql);
}
if ($_POST['Score'] == '2-')
{
  $sql="UPDATE games SET Score_2 = Score_2 - 1
  WHERE Game_ID = '$_SESSION[code]';";
  $result=mysqli_query($dbC, $sql);
}
?>
