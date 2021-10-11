<?php

	class SessionController extends Controller

	{
		public function loIn($request)
		{
			session_start();
			if (isset($request['btnSubmit'])) {
				if ($request['user'] == 'admin' && $request['pass'] = '123') {
					$_SESSION['user'] = 'admin';
					$_SESSION['email'] = 'admin@gmial.com';
					$_SESSION['isLogged'] = true;
				}
			}

			if(isset($_SESSION['isLogged']))
			{
				if ($_SESSION['isLogged'] === true) {
					echo "Iniciando Sesión! Hola" .$_SESSION['user'] . "<br>";
					echo "<a href='logout.php'>Log Out </a>";
				}else
				{
					echo "Usted no tiene permisos para ver esta pagina.";
				}
			}else{
				echo "No se ha logueado correctamente. Intentelo nuevamente. <a href='login.php>Volver</a>'";
			}

		}

		public function logOut()
		{
	// Inicializar la sesion.
	// Si esta usando session_name("algo"), no lo olvide ahora
			session_start();

			//destruir todas las variables de sesion
			$_SESSION = array();

			// Si se desea destruir la sesion completamente, borre tambien la cookie de sesion
			// esto destruira la sesion y no la informacion de la sesion
			if (ini_get("session.use_cookies")) {
				$params = session_get_cookie_params();
				setcookie(session_name(), '', time() - 42000, 
				$params["path"], $params["domain"],
				$params["secure"], $params["httponly"]
				);
			}
			//se destruye la sesion

			session_destroy();

			echo "Sesion cerrada. <a href='index.php'>Volver</a>";
		}

	}

?>