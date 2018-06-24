<?php
  session_start();
  include_once '../PHP/randomcode.php';
  include 'ConDB.php';
    $result = $dbC->query("SELECT Game_ID FROM games WHERE User = '0' AND Start_Time IS NULL;");
	          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
              $_SESSION['code'] = $row['Game_ID'];
              header("location:/Bestuurder/GameSettings.php");
            }

  }
 ?>
