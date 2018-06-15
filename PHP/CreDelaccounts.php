<?php
session_start();

if(isset($_POST['Create']) Or isset($_POST['Delete'])) {
  $username = $_POST['user']; //Set UserName
  $password = $_POST['pass'];
  $realName = $_POST['RlName'];

  if(isset($_POST['Create'])) {
    if(isset($username, $password, $realName)) {
        ob_start();
        include 'ConDB.php'; //Initiate the MySQL connection
        // To protect MySQL injection (more detail about MySQL injection)
        $myusername = stripslashes($username);
        $mypassword = stripslashes($password);
        $myrealName = stripslashes($realName);
        $myusername = mysqli_real_escape_string($dbC, $myusername);
        $mypassword = mysqli_real_escape_string($dbC, $mypassword);
        $myrealName = mysqli_real_escape_string($dbC, $myrealName);
        $sql="INSERT INTO accounts (Username, Password, Realname) VALUES ('$myusername', '$mypassword', '$myrealName')";
        $result=mysqli_query($dbC, $sql);
        header("location:../Admin/Home.php?msg=Succesful");

  } else{
    header("location:../Admin/Home.php?msg=FillEveryField!");
  }
}
  if(isset($_POST['Delete'])) {
    if(isset($username, $password)) {
        ob_start();
        include 'ConDB.php'; //Initiate the MySQL connection
        // To protect MySQL injection (more detail about MySQL injection)
        $myusername = stripslashes($username);
        $mypassword = stripslashes($password);
        $myusername = mysqli_real_escape_string($dbC, $myusername);
        $mypassword = mysqli_real_escape_string($dbC, $mypassword);
    $sql="DELETE FROM accounts WHERE Username='$myusername' and Password='$mypassword'";
    $result=mysqli_query($dbC, $sql);
    header("location:../Admin/Home.php?msg=Succesful");
  }
}
} else {
  header("location:../Admin/Home.php?msg=ERROR!!");
}
 ?>
