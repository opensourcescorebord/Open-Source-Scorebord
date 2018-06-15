<?php



if(isset($_POST['code'])){

	session_start();

    include 'ConDB.php';

	$code = $_POST['code'];
	$code = stripcslashes($code);
	$code = mysqli_real_escape_string($dbC, $code);



    $sql="select * from games where Game_ID='".$code."'";

    $result=mysqli_query($dbC, $sql);

    if(mysqli_num_rows($result)==1){

    	$_SESSION['code']= $code;

        $sql="UPDATE games SET User = '1'WHERE Game_ID='".$code."'";

        $result=mysqli_query($dbC, $sql);


		header('location: /Bestuurder/GameSettings.php');
       exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
      exit();
    }
}

?>
