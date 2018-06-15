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
<script>
    var TmO = 0;
<?php
include '../PHP/ConDB.php';
$result = $dbC->query("SELECT T_Time, Perdiod ,CASE WHEN Perdiod = 1 THEN TIME_TO_SEC(timediff(now(), start_time)) WHEN Perdiod = 2 THEN TIME_TO_SEC(timediff(now(), Intermediate_Time)) + 45*60 End as cur_time
FROM games WHERE Game_ID='DHCM'");;
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) { ?>
    var Xtra = <?php echo $row['T_Time'] ?>;
    var distance = <?php echo $row['cur_time'] ?>;
    var period = <?php echo $row['Perdiod'] ?>;
    <?php }}?>
    $(".period").text(period);

var Timeout = 0;
var myVar = setInterval(myTimer, 1000);
var timer = 1;
distance = distance - Xtra;
  (function Timeout() {
    $.get("../PHP/getTimeout.php?Game_ID=<?php echo $_SESSION['Game_ID'] ?>", function(data){
  var mydata= $.parseJSON(data);
    TmO = mydata.Timeout;  // <-----------  access the element
    console.log(TmO);
    if (TmO == 1 && timer == 1) {
    Timeout = Timeout + 1;
    clearInterval(myVar);
    timer = 0;
  } else if (TmO == 0 && timer == 0) {
    setInterval(myTimer, 1000);
    timer = 1;
    $.post("../PHP/saveTime.php?Time=" + Timeout);
  }



});

  setTimeout(Timeout, 1000);
}());

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
    //window.location.replace('PiAdverts.php');
  }
  if (minutes >= 90 && period == 2){
    clearInterval(myTimer);
    $(".time").text("Game Over!");
    window.location.replace('PIwaitingroom.php');
  }
}
</script>
