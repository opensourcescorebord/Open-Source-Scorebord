<?php session_start();
$_SESSION['Game_ID'] = 'DHCM'; ?>

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

  <title>Scorebord Home</title>
</head>

<p class='time'>'---'</p>
<p class='period'>'---'</p>
<div class="o">
  <button id="Pause">Pauzeer</button>
</div>

<a href="../PHP/Endpause.php" class="btn btn-danger btn-lg col-centered mt-5" role="button">Start Game!</a>
<script>
var endtime = 90;
<?php

include '../PHP/ConDB.php';
$result = $dbC->query("SELECT T_Time, Perdiod ,CASE WHEN Perdiod = 1 THEN TIME_TO_SEC(timediff(now(), start_time)) WHEN Perdiod = 2 THEN TIME_TO_SEC(timediff(now(), Intermediate_Time)) + 45*60 End as cur_time
FROM games WHERE Game_ID='DHCM'");;
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) { ?>
    var Xtra = <?php echo $row['T_Time'] ?>;
    var distance = <?php echo $row['cur_time'] ?>;
    var Period = <?php echo $row['Perdiod'] ?>;
    <?php }}?>
    $(".period").text(Period);
    var Periodtime = 0;
    var Timeout = 0;
    var myVar = setInterval(myTimer, 1000);
    distance = distance - Xtra;
    function myTimer() {
      // Time calculations for days, hours, minutes and seconds
      var minutes = Math.floor(distance / 60);
      var seconds = distance - minutes * 60;
      distance = distance + 1;
      // Output the result in an element with id="demo"
      $(".time").text(minutes + "m " + seconds + "s ");

      //  document.getElementById("demo").innerHTML = minutes;

      //If the count down is over, write some text
      if (minutes >= (45) && Period == 1) {
          clearInterval(myVar);
          $(".time").text("Rust");
          //window.location.replace('ContrlTimeout.php');
      }
      if (minutes >= (90) && Period == 2){

          $.ajax({ type: "POST",
                      url: "/PHP/Endgame.php",
                      dataType: "json",
                      success : function(data)
                      {
                        clearInterval(myVar);
                      }
             });
             window.location.replace('../index.php');

    }}



    function Timeoutbutton() {
      setInterval(T_Time, 1000);
      $.ajax({ type: "POST",
                  url: "../PHP/setTimeout.php?Game_ID=<?php echo $_SESSION['Game_ID'] ?>",
                  success : function(data)
                  {

                  }
         });
      clearInterval(myVar)
      $("#Pause").unbind("click");
      $( ".o" ).html("<button id='unPause'> Hervat </button>" );
      $("#unPause").click( function() {
        clearInterval(T_Time());
        $.post("../PHP/saveTime.php?Time=" + Timeout);
        Timeout = 0;
        $.ajax({ type: "POST",
                    url: "../PHP/unsetTimeout.php?Game_ID=<?php echo $_SESSION['Game_ID'] ?>",
                    success : function(data)
                    {
                      $("#unPause").unbind("click");
                      $( ".o" ).html("<button id='Pause'> Pause </button>" );
                      $("#Pause").click(Timeoutbutton);
                      myVar = setInterval(myTimer, 1000);

                    }
           });
      });
    }


    $( "#Pause" ).on('click', Timeoutbutton);

    function T_Time(){
      Timeout = Timeout + 1;
      console.log(Timeout);
    }
</script>
