<!DOCTYPE html>
<html>
    <head>
	    <meta charset="UTF-8"> 
        <title>SMR - Cierre</title>  
    </head>
	
    <body>	
	<?php
		session_start();
		session_destroy();
		header("location:iniciar_sesion.php");
	?>
	
    </body>
</html>