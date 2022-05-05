<!doctype html>
<html>
<head>
<meta charset"utf-8">
<title>Crear usuario</title>
</head>


<body>
<?php
	
	
	$usr=$_GET["login"];
	$psw=$_GET["password"];
	$ap1=$_GET["apellido1"];
	$ap2=$_GET["apellido2"];
	$nom=$_GET["nombre"];
	$cor=$_GET["correo"];

	$db_host="localhost";
	$db_nombrebd="sarrerak";
	$db_usuario="root";
	$db_contraseña="";
	
	require("registro.html");
	
	$conexion=mysqli_connect($db_host,$db_usuario,$db_contraseña);
	
	if(mysqli_connect_errno()){
		echo "Fallo al conectar con las Base de Datos";
		exit();
	}
	
	mysqli_select_db($conexion, $db_nombrebd) or die ("No se encuentra la Base de Datos");
	
	mysqli_set_charset($conexion,"utf-8");
	
	$consulta="INSERT INTO usuarios (nombre_usuario_id, correo_electronico, contrasena, nombre, apellido1, apellido2) 
				VALUES('$usr', '$cor', '$psw', '$nom', '$ap1', '$ap2')";	
	$resultados=mysqli_query($conexion, $consulta);	
	
	if($resultados==false){
		echo "Error en la consulta";
	}else{
		echo "Registro guardado";
	}
	
	mysqli_close($conexion);
	
?>


</body>
</html>