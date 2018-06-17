<?php
include '../PHP/ConDB.php';
$logos = scandir("../images/", 1);

if(!isset($_COOKIE['code'])){
  setcookie('code',  $_GET['Game_ID'], time() + 7200, '/PHP');
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
  <script src="../JS/Scorescript.js"></script>



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
<div class="row align-items-center mw-75 h-75">
  <div class="col-12 align-self-center mw-100">
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
<img class="card-img-top" src="../images/<?php echo $logos[1]?>" onError="this.onerror=null;this.src='/Stock/Thuis.png'" >
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

              </div>
          <div class="col-2">
            <div class="shadow-lg card">

<img class="card-img-top" src="../images/<?php echo $logos[1]?>" onError="this.onerror=null;this.src='/Stock/Uit.png'" >
              <div class="card-body">
                <h3 class="text-center T2">--- </h3>
              </div>
            </div>

          </div>
        </div>
  </div>
</div>
<script>
$('#advert').innerfade({
  animationtype: 'slide',
  speed: 'normal',
  timeout: '15000',
  type: 'sequence',
  containerheight: 'auto'
});


</script>
  </body>
  </html>
