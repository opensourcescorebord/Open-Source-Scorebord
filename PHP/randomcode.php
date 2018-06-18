
<?php


    include 'ConDB.php';


    $randomPassword = createRandomPassword();

		$result = $dbC->query("SELECT * FROM games WHERE End_Time IS NULL;");
	          if ($result->num_rows > 0) {
              $request = $dbC->query("SELECT * FROM games WHERE User = '0' AND End_Time IS NULL;");
              if ($request->num_rows > 0){
                $sql="UPDATE games SET Game_ID = '$randomPassword'";
              } else {
                header("location:../");
              }

						}  else {
							$sql="INSERT games SET Game_ID = '$randomPassword';";
						}






    $result=mysqli_query($dbC, $sql);

    mysqli_close($dbC);

	function createRandomPassword() { //deze functie maakt een random gegenereerde code van 4 tekens.

    $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; //dit zijn alle tekens die in een code kunnen zitten.
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;

    while ($i <= 3) { //deze loop gaat 4 keer door alles heen.(0 telt ook mee)
        $num = rand() % 61; //de rand() functie kiest een willekeurig nummer tussen de 0 en de 33.
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }

    return $pass;

}
