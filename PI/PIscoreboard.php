<?php
session_start();
include '../PHP/conDB.php';
$logos = scandir("../images/", 1);

if(!isset($_SESSION['code'])){
  if(!isset($_GET['Game_ID'])){
    header("location:/PI/PIwaitingroom.php");
  }
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
  <script type="text/javascript" src="../JS/jquery.innerfade.js"></script>
  <!-- Bootstrap & JQuery-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <link href="../CSS/jquery.eatoast.css" rel="stylesheet">
  <script src="../JS/jquery.eatoast.js"></script>



  <style>
  body,html {
    height: 100%;
    background-image: url("http://i218.photobucket.com/albums/cc233/shoopuff1/Opensource%20Scorebord/CvL%20double%20Logo%2045%20degrees%20xsm.png");
    overflow:hidden;
  }

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
<body>

  <div class="container m-1 w-100 h-100 mw-100">
    <!-- <div class="row w-100">
    <div class="col-12 mx-auto">



  </div>
</div> -->
<div class="row align-items-center mw-75 h-75">
  <div class="col-12 align-self-center mw-100 shadow-lg">
    <div id="advert" class="mb-5 w-100 py-3">

      <?php
      $files = glob('../BannerSponsoren/*.{jpg,png,gif}', GLOB_BRACE);
      foreach($files as $file) {
        echo '
        <div  class="container position-relative">
        <img class="w-100 rounded" src='.$file.' alt="Nothin" >
        </div>';
      }
      ?>



    </div>

      <div class="row align-self-center mw-100">
        <div class="col-2">

          <div class="shadow-lg card">
            <img class="card-img-top" src="../images/<?php echo $logos[1]?>" alt="../images/stock.jpg">
            <div class="card-body">
              <h3 class="text-center T1">---</h3>
            </div>
          </div>

        </div>
        <!-- Tweede kaart -->

        <div class="col-8">
<div class="row">
  <div class="col-4">
    <div class="shadow-lg card"><h1 class="display-1 text-center font-weight-bold"><span class=" S1">-	</span></h1></div>
  </div>
  <div class="col-4 mw-100">
    <div class="shadow-lg card">
                  <h2 class="text-center font-weight-bold text-black-50" > TIME</h6>

                  <h2 class="text-center"> <p><span class="time"></span></p>
                  </h2>

                  <h2 class="text-center font-weight-bold text-dark p-0 m-0"> Period </h2>
                  <h2 class= "text-center font-weight-bold text-dark Period"> - </h2>
    </div>
  </div>
  <div class="col-4">
    <div class="shadow-lg card"><h1 class="display-1 text-center font-weight-bold"><span class="S2">-	</span></h1></div>
  </div>

</div>
          <!-- <div class="shadow-lg card"> -->
            <!-- <div class="card-body" > -->


              <!-- <h2 class="text-center font-weight-bold text-black-50"> SCORE</h2> -->
              <!-- <div class="shadow-lg card"><h1 class="display-1 text-center font-weight-bold"><big><span class=" S1">-	</span></h1></div> -->
              <!-- <h1 class="display-1 text-center font-weight-bold"><big><span class=" S1">-	</span> -->
                <!-- <span class="">:	</span> -->




                <!-- <h1 class="card-text"></h1> -->
              </div>
            <!-- </div> -->

          <!-- </div> -->

          <!-- Derde kaart -->

          <div class="col-2">
            <div class="shadow-lg card">

              <img class="card-img-top" src="../images/<?php echo $logos[0] ?>" alt="stock.jpg">
              <div class="card-body">
                <h3 class="text-center T2">--- </h3>
              </div>
            </div>

          </div>
        </div>
  </div>
</div>




<script>
var Add = 0;
var Ext = 0;
var periodtime = 45;
var endtime = 90;
var TmO = 0;
var Xtra = 0;
var distance = 0;
var Period = 0;

$('#advert').innerfade({
  animationtype: 'slide',
  speed: 'normal',
  timeout: '15000',
  type: 'sequence',
  containerheight: 'auto'
});

$.get("../PHP/Timer.php", function(data){
  Xtra = Number(data.gT.Timeout_Time);
  distance = Number(data.gT.cur_time);
  Period = Number(data.gT.Perdiod);
}, "json");



    var Timeout = 0;
    var myVar = setInterval(myTimer, 1000);
    var timer = 1;
    distance = distance - Xtra;



    function myTimer() {
      $(".Period").html(Period);
      // Time calculations for days, hours, minutes and seconds
      var minutes = Math.floor(distance / 60);
      var seconds = distance - minutes * 60;
      distance = distance + 1;
      // Output the result in an element with id="demo"
      $(".time").text(minutes + "m " + seconds + "s ");

      //  document.getElementById("demo").innerHTML = minutes;

      //If the count down is over, write some text
      if (minutes >= 45 && Period == 1) {

        clearInterval(myTimer);
        $(".time").text("TimeOut");
        window.location.replace('PiAdverts.php');
      }
      if (minutes >= endtime && Period == 2){
        clearInterval(myTimer);
        $(".time").text("Game Over!");
        window.location.replace('PIwaitingroom.php');
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
          url: "../PHP/Scoreload.php?Game_ID=<?php echo $_SESSION['code']; ?>",
          dataType: "json",
          success : function(data)
          {
            $('.S1').text(data.Sc.Score_1);
            $('.S2').text(data.Sc.Score_2);
            Add = (parseInt(data.Sc.Extended_Time));
            Ext = (parseInt(data.Sc.Extended));
            TmO =(parseInt(data.Sc.Timeout));

            if (Ext == 1 && endtime == 90) {
              endtime = endtime + Add;
              timeOut();
              function timeOut() {
                  var t = setTimeout( showPopup(), 3000);
                }

                function showPopup() {
                  $.toast.danger("+" + Add + "Min.");

                }
            }
            if (TmO == 1 && timer == 1) {
              Timeout = Timeout + 1;
              clearInterval(myVar);
              timer = 0;
            } else if (TmO == 0 && timer == 0) {
              setInterval(myTimer, 1000);
              timer = 1;
              $.post("../PHP/saveTime.php?Time=" + Timeout);
            } else if (TmO == 2)  {            
              window.location.replace('PIwaitingroom.php');

            }



          }
        });

        $.ajax({ type: "POST",
        url: "../PHP/getTimeout.php?Game_ID=<?php echo $_SESSION['code'] ?>",
        dataType: "json",
        succes : function(data)
        {
          $(Timeout).text(data.To.Timeout);
        }


      });
      setTimeout(getScore, 1000);
    }());
    </script>
  </body>
  </html>
