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
<?php
    session_start();

    if (isset($_GET["usr"])) {
		  $usuario = $_GET["usr"];
	  }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../assets/PHPMailer/src/Exception.php';
    require '../assets/PHPMailer/src/PHPMailer.php';
    require '../assets/PHPMailer/src/SMTP.php';

    //Consulta para introducir el mensaje del correo
    
    $consulta="SELECT nombre, apellido1, apellido2, correo_electronico
                          FROM usuarios
                          
                          WHERE  nombre_usuario_id LIKE '".$usuario."' ";
                
    $resultados=mysqli_query($conexion, $consulta);	

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );

        $mail->IsSMTP(); // habilita SMTP
        $mail->SMTPDebug = 1; // debugging: 1 = errores y mensajes, 2 = sólo mensajes
        $mail->SMTPAuth = true; // auth habilitada
        $mail->SMTPSecure = 'ssl'; // transferencia segura REQUERIDA para Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // o 587- 465
        $mail->Username = "sarrerak.eus@gmail.com";
        $mail->Password = "T1vlne1vc";
        //$mail->SetFrom("example@gmail.com");
        //$mail->Subject = "Test";
        //$mail->Body = "hola";

        
        while($fila=mysqli_fetch_array($resultados)){
            $mail->setFrom('sarrerak.eus@gmail.com', 'ATENCION AL CLIENTE');
            $mail->addAddress($fila['correo_electronico'], $fila['nombre']);
            //Content
            $mail->isHTML(true);//Set email format to HTML
            $mail->Subject = 'Bienvenido a SARRERAK.EUS '.$fila['nombre'].'.';
            $mail->Body  = "<h1>Información sobre su cuenta</h1>
                            Estimado/a Sr./Sra. ".$fila['apellido1']." ".$fila['apellido2'].":
                            <br>Le agradecemos que haya elegido SARRERAK.EUS.
                            Hemos recibido su solicitud de alta de usuario. Puede iniciar sesión a traves de nuestra <a href='http://www.ibaiandreu.es'>web</a> 
                            o pulsando en el siguiente <a href='https://pruebas.grupoaxium.com/sarrerak.eus/es/iniciar_sesion.php'>enlace</a>.
                            <br>
                            Recuerde que estamos a su disposición para lo que necesite. Puede ponerse en contacto con nosotros a traves de este correo o en el 
                            formulario de contacto de nuestra web.
                            <br>
                            Un saludo del equipo de SARRERAK.EUS
                            <br>¡Muchas gracias por confiar en nosotros!";
            
          }
        
        $mail->send();
        echo 'Message has been sent';
        header('Location: iniciar_sesion.php');
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }