<!DOCTYPE html>
<html>
    <head>
	    <meta charset="UTF-8"> 
        <title>Cerrando Sesión</title>  
    </head>
	
    <body>	
	<?php
		session_start();
		session_destroy();
		header("location:iniciar_sesion.php");
	?>
	
    </body>
</html>