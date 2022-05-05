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



<body>
<?php
	session_start();
?>


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

  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>SARRERAK<span>.</span>EUS</h1>
        </div>
      </div>

      <div class="row mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
        <div class="col-xl-2 col-md-4 col-6">
          <div class="icon-box">
            <i class="ri-store-line"></i>
            <h3><a href="eventos.php">Compra de entradas</a></h3>
          </div>
        </div>
    </div>
  </section>

  <main id="main">


    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="../assets/img/olentzero_detras_03.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
            <h3>Conócenos.</h3>
            <p class="font-italic">
              Nosotros somos una pequeña empresa de Ansoáin que tras ver los númerosos
              problemas a los que se enfrentan diversos espacios culturales y escénicos
              hemos decidido hacer una nueva plataforma que solvente todos ellos. Por ello
              es una plataforma por y para los espaciós escenicos y culturales, hecha Por
              y para Técnicos, Técnicas, Acomodadores, Acomodadoras, Taquilleros y Taquilleras.
            </p>
           
            <p>
              Esta plataforma está diseñada detalladamente para que sea fácil de usar
              y accesible para todos los públicos.
             </p>
          </div>
        </div>

      </div>
    </section>

    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Espacios</h2>
          <p>Espacios Asociados</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="../assets/img/espacios/rtn_logo.png" class="img-fluid" alt="">
                <div class="social">
                  <a href="https://www.youtube.com/channel/UC8rvtniqLJw05JlBECZgbjA"><i class="icofont-youtube"></i></a>
                  <a href="https://www.facebook.com/RedTeatrosNavarra"><i class="icofont-facebook"></i></a>
                  <a href="https://www.instagram.com/teatrosdenavarra/"><i class="icofont-instagram"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Red de teatros de Navarra</h4>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="../assets/img/espacios/ayuntamiento_de_ansoain_logo.png" class="img-fluid" alt="">
                <div class="social">
                  <a href="https://twitter.com/AntsoainAnsoain"><i class="icofont-twitter"></i></a>
                  <a href="https://www.facebook.com/AntsoainAnsoain"><i class="icofont-facebook"></i></a>
                  <a href="https://www.instagram.com/antsoainansoain/"><i class="icofont-instagram"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Teatro de Ansoáin</h4>
                <span>Espacio escénico</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="../assets/img/espacios/antsofest_logo_sombra.png" class="img-fluid" alt="">
                <div class="social">
                  <a href="https://www.facebook.com/antso.fest"><i class="icofont-facebook"></i></a>
                  <a href="https://www.instagram.com/antsofest/?hl=es"><i class="icofont-instagram"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Antso Fest</h4>
                <span>Productora audiovisual</span>
              </div>
            </div>
          </div>

        </div>
        <br>
        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2460.3101418361503!2d-1.6383472361032407!3d42.834451279348016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5092df91220557%3A0x1c72abb91e0b3cda!2sTeatro%20Anso%C3%A1in%2FAntsoaingo%20Antzokia!5e0!3m2!1ses!2ses!4v1651310435575!5m2!1ses!2ses" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" frameborder="0"></iframe>
        </div>

      </div>
    </section>

    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contacto</h2>
          <p>Contactanos</p>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Lugar:</h4>
                <p>Plaza Berria, Ansoáin, 31013</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>sarrerak.eus@gmail.com</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="email.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Correo Electrónico" data-rule="email" data-msg="Ponga un correo válido" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto" data-rule="minlen:4" data-msg="Rellene este campo" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="mensaje" id="mensaje" rows="5" data-rule="required" data-msg="Rellene este campo" placeholder="Mensaje"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Cargando</div>
                <div class="error-message"></div>
                <div class="sent-message">Tu mensaje ha sido enviado.</div>
              </div>
              <div class="text-center"><button type="submit">Enviar mensaje</button></div>
            </form>
        
          </div>

        </div>

      </div>


      
    </section>

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