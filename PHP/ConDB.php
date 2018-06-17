<?php

$dbHost = 'localhost';
$dbUser = 'ScorePi';
$dbPass = 'SDI';
$dbName = 'scorebord';
$dbC = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName)
        or die('Error Connecting to MySQL DataBase');
?>
