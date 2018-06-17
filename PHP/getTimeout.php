<?php
include '../PHP/ConDB.php';
$result = $dbC->query("SELECT Timeout AS Tout FROM games WHERE Game_ID = '$_COOKIE[code]'");
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
      $results['To'] = $row;
        echo json_encode($results);

  }
}
?>
