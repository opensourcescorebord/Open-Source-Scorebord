<?php
include '../PHP/ConDB.php';
session_start();
if(!isset($_SESSION['code'])) {//If session not registere
header("location:../"); // Redirect to login.php page
}
else //Continue to current page
header( 'Content-Type: text/html; charset=utf-8' );

$sql="UPDATE games SET User='0', Timeout='2', Timeout_Time='0', Extended='0', active='0', End_Time=now() WHERE Game_ID = '$_SESSION[code]'";
if(mysqli_query($dbC, $sql)){
  session_destroy();
  header("location:../");

}
