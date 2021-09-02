

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="x-apple-disable-message-reformatting">
  <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
  <title>Modelo del Template</title>
<!--[if !mso]><!--><link href="https://fonts.googleapis.com/css2?family=Courgette&family=Exo&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet"><!--<![endif]-->
  <style>
 
  </style>

</head>
<body style="margin: 0px; padding: 0px;">
<div id="contenedor"class="container" style="width: 800px; height:600px; margin:0 auto;">
  <img id="fondo" src="Views/contenido/Plantillacumpleanios.png" style="width: 800px; height:600px; z-index: -3; position: absolute;" alt="" srcset="">
			<div style="padding-top: 60px; padding-left: 55px; width: 340px; height: 474px;">
              <h4 style="text-align: center; margin-bottom: 2px; font-family: 'Courgette', cursive; font-size: 20px; color: #b45f06"></h4>
              <p style="text-align: center; margin-top: 0; font-family: 'Exo', sans-serif; padding-top: 28px;"><strong>Hoy [FECHA]</strong></p>
          <div class="foto">
              <center><img src="image.png" width="140" height="140"style="text-align: center; margin:0 auto;" alt="" srcset=""></center>
          </div>
          <center><h4 style="text-align: center; margin-top: 5px; margin-bottom: 2px; padding-top: 2px; font-family: 'Courgette', cursive; font-size: 20px; color: #b45f06">[TO_NAME]</h4></center>
              
          <center><p style="text-align: center; margin-bottom: 2px; font-family: 'Exo', sans-serif; margin-top: 5px;"><strong>[CARGO]</strong></p></center>
          <center><p style="text-align: center; margin-top: 2px; font-family: 'Exo', sans-serif;"><strong>Exten. [EXTEN]</strong></p></center>
          <!-- <p style="text-align: center;">A nombre de nuestra gran familia empresarial, le enviamos un saludo muy especial deseándole un <strong>Feliz Cumpleaños</strong>. Queremos expresar el afecto y admiración que sentimos hacia usted.</p> -->
      </div>          
</div>

<div id="contenedorCanvas" style="border: 1px solid red;">
</div>
<center><img id="can" src="" alt="" srcset=""></center>
<!-- <button id="btnCapturar">Tomar captura</button> -->
        <script src="libraries/jquery-3.4.1.min.js"></script>     
        <script src="libraries/html2canvas.min.js"></script>
        <script src="script.js"></script>
        <script>
          tomarImagenPorSeccion('contenedor','[ID]')
        </script>
</body>


