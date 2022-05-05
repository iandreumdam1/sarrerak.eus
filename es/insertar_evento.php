!doctype html>
<html>
<head>
<meta charset"utf-8">
<title>Crear evento</title>
</head>


<body>
<?php
	session_start();
	
	$usr=$_SESSION["nombre_usuario_id"];
	$nom=$_GET["nombre"];
	$desc_c=$_GET["descripcion_corta"];
	$desc=$_GET["descripcion"];
	$img='nullo';//$_GET["imagen"];
	$aft=$_GET["aforo_total"];
    $dte=$_GET["fecha_evento"];

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
	
	$consulta="INSERT INTO eventos (nombre, descripcion_breve, descripcion, imagen, aforo_total, fecha_evento, usuario_creacion) 
				VALUES('$nom', '$desc_c', '$desc', '$img', '$aft', '$dte', '$usr')";	
	$resultados=mysqli_query($conexion, $consulta);	
	
	if($resultados==false){
		echo "Error en la consulta";
	}else{
		echo "Evento guardado";
	}
	
	mysqli_close($conexion);
	
?>


</body>
</html>