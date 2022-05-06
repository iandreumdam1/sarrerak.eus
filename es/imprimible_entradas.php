<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SARRERAK.EUS</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  
  <link href="../assets/img/icono_SE.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">


  <link href="../assets/css/style.css" rel="stylesheet">

  <link href="../assets/PHP/style.css" rel="stylesheet">


</head>

<?php
  session_start();

  $db_host="localhost";
	$db_nombrebd="sarrerak";
	$db_usuario="root";
	$db_contraseña="";
	
  $conexion=mysqli_connect($db_host,$db_usuario,$db_contraseña);
	
	if(mysqli_connect_errno()){
		echo "Fallo al conectar con las Base de Datos";
		exit();
	}
	
	mysqli_select_db($conexion, $db_nombrebd) or die ("No se encuentra la Base de Datos");
	
	mysqli_set_charset($conexion,"utf-8");
?>

  

  <main id="main">
  <?php
                $DateTime = date('d-m-Y h:i:s a', time());  

                /*$consulta="SELECT count(*) AS numero, e.nombre
                FROM eventos_inscripcion
                JOIN eventos e ON eventos_inscipcion.id_evento=eventos.id
                WHERE id_evento = " .  $_SESSION['id_evento'] . " AND id_usuario LIKE '" . $_SESSION["nombre_usuario_id"] . "'";
                */
                $consulta="SELECT eventos_inscripcion.id_entrada AS id_entrada, eventos.nombre AS nombre_evento, usuarios.nombre AS nombre, 
                          usuarios.apellido1 AS apellido, eventos.descripcion_breve AS descripcion, eventos.fecha_evento AS fecha, 
                          eventos.id AS id_evento, id_sesion
                          FROM eventos_inscripcion
                          INNER JOIN eventos ON eventos_inscripcion.id_evento = eventos.id
                          INNER JOIN usuarios ON eventos_inscripcion.id_usuario = usuarios.nombre_usuario_id
                          WHERE id_evento =".$_SESSION['id_evento']." AND id_usuario LIKE '".$_SESSION["nombre_usuario_id"]."' ";
                
                $resultados=mysqli_query($conexion, $consulta);	

    ?>


    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
            <h3>Tu reserva.</h3>
             
            </table id="imprimible">
            
              <?php
                
                if($resultados==false){
                  echo "<br>Error en la consulta";
                  echo $resultados;
                }else{
                  echo $_SESSION["id_sesion"];
                  
                  while($fila=mysqli_fetch_array($resultados)){
                    echo "<br><table frame='box' class='col-12'>";
                    echo "<tr style='height: 250px;'>
                            <td style='width: 200px; padding-left: 10px;'><img src='ver_imagen.php?id=".$fila['id_evento']."' alt='Imagen del evento.' ></td>
                            <td >
                              <strong>" . $fila['nombre_evento'] . "</strong>
                              <br>
                              ".$fila['descripcion']."
                              <br>
                              <a>Fecha y hora: ".$fila['fecha']."</a><br>
                              <a>Nombre: ". $fila['nombre'] . ", ". $fila['apellido'] . "</a>
                            </td>
                            <td style='width: 200px;'>Código QR".$fila['id_entrada']."</td>
                          </tr>";
                    echo "</table>";
                    
                  }
                 
                 


                }
                
                
               
                
              ?>
              <br>
              <button style='background-color: #000000; color: #ffffff;' onclick="imprimir()">Inprimir entradas</button>
              <button style='background-color: #000000; color: #ffffff;' onclick="volver()">Volver</button>
               
              <!--LA FUNCION TIENE QUE IR AQUÍ SI O SI SINO NO FUNCIONA-->

              <script>
                window.print();
                function imprimir(){
                  window.print();
                }
                function volver(){
                  window.location = "entradas_reservadas.php";
                  
                }
               
              </script>
            <?php 
               mysqli_close($conexion);
            ?>

          </div>
        </div>


      </div>

  </main>



  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>


  <script src="../assets/js/main.js"></script>

</body>

</html>