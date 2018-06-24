<?php
session_start(); //Start the session
include_once '../PHP/ConDB.php';
$logos = scandir("../images/", 1);
if(!isset($_SESSION['code'])) {//If session not registered
  header("location:../Index.php"); // Redirect to login.php page
}
else //Continue to current page
header( 'Content-Type: text/html; charset=utf-8' );


?>


<!doctype html>
<html lang="en">
<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <link rel="icon" href="http://i218.photobucket.com/albums/cc233/shoopuff1/Opensource%20Scorebord/Geercon%202.png">
  <script type="text/javascript" src="../JS/jquery.innerfade.js"></script>
  <!-- Bootstrap & JQuery-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="../JS/controls.js"></script>

    <link rel="stylesheet" type="text/css" href="../CSS/slider.css">
    <!--Page specific CSS-->
    <style media="screen">
    h2 {
      text-size: 50%;
    }
    .settings {
      font-size:100%
    }
    img.logout {
      -webkit-filter: invert(1);
      filter: invert(1);
    }

    #Teams{
      font-size: 0.75em;
    }
  </style>

</head>

<body class="bg-light">
  <div class="shadow-lg jumbotron mb-3" style="background-image: url('../Stock/BG.jpeg');" background-size: 100%;>

    <div class="container" >
      <h2 class="shadow-lg bg-white text-dark font-weight-bold text-center" style="opacity: 0.75"> OPEN-SOURCE SCOREBORD </h2>
      <p class="shadow-lg bg-white text-dark font-weight-bold text-center" style="opacity: 0.75"> <?php echo date("d / m / Y")  ?> </p>
    </div>
  </div>

<!--Controller-->
  <div class="container">
    <div class="row d-none d-block">
      <!-- Game Kaart -->
      <div class="col">
        <div class="shadow-lg card p-3 mb-3">

          <div class="row">

            <!-- Logo Team 1 -->
            <div class="col-4">
              <img class="card-img-top" src="../images/<?php echo $logos[1]?>" onError="this.onerror=null;this.src='/Stock/Thuis.png'" >
              <p id="Teams"class="font-weight-bold text-center T1"> --- </p>
            </div>

            <!-- Score, tijd & periode-->
            <div class="col-4">
              <p class="text-center font-weight-bold text-dark p-0 m-0"> SCORE </p>
              <h2 class="text-center font-weight-bold"><span class=" S1">-	</span>
                <span class="">:	</span>
                <span class="S2">-	</span></h2>


                <p class="text-center font-weight-bold text-dark p-0 m-0"> TIME </p>
                <p class= "text-center font-weight-bold text-dark time"> --:-- </p>

                <p class="text-center font-weight-bold text-dark p-0 m-0"> Period </p>
                <p id="P"class= "text-center font-weight-bold text-dark"> - </p>
              </div>

              <!-- Logo Team 2 -->
              <div class="col-4">
                <img class="card-img-top" src="../images/<?php echo $logos[0]?>" onError="this.onerror=null;this.src='/Stock/Uit.png'">
                <p id="Teams" class="font-weight-bold T2 text-center"> --- </p>
              </div>

            </div>
          </div>
        </div>
        <div id="Interactief">
          <!-- Controller Kaart -->

          <div class="shadow-lg card p-3 mb-3 mx-3">
            <div class="row justify-content-between">
              <!-- Knoppen -->
              <div class="col-5 p-1 pl-2">
                <button id="T1P" type="button" class="shadow btn btn-info T1P" style="width: 100%"><h2 class="font-weight-bold">+</h2></button>
              </div>
              <div class="col-5 p-1 pl-2">
                <button type="button" class="shadow btn btn-info T2P" style="width: 100%"><h2 class="font-weight-bold">+</h2></button>
              </div>
              <div class="col-5 p-1 pl-2">
                <button type="button" class="shadow btn btn-info T1-" style="width: 100%"><h2 class="font-weight-bold">-</h2></button>
              </div>
              <div class="col-5 p-1 pl-2">
                <button type="button" class="shadow btn btn-info T2-" style="width: 100%"><h2 class="font-weight-bold">-</h2></button>
              </div>
            </div>
          </div>



          <!-- Instellingen Kaart -->
          <div class="col">
            <div class="shadow-lg card mb-5">
              <div class="row justify-content-center pause p-2">

                <!--Pauzeren-->
                <div class="col-4 o">
                  <button class="shadow btn btn-danger btn-lg w-100 h-100 settings p-2" id="Pause">Pauzeren</button>
                </div>

                <!--Uitloggen-->
                <div class="col-3">
                  <button id="logout" type="button" name="button" class="shadow btn btn-danger btn-lg w-100 settings h-100" ><span class="d-none d-sm-block">Log out</span><img src="../CSS/sign-out-alt.svg" class="d-block d-sm-none logout"></img></button>
                </div>

                <!--Verlengen-->
                <div class="col-4">
                  <button type="button" class="shadow btn btn-danger btn-lg w-100 settings h-100 p-2" data-toggle="modal" data-target="#Verlenging">Verlengen</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!--Modal Verlening-->
    <div class="modal fade" id="Verlenging" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Verlenging duratie instellen:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="col-12">
              <label for="Verleng">Vul gewenste verleng tijd in (max. 10 minuten):</label>
              <input id="Verleng" type="number" name="Verleng" value="3" min="0" max="10">
            </div>

            <div class="modal-footer">
              <button id="Add" class="shadow btn btn-info" type="button" name="button">Toevoegen</button>
            </div>
          </div>
        </div>
      </div>
    </div>


    <script src="../JS/Bestuurscript.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
  </html>
