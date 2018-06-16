<?php
define('DOCUMENT_ROOT',dirname(__FILE__));
include(DOCUMENT_ROOT.'/ConDB.php');
session_start();
$Game_ID = $_COOKIE['code'];

$result = $dbC->query("SELECT Timeout, Team_1, Team_2, Extended_Time, Extended, Score_1, Score_2 FROM games WHERE Game_ID = '$Game_ID'");
if ($result->num_rows > 0) {
 while ($row = $result->fetch_assoc()) {
$score['Sc'] = $row;
echo json_encode($score);
}

}

 ?>
