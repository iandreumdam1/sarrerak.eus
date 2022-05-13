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

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../assets/PHPMailer/src/Exception.php';
    require '../assets/PHPMailer/src/PHPMailer.php';
    require '../assets/PHPMailer/src/SMTP.php';

    //Consulta para introducir el mensaje del correo
    
    $consulta="SELECT eventos_inscripcion.id_entrada AS id_entrada, eventos.nombre AS nombre_evento, usuarios.nombre AS nombre, 
                          usuarios.apellido1 AS apellido, eventos.descripcion_breve AS descripcion, eventos.fecha_evento AS fecha, 
                          eventos.id AS id_evento, id_sesion, usuarios.correo_electronico AS email, usuarios.nombre_usuario_id AS nombre_usuario
                          FROM eventos_inscripcion
                          INNER JOIN eventos ON eventos_inscripcion.id_evento = eventos.id
                          INNER JOIN usuarios ON eventos_inscripcion.id_usuario = usuarios.nombre_usuario_id
                          WHERE id_evento =".$_SESSION['id_evento']." AND id_usuario LIKE '".$_SESSION["nombre_usuario_id"]."' ";
                
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
        $mail->Port = 465; // o 587 465
        $mail->Username = "sarrerak.eus@gmail.com";
        $mail->Password = "T1vlne1vc";

        while($fila=mysqli_fetch_array($resultados)){
            $mail->setFrom('sarrerak.eus@gmail.com', 'SARRERAK.EUS');
            $mail->addAddress($fila['email'], $fila['nombre']);
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Entradas para '.$fila['nombre_evento'].'.';
            $mail->Body = "Hola ".$fila['nombre']." te adjuntamos el enlace para imprimir las entradas de ".$fila['nombre_evento']."
                            <br>

                            
                            <a href='https://pruebas.grupoaxium.com/sarrerak.eus/es/imprimible_entradas.php?evn=".$_SESSION['id_evento']."&usr=".$_SESSION["nombre_usuario_id"]."'>IMPRIMIR ENTRADAS</a>
                            
                            <br>Puedes imprimir las entradas o puedes mostrarlas a la hora de acceder al evento. Si deseas imprimir estas entradas puedes entrar a tu area personal de SARRERAK.EUS pulsando en logeado como: ".$fila['nombre_usuario']." e imprimirlas.
                            <br>¡Muchas gracias por confiar en nosotros
                            </body>
                            </html>";
            /*<a href='https://pruebas.grupoaxium.com/sarrerak.eus/es/imprimible_entradas.php?evn=".$_SESSION['id_evento']."&usr=".$_SESSION["nombre_usuario_id"]."'>IMPRIMIR ENTRADAS</a>*/
          }


        $mail->send();
        echo 'El mensaje se ha enviado.';
        header('Location: entradas_reservadas.php');
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }