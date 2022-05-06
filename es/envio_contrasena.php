<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Comprobar login</title>
</head>


<body>
<?php
	
	
	$psw1=$_POST["contrasena1"];
	$psw2=$_POST["contrasena2"];
	$usr=$_POST["usuario"];
	$mail=$_POST["correo"];

	$db_host="localhost";
	$db_nombrebd="sarrerak";
	$db_usuario="root";
	$db_contraseña="";
	
	require("cambiar_contrasena.php");
	
	if($psw1 != $psw2){
		echo "La contraseña no coincidea";
	}
	else{

		$conexion=mysqli_connect($db_host,$db_usuario,$db_contraseña);
		
		if(mysqli_connect_errno()){
			echo "Fallo al conectar con las Base de Datos";
			exit();
		}
		
		mysqli_select_db($conexion, $db_nombrebd) or die ("No se encuentra la Base de Datos");
		
		mysqli_set_charset($conexion,"utf-8");
		
		$consulta1="SELECT correo_electronico
					FROM usuarios
					WHERE nombre_usuario_id = '$usr'";
		$resultados1=mysqli_query($conexion, $consulta2);

		if($resultados1==false){
			header("Location: cambiar_contrasena.php?error=1");
		}else{
			while($fila=mysqli_fetch_array($resultados)){
				if($fila['correo_electronico'] != $mail){
					header("Location: cambiar_contrasena.php?error=2");
				}
				else{
					$consulta2="UPDATE usuarios SET contrasena='$psw' WHERE nombre_usuario_id= '$usr'";
					$resultados2=mysqli_query($conexion, $consulta2);	
					
					if($resultados2==false){
						header("Location: cambiar_contrasena.php?error=3");
					}
					else{
						header("Location: pagina_personal.php");
					}
				}
			}
		}
		
		
		
		mysqli_close($conexion);

	}
	
?>


</body>
</html>