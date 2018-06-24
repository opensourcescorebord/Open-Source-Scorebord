<?php
      include '../PHP/ConDB.php';
      session_start();
      $logos = scandir("../images/", 1);
      $banners = scandir("../BannerSponsoren/", 1);
      if(!isset($_SESSION['code'])){
      $_SESSION['code'] = $_GET['Game_ID'];
    }
      ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<link rel="icon" href="http://i218.photobucket.com/albums/cc233/shoopuff1/Opensource%20Scorebord/Geercon%202.png">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  <style>
  h1{
font-size: 1750% !important;
}
h2 {
  font-size: 400%;
}
h3 {
  font-size: 250%;
}



	</style>
    <title>Scorebord Home</title>
  </head>
  <body background="http://i218.photobucket.com/albums/cc233/shoopuff1/Opensource%20Scorebord/CvL%20double%20Logo%2045%20degrees%20xsm.png" style="height: 80px">




<div class="container">
<br/>
<!-- Reclame Banner Header-->
	<div class="shadow-lg card">
	<img src="http://i218.photobucket.com/albums/cc233/shoopuff1/Opensource%20Scorebord/SDI.png" class = "rounded" class="img-fluid" alt="Responsive image" style="height: 80px">
	</div><br/>

<div class="shadow-lg jumbotron 	background-color:#000000">

<div class="row">
  <div class="col-12 shadow-lg card">
    <div class="row">
      <div class="col-5">
        <img class="card-img-top" src="../images/<?php echo $logos[1]?>" onError="this.onerror=null;this.src='/Stock/Thuis.png'" >
        <div class="">
          <h3 class="text-center T1">---</h3>
        </div>
      </div>
      <div class="col-2">
                      <h3 class="text-center font-weight-bold text-black-50" > TIME</h3>

                      <h3 class="text-center"> <p><span class="time"></span></p>
                      </h3>

                      <h3 class="text-center font-weight-bold text-dark p-0 m-0"> Period </h3>
                      <h3 class= "text-center font-weight-bold text-dark Period"> - </h3>
      </div>
      <div class="col-5">
        <img class="card-img-top" src="../images/<?php echo $logos[1]?>" onError="this.onerror=null;this.src='/Stock/Uit.png'" >
        <div class="">
          <h3 class="text-center T2">---</h3>
        </div>
      </div>
    </div>
  </div>

</div>
<div class="row">
  <div class="col-6">
    <div class="shadow-lg card"><h1 class="display-1 text-center font-weight-bold"><span class=" S1">-	</span></h1></div>
  </div>
  <div class="col-6">
    <div class="shadow-lg card"><h1 class="display-1 text-center font-weight-bold"><span class=" S2">-	</span></h1></div>
  </div>

</div>


  <!-- Reclame Banner Footer-->
	<div class="shadow-lg card">
			<img src="http://i218.photobucket.com/albums/cc233/shoopuff1/Opensource%20Scorebord/hanze%20banner.png" class = "rounded" class="img-fluid" alt="Responsive image" style="height: 80px">
	</div>

 </div>
</div>







    <script>

     <?php
     include '../PHP/ConDB.php';
      $result = $dbC->query("SELECT Perdiod ,CASE WHEN Perdiod = 1 THEN TIME_TO_SEC(timediff(now(), start_time)) WHEN Perdiod = 2 THEN TIME_TO_SEC(timediff(now(), Intermediate_Time)) + 45*60 End as cur_time
     FROM games WHERE Game_ID='$_SESSION[code]'");;
      if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) { ?>
         var distance = <?php echo $row['cur_time'] ?>;
         var period = <?php echo $row['Perdiod'] ?>;
       <?php }}?>
       $(".Period").text(period);
       var myVar = setInterval(myTimer, 1000);
       function myTimer() {
         // Time calculations for days, hours, minutes and seconds
         var minutes = Math.floor(distance / 60);
     var seconds = distance - minutes * 60;
          distance = distance + 1;
         // Output the result in an element with id="demo"
          $(".time").text(minutes + "m " + seconds + "s ");

        //  document.getElementById("demo").innerHTML = minutes;

         //If the count down is over, write some text
         if (minutes >= 45 && period == 1) {
             clearInterval(myTimer);
             $(".time").text("TimeOut");
             window.location.replace('Adverts.php');
         }
         if (minutes >= 90 && period == 2){
           session_destroy();
           clearInterval(myTimer);
           $(".time").text("Gameover");
           window.location.replace('Waitingroom.php');
         }
     }


     var getTeams = function () {
      <?php
      $result = $dbC->query("SELECT Team_1, Team_2 FROM games WHERE Game_ID='$_SESSION[code]'");
      if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) { ?>
         var Team_1 = "<?php echo $row['Team_1'] ?>";
         var Team_2 = "<?php echo $row['Team_2'] ?>";
         $(".T1").text(Team_1);
         $(".T2").text(Team_2);
       <?php }?>
     <?php }?>
     };
     getTeams();
     var Score_1;
     var Score_2;
     (function getScore() {
       $.ajax({ type: "POST",
                   url: "../PHP/Scoreload.php?Game_ID=<?php echo $_SESSION['code'] ?>",
                   dataType: "json",
                   success : function(data)
                   {
                     $('.S1').text(data.Sc.Score_1);
                     $('.S2').text(data.Sc.Score_2);
                   }
          });
     setTimeout(getScore, 1000);
   }());
     </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
