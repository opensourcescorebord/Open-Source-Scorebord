<?php
include '../PHP/ConDB.php';
if (!isset($_COOKIE['code'])) {
  $Game_ID = $_SESSION['code'];
} else {
  $Game_ID = $_GET['code'];
}


$result = $dbC->query("SELECT Timeout, Team_1, Team_2, Extended_Time, Extended, Score_1, Score_2 FROM games WHERE Game_ID = '$Game_ID'");
if ($result->num_rows > 0) {
 while ($row = $result->fetch_assoc()) {
$score['Sc'] = $row;
echo json_encode($score);
} else {
  echo "Error no results"
}

} else {
  echo "Error no rows"
}

 ?>
