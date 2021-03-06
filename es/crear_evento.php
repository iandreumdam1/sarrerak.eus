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
?>

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
          echo "Iniciar Sesi??n";
        }else{
          echo "Perfil de: " . $_SESSION["nombre_usuario_id"];
        }
        
	    ?></a>

    </div>
  </header>

<?php
	
	if(!isset($_SESSION["nombre_usuario_id"])){
		header("Location:iniciar_sesion.php"."?rp="."crear_evento.php");
	}
  if($_SESSION["tipo_usuario"] != 2){
		header("Location:index.php"."?rp="."crear_evento.php");
	}

  $usr=$_SESSION["nombre_usuario_id"];
	
?>



  <section id="hero" class="d-flex align-items-center justify-content-center" style="height:250px;">
  
    <h1>Crea un evento, 
    <?php
       echo $_SESSION["nombre_usuario_id"];
       
	  ?>.</h1>
  </section>

  <main id="main">


    <!--Formulario de insertar eventos en la BD-->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12 pt-12 pt-lg-12 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
            <h3>Crear un evento.</h3>
            <p class="font-italic">
              
            <div class="text-right"><button type="submit" style='background-color: #000000; color: #ffffff;' onclick="editar()">Editar un evento</button></div>
            <br>
              <div class="col-lg-12 mt-12 mt-lg-12" style="align:center;">
                <form action="insertar_evento.php" method="post" role="form" enctype="multipart/form-data">
                  <div class="form">
                    <div class="form-group">
                      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del evento" data-rule="minlen:4" data-msg="Ponga un nombre del evento v??lido" required/>
                      <div class="validate"></div>
                    </div>
                  </div>
                  <div class="form">
                    <div class="form-group">
                      <input type="text" class="form-control" name="descripcion_corta" id="descripcion_corta" placeholder="Breve descripci??n" data-rule="minlen:4" data-msg="Rellene este campo" required/>
                      <div class="validate"></div>
                    </div>
                    </div>
                  <div class="form">
                    <div class="form-group">
                      <textarea class="form-control" name="descripcion" id="descripcion" rows="5" data-rule="required" data-msg="Rellene este campo" placeholder="Descripci??n del evento." required></textarea>
                      <div class="validate"></div>
                    </div>
                  </div>
                  <div class="form">
                    <div class="form-group">
                      <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen del evento" required/>
                      <div class="validate"></div>
                    </div>
                    </div>
                  <div class="form">
                    <div class="form-group">
                      <input type="number" class="form-control" name="aforo_total" id="aforo_total" placeholder="Aforo del evento" data-rule-required="true" data-msg="Rellene este campo" required/>
                      <div class="validate"></div>
                    </div>
                  </div>
                  <div class="form">
                    <div class="form-group">
                      <input type="datetime-local" class="form-control" name="fecha_evento" id="fecha_evento" placeholder="Fecha del evento" data-rule-required="true" data-msg="Rellene este campo" required/>
                      <div class="validate"></div>
                    </div>
                  </div>
                  <!--<div class="mb-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Tu mensaje ha sido enviado.</div>
                  </div>-->
                  <div class="text-center"><button type="submit" style='background-color: #000000; color: #ffffff;'>Crear evento</button></div>
                  
                </form>
            
              </div>
              
            </p>
            <?php
              
            ?>
           
          </div>
        </div>

      </div>

  </main>

  <script>
    function editar(){
      window.location = "eventos_editar.php";
    }

  </script>

  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>SARRERAK<span>.</span>EUS</h3>
              <p>
                <strong>Tel??fono:</strong> 601107126<br>
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
              <li><i class="bx bx-chevron-right"></i> <a href="#">T??rminos</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pol??tica de privacidad</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Servicios</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Gestion integral de entradas.</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Acomodaci??n.</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Sonido.</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Iluminaci??n.</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Personal t??cnico.</a></li>
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