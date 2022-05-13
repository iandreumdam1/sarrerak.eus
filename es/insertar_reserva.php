<!doctype html>
<html>
<head>
<meta charset"utf-8">
<title>Reserva entradas</title>
</head>


<body>
<?php
	session_start();

	//Comprobar y recoger variables de variables de sesión y pasadas por URL.
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
	//Parametros generación QR.
	require '../assets/phpqrcode/qrlib.php';

	$directorio = '../assets/img/qr_provisionales/';

	if(!file_exists($directorio)){
		mkdir($directorio);
	}

	$tamano = 10;
	$nivel_precision = 'M';
	$tamano_marco = 3;
	



	//Conexión con la BD.

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
		

		$consulta1="INSERT INTO eventos_inscripcion(id_evento, id_usuario, id_sesion)
					VALUES ('$evnt', '$usr', '$idse')";
		$resultados1=mysqli_query($conexion, $consulta1);
		
		$consulta2 ="SELECT id_entrada
					FROM eventos_inscripcion 
					ORDER BY id_entrada DESC
					LIMIT 1";
		$resultados2=mysqli_query($conexion, $consulta2);

		while($fila=mysqli_fetch_array($resultados2)){
			$nombre_qr = $directorio.$fila['id_entrada'].'.png';
			$contenido = $fila['id_entrada'];
			QRcode::png($contenido, $nombre_qr, $nivel_precision, $tamano, $tamano_marco);

			$imagen = $_FILES[$nombre_qr]['tmp_name'];
        	$imagen_contenido = addslashes(file_get_contents($nombre_qr));

			$consulta3="UPDATE eventos_inscripcion
			SET codigo_qr = '".$imagen_contenido."'
			WHERE id_entrada = ".$fila['id_entrada']."";
			$resultados3=mysqli_query($conexion, $consulta3);

			unlink($nombre_qr);

			if($resultados3==false){
				echo "Error en la consulta de inserción de imagen.";
			}
			
		}
		if($resultados1==false){
			echo "Error en la consulta de inserción.";
		}

		if($resultados2==false){
		  echo "Error en la consulta de selección.";
		}
	
	}
	
	$consulta4="UPDATE eventos
				SET  aforo_actual = '$af_a' 
				WHERE id = '$evnt'";
	
	$resultados4=mysqli_query($conexion, $consulta2);	
	
	mysqli_close($conexion);

	echo "<script>window.location.href = 'enviar_entradas_email.php'</script>";
	
?>
<?php
	
	
?>


</body>
</html>