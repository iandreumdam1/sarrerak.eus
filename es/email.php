
<?php
	session_start();
	
	$mail=$_POST["email"];
	$asnt=$_POST["asunto"];
	$msg=$_POST["mensaje"];

	echo $mail;

	$db_host="localhost";
	$db_nombrebd="sarrerak";
	$db_usuario="root";
	$db_contraseña="";
	
	require("index.php");
	
	$conexion=mysqli_connect($db_host,$db_usuario,$db_contraseña);
	
	if(mysqli_connect_errno()){
		echo "Fallo al conectar con las Base de Datos";
		exit();
	}

	mysqli_select_db($conexion, $db_nombrebd) or die ("No se encuentra la Base de Datos");
	
	mysqli_set_charset($conexion,"utf-8");
	
	$consulta="INSERT INTO mensajes (correo_electronico, asunto, mensaje)
				VALUES('$mail', '$asnt', '$msg')";	
	$resultados=mysqli_query($conexion, $consulta);	
	
	if($resultados==false){
		echo "Error en la consulta";
	}else{
		echo "Mensaje enviado";
	}
	
	mysqli_close($conexion);
	
?>
<script>
	window.location.href = "index.php"
</script>