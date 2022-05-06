<!DOCTYPE html>
<html>
    <head>
	    <meta charset="UTF-8"> 
        <title>Comprobar Login</title>  
    </head>
    <body>
    	<?php

		// Inicializar variables de sesión
		session_start();

		//Abre la conexión al SGBD
		$hostname = 'localhost';
		$database = 'sarrerak';
		$username = 'root';
		$password = '';

		$conn = new mysqli($hostname, $username, $password, $database);
		if ($conn->connect_errno) {
			die("Fallo la conexión a MySQL: (" . $conn->mysqli_connect_errno()
					. ") " . $conn->mysqli_connect_error());
		}

		//Compone la consulta SQL para comprobar el usuario
		$sql = "SELECT *
			FROM usuarios
			WHERE nombre_usuario_id=?";

		$error = false;

		//Si la consulta ha devuelve algún registro, aceptamos el login
		if ($stmt = $conn->prepare($sql)) {
			$stmt->bind_param("s", $_POST["login"]);
			$stmt->execute();
			if ($resultado = $stmt->get_result()) {
				$user = $resultado->fetch_assoc();
				//Comprueba si son iguales la contraseña original y la codificada
				$equal = strcmp($_POST["password"], $user["contrasena"]);

				if ($equal === 0 ) {
					
					$_SESSION["nombre_usuario_id"] = $user["nombre_usuario_id"];
					$_SESSION["nombre_usurio"] = $user["nombre"];
					$_SESSION["apellido1"] = $user["apellido1"];
					$_SESSION["apellido2"] = $user["apellido2"];
					$_SESSION["correo_electronico"] = $user["correo_electronico"];
					$_SESSION["tipo_usuario"] = $user["tipo"];
					//Redirigimos a la página protegida que será el listado de nuestros mensajes
					header("Location:".$_SESSION["redirigir_pagina"]."");
					

				} else {
					$error = true;
				}
			} else {
				$error = true;
			}
		} else {
			$error = true;
		}
		//Si no, redirigimos de nuevo a la página de login con un parámetro de error
		if ($error) {
			header("Location: iniciar_sesion.php?error=1");
		}
		?>
				
    </body>
</html>