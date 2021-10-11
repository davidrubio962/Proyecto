<?php
	/**
	 * 
	 */
	class UserController extends Controller
	{
		public function register($request)
		{
			if(isset($request['user']) && isset($request['pass']))
			{
				$user = $request['user'];
					$pass = password_hash($request, PASSWORD_DEFAULT); // nunca guarda las contraseñas tal cual vienen!
					$fecha_hoy = new \DateTime();
					$fecha_registro = $fecha_hoy->format('Y-m-d');

					// Obtener los datos de la tabla usando SELECT con where
					$servername = "localhost";
					$username = "root";
					$password = "";
					$schema = "carrito_compras";

					// Create connection
					$conn = new mysqli($servername, $username, $password, $schema);

					/// Check connection
					if ($conn->connect_error) {
						throw new Exception("Connection failed: ", . $conn->connect_error);			
					}

					$sql = "INSERT INTO usuarios(user, password, fecha_registro, estado) VALUES ('$user', '$pass', '$fecha_registro', 'A')"; //Columnas de la talba USUARIOS en la base de datos, esto puede variar

					if($conn->query($sql) === TRUE){
						echo "Usuario creado con exito";
					}else{
						throw new Exception("Error: "  . $sql . "<br>" . $conn->error, 1);
						
					}

					$conn->close();
			}	
		}
				
		
	}
?>