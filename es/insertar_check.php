<!doctype html>
<html>
<head>
<meta charset"utf-8">
<title>Comprobando</title>
</head>


<body>
<?php
	session_start();
	
	if(!isset($_SESSION["nombre_usuario_id"])){
		header("Location:iniciar_sesion.php"."?rp="."evento_detalles.php");
	}

  	if($_SESSION["tipo_usuario"] == 1){
		header("Location:pagina_personal.php");
	}

	if (isset($_GET["cqr"])) {
		$id_entrada = $_GET["cqr"];
	}

	$db_host="localhost";
	$db_nombrebd="sarrerak";
	$db_usuario="root";
	$db_contraseña="";
		
	//require("acomodadores_puerta.php");
		
	$conexion=mysqli_connect($db_host,$db_usuario,$db_contraseña);
		
	if(mysqli_connect_errno()){
		echo "Fallo al conectar con las Base de Datos";
		exit();
	}

		
		
	mysqli_select_db($conexion, $db_nombrebd) or die ("No se encuentra la Base de Datos");
		
	mysqli_set_charset($conexion,"utf-8");

	$consulta1="SELECT asiste
			FROM eventos_inscripcion
			WHERE id_entrada = ".$id_entrada."";
	

	$resultados1=mysqli_query($conexion, $consulta1);
	
	/*echo "SELECT asiste
	FROM eventos_inscripcion
	WHERE id_entrada = ".$id_entrada."";
*/
	
	if($resultados1==false){
		echo "El asistente no esta en la BD";
		header('Location: acomodadores_puerta.php?msg=1');


	}else{
		while($fila=mysqli_fetch_array($resultados1)){
			if($fila["asiste"]!=1){
				$consulta2="UPDATE eventos_inscripcion
				SET asiste = 1
				WHERE id_entrada = ".$id_entrada."";	
				$resultados2=mysqli_query($conexion, $consulta2);	
					
				if($resultados2==false){
					echo "Error en la consulta de insercion";
					//header('Location: acomodadores_puerta?msg=2');
				}else{
					echo "Evento guardado";
					header('Location: acomodadores_puerta.php?msg=3');
				}
			}
			else{
				echo "El asistente ya ha entrado";
				header('Location: acomodadores_puerta.php?msg=2');
			}
		  }
		
	}
		

	
		
	mysqli_close($conexion);


	
?>

</body>
</html>