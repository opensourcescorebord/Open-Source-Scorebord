<?php
session_start();

if(isset($_POST['sUpload'])) {

  $Banner = $_FILES['BannerImage'];
  $BannerName = $_FILES['BannerImage']['name'];
  $BannerTmpName = $_FILES['BannerImage']['tmp_name'];
  $BannerSize = $_FILES['BannerImage']['size'];
  $BannerError = $_FILES['BannerImage']['error'];
  $BannerType = $_FILES['BannerImage']['type'];

  $BannerExt = explode('.', $BannerName);
  $BannerActualExt = strtolower(end($BannerExt));

  $Rust = $_FILES['RustImage'];
  $RustName = $_FILES['RustImage']['name'];
  $RustTmpName = $_FILES['RustImage']['tmp_name'];
  $RustSize = $_FILES['RustImage']['size'];
  $RustError = $_FILES['RustImage']['error'];
  $RustType = $_FILES['RustImage']['type'];

  $RustExt = explode('.', $RustName);
  $RustActualExt = strtolower(end($RustExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if (in_array($BannerActualExt, $allowed) And in_array($RustActualExt, $allowed)){
    if ($BannerError === 0 And $RustError === 0){
      if($BannerSize <= 1000000 And $RustSize <= 1000000)  {
        $fileNameNew = uniqid().".".$BannerActualExt;
        $fileNameNew2 = uniqid().".".$RustActualExt;
        $fileDestination = '../BannerSponsoren/'.$fileNameNew;
        $fileDestination2 = '../RustSponsoren/'.$fileNameNew2;
        move_uploaded_file($BannerTmpName, $fileDestination);
        move_uploaded_file($RustTmpName, $fileDestination2);
        //header("location:../Admin/Home.php?msg=Succesful_Upload");


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
} else {
  echo "Ander probleem";
}
