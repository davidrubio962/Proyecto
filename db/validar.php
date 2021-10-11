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
		$identificacion = $_POST['user'];
		$pasaporte = $_POST['pass'];
		session_start();
		$_SESSION['user'] = $identificacion;

		$consulta = "SELECT * FROM `crearusuarios` WHERE `documentid` = '$identificacion' and `password` = '$pasaporte'";

		$resultado = mysqli_query($link, $consulta );

		$filas = mysqli_num_rows($resultado); // almacena el reultado y realice la validacion corresponidente

		if ($filas) {
			header("location:../orden.php");
		}else{
			?>
			<?php
			header("location:../index.php");
			

		}
		//$validacion = "SELECT * FROM `crearusuarios` WHERE `documentid` LIKE '$numdoc'";
	

	mysqli_free_result($resultado);
	mysqli_close($link);

		
	?>