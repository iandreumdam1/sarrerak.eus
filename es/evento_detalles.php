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

  if (isset($_GET["w1"])) {
    $_SESSION["id_evento"] = $_GET["w1"];
  }
  
  $aforo_restante = 0;

?>



<body>

  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">SARRERAK<span>.</span>EUS</a></h1>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="#"><a href="#.html">Servicios</a></li>
          <li class="#"><a href="crear_evento.php">Organizadores</a></li>
		      <li class="#"><a href="#.html">Clientes</a></li>
		      <li class="#"><a href="eventos.php">Compra de entradas</a></li>
          <li class="#"><a href="#.html">Euskara</a></li>

        </ul>
      </nav>

      <a href="pagina_personal.php" class="inicio_sesion scrollto"><?php
		    
        if(!isset($_SESSION["nombre_usuario_id"])){
          echo "Iniciar Sesión";
        }else{
          echo "Logeado como: " . $_SESSION["nombre_usuario_id"];
        }
        
	    ?></a>

    </div>
  </header>


  
  <?php
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

  <section id="hero" style ="height:30px" class="d-flex align-items-center justify-content-center">
   
  </section>

  

  <main id="main">
  <?php
                $DateTime = date('d-m-Y h:i:s a', time());  

                $consulta="SELECT *
                FROM eventos
                WHERE id = " .  $_SESSION['id_evento'] . "";
                /*WHERE fecha_evento > $DateTime*/	
                $resultados=mysqli_query($conexion, $consulta);	

    ?>


    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
            <h3>Elige cuantos asientos.</h3>
            <p class="font-italic">
              <!--Insertar aquí el for con los eventos próximos.-->

              
      </p>
             
            </table>
            
              <?php
                
               
              
                if($resultados==false){
                  echo "<br>Error en la consulta";
                  echo $resultados;
                }else{
                  echo "<br><table>";
                  while($fila=mysqli_fetch_array($resultados)){
                    echo "<tr>
                          <td class='col-4'>Foto</td>
                          <td class='col-8'>
                            <strong>" . $fila['nombre'] . "</strong>
                          </td>
                        </tr>
                        <tr>
                          <td colspan='2'>". $fila['descripcion'] . "</td>
                        </tr>";

                    $aforo_atual = $fila['aforo_actual'];
                    $aforo_total = $fila['aforo_total'];
                    $aforo_restante = $aforo_total - $aforo_atual;
                    $_SESSION["aforo_restante"] = $aforo_restante;
                    $_SESSION["aforo_actual"] = $aforo_atual;
                    
                  }


                  

                  
                  echo "</table>";

                  
                  
                  echo $aforo_total;

                  echo "<br><input type='number' class='form-control' name='seleccion_entradas' id='seleccion_entradas' placeholder='Entradas deseadas' data-rule-required='true' data-msg='Rellene este campo' /><br>";

                }
                
                
               
                
              ?>

              <button style='background-color: #000000; color: #ffffff;' onclick="confirmar()">Confirmar entradas</button>
               
              <!--LA FUNCION TIENE QUE IR AQUÍ SI O SI SINO NO FUNCIONA-->

              <script>
                function confirmar(){


                  var seleccion = document.getElementById("seleccion_entradas").value
                  
                  var entradas_restantes = "<?php echo$aforo_restante?>" 
                  

                  if(parseInt(seleccion) > parseInt(entradas_restantes)){
                    alert("Las entradas seleccionadas superan el aforo.")
                  }
                  else if(parseInt(seleccion) > 10){
                    alert("Como máximo puedes seleccionar 10 entradas.")
                  }
                  else if(parseInt(seleccion) <= 0){
                    alert("Por favor selecciona cuantas entradas quieres reservar.")
                  }
                
                  else{
                    <?php 
                      if($DateTime = null){
                        
                      }
                      $DateTime = date('d-m-Y h:i:s a', time()); 
                        $_SESSION["id_sesion"] = $DateTime;
                    ?>
                    window.location.href = "insertar_reserva.php" + "?w2=" + seleccion;
                    
                    
                  }
                }
              </script>
            <?php 
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