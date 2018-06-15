<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../JS/jquery.innerfade.js"></script>

<style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  position: fixed;
   top: 0;
   left: 0;

   /* Preserve aspet ratio */
   min-width: 100%;
   min-height: 100%;
}

</style>

  <title>Waiting room</title>
</head>
<body>
  <div class="bg">

  </div>
  <ul class="list-group" id="advert">
  <?php
  $files = glob('../RustSponsoren/*.{jpg,png,gif}', GLOB_BRACE);
foreach($files as $file) {
  echo "<li class='list-group-item'>
    <div class='bg'>
			<img class='img-fluid mw-100' src=".$file." alt='nothin' />
      </div>
	</li>";
}
   ?>
 </ul>
  <script type="text/javascript">
  $('#advert').innerfade({
  	animationtype: 'slide',
  	speed: 'normal',
  	timeout: '10000',
  	type: 'sequence',
  	containerheight: 'auto'
  });


  (function PollActive() {
    $.ajax({ type: "POST",
                url: "/PI/Piperiod.php",
                dataType: "json",
                success : function(data)
                {
                  var id = parseInt(data);
                  console.log(id);
                  if(id == '2'){
                    window.location.replace("PIscoreboard.php")
                  }
                }
       });
  setTimeout(PollActive, 1000);
}());
  </script>
</body>
