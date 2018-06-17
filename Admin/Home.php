<?php
include '../PHP/ConDB.php';
/*Controleer login*/
session_start();
if(!isset($_SESSION['name'])) {
  header("location:../Index.php");
}
else //Continue to current page
/*----------------*/
header( 'Content-Type: text/html; charset=utf-8' );

if (isset($_GET["msg"]) && $_GET["msg"] == 'Succesful') {
  $message = "Succes!";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Scorebord Login</title>
  <link rel="icon" href="http://i218.photobucket.com/albums/cc233/shoopuff1/Opensource%20Scorebord/HampK%20Icon%20A.png">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <link rel="icon" href="../../../../favicon.ico">
<style media="screen">
#ex1Slider .slider-selection {
background: #BABABA;
}
</style>
</head>
<body class="bg-light">

     <div class="shadow-lg jumbotron" style="background-image: url('../Stock/BG.jpeg'); background-size: 100%;">

     <div class="container" >
      <h2 class="shadow-lg bg-white text-dark font-weight-bold text-center" style="opacity: 0.75"> Admin Home Screen </h2>
      <p class="shadow-lg bg-white text-dark font-weight-bold text-center" style="opacity: 0.75"> Sponsoren, Vorige spellen, Account beheer</p>
     </div>
    </div>


<div class="container">
  <div class="row">
    <div class="col">
      <div class="card shadow-lg p-4">
        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#Sponsoren" >
          Sponsoren
        </button> <br/>

        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#nog-zon-ding">
          Vorige spellen
        </button> <br/>

        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#jenge-knopje-JENGE">
          Account beheer
        </button> <br/>

        <a href="../PHP/Logout.php" class="btn btn-info" >Log uit</a>
      </div>
    </div>
  </div>
</div>


<!-- Modal 1 -->
<div class="modal fade" id="Sponsoren" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Sponsoren</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form class="form-group" action="../PHP/SponsorUpload.php" method="post" enctype="multipart/form-data">
    <div class="modal-body">

        <label for="BannerImage"><span class="lead font-weight-bold">Banner sponsor </span><span class="small">(-- x --)  (jpg, png, jpeg)</span> </label>
        <input  type="file" class="form-control-file" name="BannerImage">
        <label for="RustImage"><span class="lead font-weight-bold">Rust sponsor </span><span class="small">(16 x 9)  (jpg, png, jpeg)</span></label>
        <input type="file" class="form-control-file" name="RustImage" >
    </div>
    <div class="modal-footer">
      <button name="sUpload" type="submit" class="btn btn-primary">Uploaden</button>
      </form>
    </div>
  </div>
</div>
</div>

<!-- Modal 2 -->
<div class="modal fade" id="nog-zon-ding" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Vorige spellen</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <?php
$result = $dbC->query("SELECT Team_1, Team_2 , Score_1, Score_2, End_Time FROM games");
if ($result->num_rows > 0) {
  echo '<div>';
  echo '<table class="table">';
		echo '<tr><th scope="col">Team 1</th><th scope="col">Team 2</th><th scope="col">Score 1</th><th scope="col">Score 2</th><th scope="col">Eind Tijd</th></tr>';
	while ($row = $result->fetch_assoc()) {
    echo "<tr class=''>";
				echo '<td>'. $row['Team_1'] .'</td>';
        echo '<td>'. $row['Team_2'] .'</td>';
        echo '<td>'. $row['Score_1'] .'</td>';
        echo '<td>'. $row['Score_2'] .'</td>';
        echo '<td>'. $row['End_Time'] .'</td>';
			echo '</tr>';
		}
		echo '</table><br />';
    echo '</div>';
	}
  ?>
    </div>
  </div>
</div>
</div>

<!-- Modal 3 -->
<div class="modal fade" id="jenge-knopje-JENGE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Delete/Create administrator accounts</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form class="form-group" action="../PHP/CreDelaccounts.php" method="post">
      <div class="modal-body">
        <div class="input-group">
          <input type="text" class="form-control" name="user" placeholder="Username">
          <input type="text" class="form-control" name="pass" placeholder="Password">
          <input type="text" class="form-control" name="RlName" placeholder="Full Name">
        </div>

      </div>
      <div class="modal-footer">
        <button name="Delete" type="submit" class="btn btn-secondary" >Delete</button>
        <button name="Create" type="submit" class="btn btn-primary">Create</button>
      </div>
    </form>
  </div>
</div>
</div>

</div>






  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
