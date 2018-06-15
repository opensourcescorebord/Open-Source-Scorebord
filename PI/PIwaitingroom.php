<?php
    include '../PHP/ConDB.php';
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
} else {
  session_destroy();
  session_start();
}


 ?>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
     <title>Waiting room</title>
   </head>
<body>
  <div>
           <h1>Welcome!</h1>
           <h2>A game will start shortly</h2>
            <h3 id="Teams">NVT</h3>
            <h1 id="Code"></h1>
           <script type="text/javascript">

           var getTeams = function () {
            <?php
            $result = $dbC->query("SELECT Team_1, Team_2 FROM games WHERE End_Time IS NULL");
            if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) { ?>
               var Teams = "<?php echo $row['Team_1'] ?>" + " VS " + "<?php echo $row['Team_2'] ?>";
              document.getElementById("Teams").innerHTML = Teams;
             <?php }?>
           <?php }?>
           };
           getTeams();
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

                           if(act == '1'){

                            window.location.replace("../PI/PIscoreboard.php?Game_ID=" + GameID);

                           }
                         }
                });
           setTimeout(PollActive, 1000);
         }());
           </script>
         </div>
</body>
