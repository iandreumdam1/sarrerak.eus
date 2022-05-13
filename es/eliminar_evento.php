<!doctype html>
<html>
<head>
<meta charset"utf-8">
<title>Actualizando evento</title>
</head>


<body>
<?php
	session_start();


		$db_host="localhost";
		$db_nombrebd="sarrerak";
		$db_usuario="root";
		$db_contraseña="";
		
		require("crear_evento.php");
		
		$conexion=mysqli_connect($db_host,$db_usuario,$db_contraseña);
		
		if(mysqli_connect_errno()){
			echo "Fallo al conectar con las Base de Datos";
			exit();
		}

		
		
		mysqli_select_db($conexion, $db_nombrebd) or die ("No se encuentra la Base de Datos");
		
		mysqli_set_charset($conexion,"utf-8");
		
		$consulta="DELETE FROM eventos
					WHERE id = ".$_SESSION["id_evento"]."";	
		$resultados=mysqli_query($conexion, $consulta);	
		
		if($resultados==false){
			echo "Error en la consulta";
		}else{
			echo "Evento eliminado";
		}

		echo "<script>
				window.location.href = 'eventos_editar.php';
			</script>";

		echo "fin";
		
		mysqli_close($conexion);


	

	
?>

</body>
</html>