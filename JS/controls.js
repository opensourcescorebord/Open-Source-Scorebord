window.onload = function(){
    // your code

$(".T1P").click(function(){
  $.ajax({
type: "POST",
url: "../PHP/ScoreControl.php",
data: ({Score:"1+"}),
success: function() {
}
});
})

$(".T1-").click(function(){
  $.ajax({
type: "POST",
url: "../PHP/ScoreControl.php",
data: ({Score:"1-"}),
success: function() {
//display message back to user here
}
});
})
$(".T2P").click(function(){
  $.ajax({
type: "POST",
url: "../PHP/ScoreControl.php",
data: ({Score:"2+"}),
success: function() {
//display message back to user here
}
});
})

$(".T2-").click(function(){
  $.ajax({
type: "POST",
url: "../PHP/ScoreControl.php",
data: ({Score:"2-"}),
success: function() {
//display message back to user here
}
});
})

};
