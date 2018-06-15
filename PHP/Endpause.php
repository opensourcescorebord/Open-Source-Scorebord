<?php
include '../PHP/ConDB.php';
session_start(); //Start the session
if(!isset($_SESSION['code'])) {//If session not registere
header("location:../Index.php"); // Redirect to login.php page
}
else //Continue to current page
header( 'Content-Type: text/html; charset=utf-8' );
$sql="UPDATE games SET Perdiod= '2', Intermediate_Time=Now() WHERE Game_ID = '$_SESSION[code]'";
if(mysqli_query($dbC, $sql)){
header("location:/Bestuurder/Controller.php");

}
 ?>
