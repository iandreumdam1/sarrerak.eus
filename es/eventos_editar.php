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

  if(!isset($_SESSION["nombre_usuario_id"])){
		header("Location:iniciar_sesion.php"."?rp="."crear_evento.php");
	}
  if($_SESSION["tipo_usuario"] != 2){
		header("Location:index.php"."?rp="."crear_evento.php");
	}

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

<script>
    function redirigir(id){      
    
      window.location.href = "editar_evento_formulario.php" + "?w1=" + id; 
    }
  </script>

<body>

<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">SARRERAK<span>.</span>EUS</a></h1>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="#"><a href="crear_evento.php">Organizadores</a></li>
		      <li class="#"><a href="acomodadores_eventos.php">Acomodadores</a></li>
		      <li class="#"><a href="eventos.php">Compra de entradas</a></li>
          <li class="#"><a href="../eus/index.php">Euskara</a></li>

        </ul>
      </nav>

      <a href="pagina_personal.php" class="inicio_sesion scrollto"><?php
		    
        if(!isset($_SESSION["nombre_usuario_id"])){
          echo "Iniciar Sesión";
        }else{
          echo "Perfil de: " . $_SESSION["nombre_usuario_id"];
        }
        
	    ?></a>

    </div>
  </header>


  
  
  <section id="hero" style ="height:30px" class="d-flex align-items-center justify-content-center">
    
  </section>

  <main id="main">


    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
            <h3>Edición de eventos.</h3>
            <p class="font-italic">
              <!--Insertar aquí el for con los eventos próximos.-->

              
      </p>
             
            </table>
            
              <?php
                $DateTime = date('Y-m-d h:i:s a', time());  

                echo "La fecha y hora actual es $DateTime.";

                $consulta="SELECT id, nombre, descripcion_breve, fecha_evento
                FROM eventos
                WHERE fecha_evento > '$DateTime' AND usuario_creacion = '".$_SESSION["nombre_usuario_id"]."'ORDER BY fecha_evento ASC";
                
                $resultados=mysqli_query($conexion, $consulta);	

                if($resultados==false){
                  echo "<br>Error en la consulta";
                  echo $resultados;
                }else{
                  echo "<br><table>";
                  while($fila=mysqli_fetch_array($resultados)){
                    echo "<tr style='height: 250px'>
                          <td class='col-4'><img src='ver_imagen.php?id=".$fila['id']."' alt='Imagen del evento.'></img></td>
                          <td class='col-8'>
                            <br><strong>" . $fila['nombre'] . "</strong><br>
                            <br>". $fila['descripcion_breve'] ."
                            <br>". $fila['fecha_evento'] ."
                            <br>
                            <button style='background-color: #000000; color: #ffffff; margin-top: 20px;' onclick='redirigir(" . $fila['id'] . ")'>Editar evento</button>
                            <hr>
                          </td>
                          
                        </tr>";
                  }
                  
                  echo "</table>";
                  
                  

                }
                
                mysqli_close($conexion);
                
              ?>
            
           
          </div>
        </div>

      </div>

  </main>

 

  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>SARRERAK<span>.</span>EUS</h3>
              <p>
                <strong>Teléfono:</strong> 601107126<br>
                <strong>Email:</strong> sarrerak.eus@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Sobre nosotros</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Servicios</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Términos</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Política de privacidad</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Servicios</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Gestion integral de entradas.</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Acomodación.</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Sonido.</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Iluminación.</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Personal técnico.</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>


<div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>SARRERAK</span></strong>.<strong>EUS</strong> Todos los derechos reservados
      </div>
      <div class="credits">

        Editado por Ibai Andreu.
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Gp</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
       
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  


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