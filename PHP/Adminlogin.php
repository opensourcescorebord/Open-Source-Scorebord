<?php
session_start();
// To properly get the config.php file
$username = $_POST['username']; //Set UserName
$password = $_POST['password']; //Set Password
$msg ='';
if(isset($username, $password)) {
    ob_start();
    include 'ConDB.php'; //Initiate the MySQL connection
    // To protect MySQL injection (more detail about MySQL injection)
    $myusername = stripslashes($username);
    $mypassword = stripslashes($password);
    $myusername = mysqli_real_escape_string($dbC, $myusername);
    $mypassword = mysqli_real_escape_string($dbC, $mypassword);
    $sql="SELECT * FROM accounts WHERE Username='$myusername' and Password='$mypassword'";
    $result=mysqli_query($dbC, $sql);
    // Mysql_num_row is counting table row
    $count=mysqli_num_rows($result);

    if($count==1){
        // Register $myusername, $mypassword and redirect to file "admin.php"
        $_SESSION['login'] ="admin";
        $_SESSION['name']= $myusername;
        header("location:../Admin/Home.php");
    }
    else {
        header("location:../Admin/Login.php?msg=failed");
    }

    ob_end_flush();
}
else {
    header("location:../Admin/Login.php?msg=Please enter some username and password");
}
?>
