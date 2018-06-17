<?php
session_start();
if(!isset($_SESSION['code'])) {
  header("location:/PHP/Login.php");
}
else //Continue to current page
?>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>OSS</title>
</head>
<body>



 <div class="container ">
  <div class="row justify-content-center">
    <div class="col-xs-12 col-md-4">
<p class="display-4 text-center text-bold">Spel instellingen</p>




<Form     action="../PHP/CreateGame.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <!---vul team 1 naam in--->
                <input type="text" class="form-control " name="Team_1" placeholder="Enter Team 1">
              </div>
              <div class="form-group">
                <!---Upload team 1 logo--->
                <label for="Team_1Select">Team 1 logo</label>
                <input type="file" class="form-control-file btn btn-lg btn-block btn-info" name="T1L">
              </div>
              <div class="form-group">
                <!---Vul team 2 naam in--->
                <input type="text" class="form-control" name="Team_2" placeholder="Enter Team 2">
              </div>
              <div class="form-group">
                <!---Upload Team 2 logo--->
                <label for="Team_1Select">Team 2 logo</label>
                <input name="T2L" type="file" class="form-control-file btn btn-lg btn-info">
              </div>
              <div class="form-group">
                <!---Selecteer sport--->
                <label for="SportSelect">Select sport...</label>
                <select class="form-control" id="SportSelect" name="sport" placeholder="Sport">
                  <option value="1">Voetbal</option>
                  <option value="2">basketbal</option>
                  <option value="3">Hockey</option>
                </select>
              </div>
              <div class="form-group">
                <!---Stuur form--->
                <button class="btn btn-lg btn-info "type="submit" name="button"> Create </button>
                  <br>
                  <br>
                <a class="btn btn-lg btn-info" href="/PHP/logout.php">LOGOUT</a>
              </div>
            </div>
          </Form>
    </div>
</div>
</div>
<div class="text-center font-weight-bold"></div>
</body>
</html>
