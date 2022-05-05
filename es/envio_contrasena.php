<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Comprobar login</title>
</head>


<body>
<?php
	
	
	$psw=$_GET["password"];
	$usr=$_GET["idusuario"];

	$db_host="localhost";
	$db_nombrebd="proyecto";
	$db_usuario="root";
	$db_contraseña="";
	
	require("cambiar_contrasena.php");
	
	$conexion=mysqli_connect($db_host,$db_usuario,$db_contraseña);
	
	if(mysqli_connect_errno()){
		echo "Fallo al conectar con las Base de Datos";
		exit();
	}
	
	mysqli_select_db($conexion, $db_nombrebd) or die ("No se encuentra la Base de Datos");
	
	mysqli_set_charset($conexion,"utf-8");
	
	$consulta="UPDATE usuarios SET contrasena='$pwd' WHERE nombre_usuario_id= '$usr'";
	$resultados=mysqli_query($conexion, $consulta);	
	
	if($resultados==false){
		echo "Error en la consulta";
	}else{
		header("Location: pagina_personal.php");
	}
	
	mysqli_close($conexion);
	
?>


</body>
</html>