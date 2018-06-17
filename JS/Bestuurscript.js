var Xtra = 0;
    var distance;
    var Period;
    var Periodtime;
    var Timeout;

    var endtime = 90;
    var Score_1;
    var Score_2;


    

    $.get("../PHP/Timer.php", function(data){

      Xtra = Number(data.gT.Timeout_Time);
      distance = Number(data.gT.cur_time);
      $("#P").text(data.gT.Perdiod);
      $(".T1").text(data.gT.Team_1);
      $(".T2").text(data.gT.Team_2);

    }, "json");

    $("#P").html(Period);
    distance = distance - Xtra;
    var myVar = setInterval(myTimer, 1000);

        function myTimer() {
          // Time calculations for days, hours, minutes and seconds
          var minutes = Math.floor(distance / 60);
          var seconds = distance - minutes * 60;
          distance = distance + 1;

          // Output the result in an element with id="demo"
          $(".time").text(minutes + "m " + seconds + "s ");

          //If the count down is over, write some text
          if (minutes >= (45) && Period == 1) {
            clearInterval(myVar);
            $(".time").text("Rust");
            $( "#Interactief" ).html('<div class="col"><div class="shadow-lg card p-3 mb-1"><div class="row justify-content-center"><div class="col-12 "><a href="../PHP/Endpause.php" class="btn btn-danger btn-lg col-centered w-100" role="button">Start Game!</a></div></div></div></div>' );
          }
          if (minutes >= endtime && Period == 2){

            $.ajax({ type: "POST",
            url: "/PHP/Endgame.php",
            dataType: "json",
            success : function(data)
            {
              clearInterval(myVar);
              $(".time").text("");
            }
          });

          $( "#Interactief" ).html('<div class="col"><div class="shadow-lg card p-3 mb-1"><div class="row justify-content-center"><div class="col-12 "><a href="../PHP/newGame.php" class="btn btn-danger btn-lg col-centered w-100" role="button">Start een nieuwe game</a></div><div class="col-12 "><a href="../PHP/Leave.php" class="btn btn-danger btn-lg col-centered w-100 mt-3" role="button">Stop met besturen</a></div></div></div></div>');

        }}

        (function getScore() {
          $.ajax({ type: "POST",
          url: "../PHP/Scoreload.php",
          dataType: "json",
          success : function(data)
          {
            $('.S1').text(data.Sc.Score_1);
            $('.S2').text(data.Sc.Score_2);

          }
        });
        setTimeout(getScore, 1000);
      }());



