<?php
include '../PHP/ConDB.php';
session_start();
$Game_ID = $_SESSION['code'];

$Time = $_GET['Time'];

$sql="UPDATE games SET Timeout_Time= Timeout_Time + '$Time' WHERE Game_ID = '$Game_ID'";
mysqli_query($dbC, $sql);
 ?>
