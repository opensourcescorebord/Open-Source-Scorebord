<?php
include '../PHP/ConDB.php';
session_start(); //Start the session
if(!isset($_SESSION['code'])) {//If session not registere
header("location:../Index.php"); // Redirect to login.php page
}
else //Continue to current page
header( 'Content-Type: text/html; charset=utf-8' );
$logos = scandir("../images/", 1);
 ?>
 <head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Scorebord bestuurder</title>
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
<body>
  <div class="container">
    <div class="row h-75 justify-content-md-center">
      <div class="col">
        <img class="card-img-top" src="../images/<?php echo $logos[0]?>" alt=" ">
        <h1 id="T1" class="text-center">--</h1>
      </div>
      <div class="col">
        <img class="card-img-top" src="../images/<?php echo $logos[1]?>" alt=" ">
        <h1 id="T2" class="text-center">--</h1>
      </div>
    </div>
    <div class="row pt-5 justify-content-center">
      <div class="col-4">
        <a href="SetTime.php" class="btn btn-lg btn-primary btn-block btn-info text-center" role="button">Start Game!</a>
      </div>
  </div>


  <script type="text/javascript">
  (function getTeams() {
   <?php
   $result = $dbC->query("SELECT Team_1, Team_2 FROM games WHERE Game_ID = '$_SESSION[code]'");
   if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>
      var t1 = "<?php echo $row['Team_1'] ?>";
      var t2 = "<?php echo $row['Team_2'] ?>";
      $("#T1").html(t1);
      $("#T2").html(t2);
    <?php }?>
  <?php }?>
  }());
  </script>
  </div>
</body>
