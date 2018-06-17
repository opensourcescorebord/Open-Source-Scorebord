<?php
    include '../PHP/ConDB.php';
    if (isset($_COOKIE['code'])) {
    setcookie('code', "", 1, "/PHP");
}
?>
 <html lang="en">
     <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="icon" href="http://i218.photobucket.com/albums/cc233/shoopuff1/Opensource%20Scorebord/HampK%20Icon%20A.png">
     <!-- Bootstrap -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
       <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
     <link rel="icon" href="../../../../favicon.ico">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
     <title>Waiting room</title>

     <style media="screen">
     body,html {
       height: 100%;
       background-image: url("../Stock/BG.jpeg");
       overflow:hidden;
     }
     </style>
   </head>
<body>
  <div>
    <div class="row h-100 justify-content-center">
      <div class="col-8 w-50 h-50 py-5 card shadow-lg align-self-center">
        <h1 class="text-center">Welkom!</h1>
        <h2 class="text-center">Een wedstrijd zal binnenkort beginnen.</h2>
         <h3 class="text-center"><span id="T1">-</span><span> vs </span><span id="T2">-</span></h3>
         <h1 id="Code" class="display-3 text-center">---</h1>
      </div>
    </div>
           <script type="text/javascript">

           (function PollActive() {
             $.ajax({ type: "POST",
                         url: "PiInfo.php",
                         dataType: "json",
                         success : function(data)
                         {
                           var act = parseInt(data.AcG.Active);
                           var GameID = JSON.stringify(data.AcG.Game_ID);
                           GameID = GameID.replace('"', '');
                           GameID = GameID.replace('"', '');
                           console.log(GameID);
                           $('#Code').text(data.AcG.Game_ID);
			   $('#T1').text(data.AcG.Team_1);
			   $('#T2').text(data.AcG.Team_2);


                           if(act == '1'){

                            window.location.replace("../PI/PIscoreboard.php?Game_ID=" + GameID);

                           }
                         }
                });
           setTimeout(PollActive, 1000);
         }());
           </script>

</body>
