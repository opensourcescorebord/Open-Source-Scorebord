<?php
include '../PHP/ConDB.php';
session_start();
$Game_ID = $_SESSION['code'];
if(!isset($_SESSION['code'])) {//If session not registere
header("location:/Bestuurder/Controller.php"); // Redirect to login.php page
}
else //Continue to current page
header( 'Content-Type: text/html; charset=utf-8' );

$sql="UPDATE games SET Timeout= '1'WHERE Game_ID = '$Game_ID'";
mysqli_query($dbC, $sql);


?>
