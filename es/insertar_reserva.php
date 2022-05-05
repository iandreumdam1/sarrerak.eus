<!doctype html>
<html>
<head>
<meta charset"utf-8">
<title>Reserva entradas</title>
</head>


<body>
<?php
	session_start();

	if (isset($_GET["w2"])) {
		$entradas = $_GET["w2"];
	}
	
	$usr=$_SESSION["nombre_usuario_id"];
	$evnt = $_SESSION["id_evento"];
    $idse = $_SESSION["id_sesion"];

	$af_a = $_SESSION["aforo_actual"] + $entradas;


	echo $usr;
	echo $evnt;
	echo $idse;
	echo $af_a;

	$db_host="localhost";
	$db_nombrebd="sarrerak";
	$db_usuario="root";
	$db_contraseña="";
	
	require("evento_detalles.php");
	
	$conexion=mysqli_connect($db_host,$db_usuario,$db_contraseña);
	
	if(mysqli_connect_errno()){
		echo "Fallo al conectar con las Base de Datos";
		exit();
	}
	
	mysqli_select_db($conexion, $db_nombrebd) or die ("No se encuentra la Base de Datos");
	
	mysqli_set_charset($conexion,"utf-8");

	
	
	
	
	for ($i = 0; $i < $entradas; $i++){
		$consulta="INSERT INTO eventos_inscripcion(id_evento, id_usuario, id_sesion)
		VALUES ('$evnt', '$usr', '$idse')";
	  
	  	$resultados=mysqli_query($conexion, $consulta);
		
		if($resultados==false){
		  echo "Error en la consulta";
		}
	
	}
	
	$consulta2="UPDATE eventos
				SET  aforo_actual = '$af_a' 
				WHERE id = '$evnt'";
	
	$resultados2=mysqli_query($conexion, $consulta2);	

	
	mysqli_close($conexion);

	echo "<script>window.location.href = 'entradas_reservadas.php'</script>";
	
?>


</body>
</html>