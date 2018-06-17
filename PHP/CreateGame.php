<?php
session_start();
include 'ConDB.php';// To properly get the config.php file
$Team_1 = $_POST['Team_1']; //Set Team 1 name
$Team_2 = $_POST['Team_2']; //Set Team 2 name
$Sport = $_POST['sport']; //Set Sport about to be played

if(isset($Team_1, $Team_2, $Sport)) {
    array_map('unlink', glob('../images/*'));


    $file = $_FILES['T1L'];
    $fileName = $_FILES['T1L']['name'];
    $fileTmpName = $_FILES['T1L']['tmp_name'];
    $fileSize = $_FILES['T1L']['size'];
    $fileError = $_FILES['T1L']['error'];
    $fileType = $_FILES['T1L']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

      $file2 = $_FILES['T2L'];
      $fileName2 = $_FILES['T2L']['name'];
      $fileTmpName2 = $_FILES['T2L']['tmp_name'];
      $fileSize2 = $_FILES['T2L']['size'];
      $fileError2 = $_FILES['T2L']['error'];
      $fileType2 = $_FILES['T2L']['type'];

      $fileExt2 = explode('.', $fileName);
      $fileActualExt2 = strtolower(end($fileExt));

      $allowed = array('jpg', 'jpeg', 'png');
      if (in_array($fileActualExt, $allowed) And in_array($fileActualExt2, $allowed)){
        if ($fileError === 0 And $fileError2 === 0){
          if($fileSize <= 1000000 And $fileSize2 <= 1000000)  {
            if ($fileSize >= 0){
            $fileNameNew = $_SESSION['code']."1".".".$fileActualExt;
            $fileDestination = '../images/'.$fileNameNew;
              move_uploaded_file($fileTmpName, $fileDestination);

          }
          if ($fileSize >= 0){
            $fileNameNew2 = $_SESSION['code']."2".".".$fileActualExt2;

            $fileDestination2 = '../images/'.$fileNameNew2;

            move_uploaded_file($fileTmpName2, $fileDestination2);
          }
          if ($fileSize == 0 && $fileSize2 == 0)
          {
            array_map('unlink', glob('../images/*'));
          }

          } else {
            echo "Your file is too big!";
          }
        }
         else {
          echo "There was an error uploading your file";
        }
      } else {
        echo "Cant upload files of this type";
      }


    // To protect MySQL injection (more detail about MySQL injection)
    $thisTeam_1 = stripslashes($Team_1);
    $thisTeam_2 = stripslashes($Team_2);
    $thisSport = stripslashes($Sport);
    $thisTeam_1 = mysqli_real_escape_string($dbC, $thisTeam_1);
    $thisTeam_2 = mysqli_real_escape_string($dbC, $thisTeam_2);
    $thisSport = mysqli_real_escape_string($dbC, $thisSport);
    $sql = "UPDATE games SET Team_1 = '$thisTeam_1', Team_2 = '$thisTeam_2', Sport_FK = '$thisSport' WHERE Game_ID = '$_SESSION[code]'";
    //$sql="UPDATE games (Team_1, Team_2, Sport_FK)
//VALUES ('$thisTeam_1', '$thisTeam_2', '$thisSport')";
if (mysqli_query($dbC, $sql)) {
  header("location:../Bestuurder/Startgame.php");

} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($dbC);
}
}
?>
