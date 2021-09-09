<?php
    // permite hacer cambios y testear sin necesidad de enviar correos
	define("DEMO", false); // cuanto esta en TRUE ningun correo podra ser enviado.
	// llamamos la conexion a la base de datos
	include ($_SERVER['DOCUMENT_ROOT']."/AUTO-EMAIL/conexion/db.php");
	// comsultas simples una trae quien cumple años hoy y la otra me selecciona todos los campos de tabla
	$cons_fecha = "SELECT * FROM personas WHERE DATE_FORMAT(fecha_nacimiento, '%m-%d') = DATE_FORMAT(now(),'%m-%d')";           
	$cons_correo = "SELECT * FROM personas";		
	$resultado_cons_correo = $mysqli->query($cons_correo);
	$resultado_cons_fecha = $mysqli->query($cons_fecha); 

	// cabeceras del correo
	$email_from = "SuperBrix <miltonescorcia2020@gmail.com>";
	$email_headers = "From: ".$email_from."\r\nReply-To: ".$email_from."\r\n";
	$email_headers .= "MIME-Version: 1.0\r\n";
	$email_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	//este while recorre la pantilla
	while ($datos = $resultado_cons_fecha->fetch_assoc()){
		$id = $datos['id'];
		$nombres[] = $datos['nombres'];
		$ruta = "Archivos/";
		$ruta_completa = $ruta . $id;
		$etiqueta[] = '<h1> src="[TEMPLATE]" alt="plantilla" srcset=""</h1>';
		$etiqueta = str_replace('[TEMPLATE]' , $ruta_completa.'.png', $etiqueta);
			
		$email_subject = 'Feliz Cumpleanos! ' . implode(", ", $nombres);
		$cadena = implode('</br>', $etiqueta);
		var_dump($cadena);
	}
	

	//este while envia el correo a multiples destinatarios
	while ($persona = $resultado_cons_correo->fetch_assoc()) {
		$to[] = $persona['correo'];
    	$sent_to = implode(",", $to);
  	}
	
	echo $sent_to;
	
	if (DEMO)
	die("<hr /><center>Esto es un demo de la plantilla HTML. El correo no fue enviado. </center>");	
	//comprobamos el envio de correo
	if (mail($sent_to, $email_subject, $cadena, $email_headers) ){
		echo '<hr /><center>Exitoo! Tu Correo ha sido enviado a '. print_r($sent_to) .'</center>';
	}

?>