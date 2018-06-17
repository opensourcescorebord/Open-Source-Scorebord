<?php
	include_once '../PHP/randomcode.php';
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

</head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


<body>

<h1 class=" text-center font-weight-bold text-black-50 p-0 m-0">Welkom</h1>
<br>


</form>


 <div class="container">
	<div class="row justify-content-center">
		<div class="col-xs-12 col-md-6">
		<span class=" small text-center font-weight-bold text-black-50">Typ de code van het scherm in de balk hieronder:</span>
			<form class="form-signin" action="../PHP/BestuurderLogin.php" method="post">
				<input class="form-control" type="text" id="code" name="code" />
				<br>
				<input class="btn btn-lg btn-primary btn-block btn-info" type="submit" id="btn" value="login" />
			</form>
		</div>

<br>
</body>
