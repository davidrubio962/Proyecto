<!--Este archivo debe llamar insertar.php-->

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
	<?php
	error_reporting(5);
		function Conectarse()
		{
			if (!($link=mysqli_connect("localhost:3306", "root", ""))) {
				echo "Error conectando a la base de datos.";
				exit();
			}
			if (!mysqli_select_db($link, "innobar")) {
				echo "Error seleccionando la base de datos";
				exit();
			}
			return $link;
		}
		$link = Conectarse();
		$nombre = $_REQUEST['Name'];
		$apellido = $_REQUEST['LastName'];
		$email = $_REQUEST['Email'];
		$password = $_REQUEST['password'];
		$repassword = $_REQUEST['repassword'];
		$lista = $_REQUEST['opciones'];
		$numdoc = $_REQUEST['documentid'];
		$fech = $_REQUEST['fecha_inicio'];
		$numcel = $_REQUEST['Num_celular'];

		//$validacion = "SELECT * FROM `crearusuarios` WHERE `documentid` LIKE '$numdoc'";

		if(buscaRepetido($numdoc,$numcel, $link)==1){
			header("location:../index.php");
			echo 2;
			

		}else{
		$insertar = "INSERT INTO `crearusuarios` (`Name`, `LastName`, `Email`, `password`, `repassword`, `opciones`, `documentid`, `fecha_inicio`, `Num_celular`) VALUES ('$nombre', '$apellido', '$email', '$password', '$repassword', '$lista', '$numdoc', '$fech', '$numcel')";
		mysqli_query($link, $insertar);

		header("location:../index.php");

		}

		function buscaRepetido($numdoc,$numcel, $link){

			$insertar="SELECT * FROM `crearusuarios` WHERE `documentid` = '$numdoc'  and `Num_celular` = '$numcel'";
			
			$result=mysqli_query($link,$insertar);

			if(mysqli_num_rows($result) > 0){
				return 1;
			}else{
				return 0;
				
			}

		}		

	

		
	?>
	<br>
	
</body>
</html>