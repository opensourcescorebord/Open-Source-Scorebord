function retrieve_cookie(name) {
  var cookie_value = "",
    current_cookie = "",
    name_expr = name + "=",
    all_cookies = document.cookie.split(';'),
    n = all_cookies.length;

  for(var i = 0; i < n; i++) {
    current_cookie = all_cookies[i].trim();
    if(current_cookie.indexOf(name_expr) == 0) {
      cookie_value = current_cookie.substring(name_expr.length, current_cookie.length);
      break;
    }
  }
  return cookie_value;
}

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
  console.log(data);
  Xtra = Number(data.gT.Timeout_Time);
  distance = Number(data.gT.cur_time);
  Period = Number(data.gT.Perdiod);
}, "json");



    var Timeout = 0;
    var myVar = setInterval(myTimer, 1000);
    var timer = 1;
    distance = distance - Xtra;

    (function Timeout() {
      $.get("../PHP/getTimeout.php?Game_ID=" + retrieve_cookie('code'), function(result){
        console.log(result);
        $(TmO).val(result.Tout);
        console.log(TmO);
        if (TmO == 1 && timer == 1) {
          Timeout = Timeout + 1;
          clearInterval(myVar);
          timer = 0;
        } else if (TmO == 0 && timer == 0) {
          setInterval(myTimer, 1000);
          timer = 1;
          $.post("../PHP/saveTime.php?Time=" + Timeout);
        } else if (TmO == 2)  {
          session_destroy();
          window.location.replace('PIwaitingroom.php');

        }



      });

      setTimeout(Timeout, 1000);
    }());




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

    $.get("../PHP/getTeams.php", function(data){
      console.log(data);
      $('.T1').text(data.Team.Team_1);
      $('.T2').text(data.Team.Team_1);


    }, "json");

        var Score_1;
        var Score_2;

        (function getScore() {
          $.ajax({ type: "POST",
          url: "../PHP/Scoreload.php?Game_ID=" + retrieve_cookie('code'),
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
        url: "../PHP/getTimeout.php?Game_ID=" + retrieve_cookie('code'),
        dataType: "json",
        succes : function(data)
        {
          $(Timeout).text(data.To.Timeout);
        }


      });
      setTimeout(getScore, 1000);
    }());
