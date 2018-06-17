<?php
include '../PHP/ConDB.php';
session_start();
if (!isset($_SESSION['code']))	{
	$Game_ID = $_COOKIE['code'];
} else {
	$Game_ID = $_SESSION['code'];
}


$result = $dbC->query("SELECT Timeout, Extended_Time, Extended, Score_1, Score_2 FROM games WHERE Game_ID = '$Game_ID'");
if ($result->num_rows > 0) {
 while ($row = $result->fetch_assoc()) {
$score['Sc'] = $row;
echo json_encode($score);
}
} else{
	echo "ERROR 2";
}

 ?>
