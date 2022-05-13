<!doctype html>
<html>
<head>
<meta charset"utf-8">
<title>Crear usuario</title>
</head>


<body>
<?php
	
	session_start();
	
	$usr=$_POST["login"];
	$psw=$_POST["password"];
	$ap1=$_POST["apellido1"];
	$ap2=$_POST["apellido2"];
	$nom=$_POST["nombre"];
	$cor=$_POST["correo"];

	$db_host="localhost";
	$db_nombrebd="sarrerak";
	$db_usuario="root";
	$db_contraseña="";
	
	//require("registro.php");
	
	$conexion=mysqli_connect($db_host,$db_usuario,$db_contraseña);
	
	if(mysqli_connect_errno()){
		echo "Fallo al conectar con las Base de Datos";
		exit();
	}
	
	mysqli_select_db($conexion, $db_nombrebd) or die ("No se encuentra la Base de Datos");
	
	mysqli_set_charset($conexion,"utf-8");
	$consulta1="SELECT COUNT(*) AS contador
				FROM usuarios
				WHERE correo_electronico LIKE '$cor'";
	$resultados1=mysqli_query($conexion, $consulta1);

	
	
	if($resultados1==false){
			
	}
	else{
	
		while($fila1=mysqli_fetch_array($resultados1)){
			
			if($fila1['contador']==1){
				header("Location: registro.php?error=1");
			}
			else{
				
				
				$consulta2="SELECT count(*) AS contador 
							FROM usuarios
							WHERE nombre_usuario_id LIKE '$usr'";
				$resultados2=mysqli_query($conexion, $consulta2);

				if($resultados2==false){
				
				}
				else{
					while($fila2=mysqli_fetch_array($resultados2)){
						if($fila2['contador']==1){
							header("Location: registro.php?error=2");
						}
						else{
							$consulta3="INSERT INTO usuarios (nombre_usuario_id, correo_electronico, contrasena, nombre, apellido1, apellido2) 
							VALUES('$usr', '$cor', '$psw', '$nom', '$ap1', '$ap2')";	
							$resultados3=mysqli_query($conexion, $consulta3);
							header("Location: enviar_confirmacion_registro.php?usr=".$usr);
						}

					}
					
				}
			}
			

			
		}
	}
	
	
	
	
	
	mysqli_close($conexion);
	
?>


</body>
</html>