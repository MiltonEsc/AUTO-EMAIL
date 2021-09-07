<?php
//llamado a la base de datos
include ($_SERVER['DOCUMENT_ROOT']."/AUTO-EMAIL/conexion/db.php");
// comsultas que muestra quien esta cumpliendo años hoy
$cons_fecha = "SELECT * FROM personas WHERE DATE_FORMAT(fecha_nacimiento, '%m-%d') = DATE_FORMAT(now(),'%m-%d')";           	
$resultado_cons_fecha = $mysqli->query($cons_fecha); 
$fechaActual = date('d-m-Y');
$cont = 0;
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Template</title>
   <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
 </head>
 <body style="margin: 0px; padding: 0px;">
 <button id="btnCapturar">Tomar captura</button>
 
    <?php foreach ($resultado_cons_fecha as $ListarDatos) : ?>
      
      <div data-<?php echo $cont ?>="<?php echo $ListarDatos['id'] ?>" id="contenedor<?php echo $cont?>" style="width: 800px; height:600px; margin:0 auto;"<?php echo $ListarDatos['id']; ?>>
        <img id="fondo" src="<?php $_SERVER['DOCUMENT_ROOT']?>/AUTO-EMAIL/Views/img/Plantillacumpleanios.png" style="width: 800px; height:600px; z-index: -3; position: absolute;" alt="" srcset="">
            <div style="padding-top: 60px; padding-left: 55px; width: 340px; height: 474px;">
                    <h4 style="text-align: center; margin-bottom: 2px; font-family: 'Courgette', cursive; font-size: 20px; color: #b45f06"></h4>
                    <p style="text-align: center; margin-top: 0; font-family: 'Exo', sans-serif; padding-top: 28px;"><strong>Hoy <?php echo $fechaActual; ?></strong></p>
                <div class="foto">
                    <center><img src="<?php $_SERVER['DOCUMENT_ROOT']?>/AUTO-EMAIL/Views/assets/img/faces/perfil1.jpg" width="140" height="140"style="text-align: center; margin:0 auto;" alt="" srcset=""></center>
                </div>
                <center><h4 style="text-align: center; margin-top: 5px; margin-bottom: 2px; padding-top: 2px; font-family: 'Courgette', cursive; font-size: 25px; color: #b45f06"><?php echo $ListarDatos['nombres']; ?></h4></center>
                    
                <center><p style="text-align: center; margin-bottom: 2px; font-family: 'Exo', sans-serif; margin-top: 5px;"><strong><?php echo $ListarDatos['cargo']; ?></strong></p></center>
                <center><p style="text-align: center; margin-top: 2px; font-family: 'Exo', sans-serif;"><strong>Exten. <?php echo $ListarDatos['exten']; ?></strong></p></center>
            </div>          
      </div>
      <br>
      <?php
      $cont++;      
     endforeach; ?>
 
<!-- <button id="btnCapturar">Tomar captura</button> -->
<script src="<?php $_SERVER['DOCUMENT_ROOT']?>../libraries/jquery-3.4.1.min.js"></script>     
<script src="<?php $_SERVER['DOCUMENT_ROOT']?>../libraries/html2canvas.min.js"></script>
<script src="../script.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#btnCapturar').click(function(){
      
      var cont = '<?php echo $cont ?>';
      alert(cont);

      for (let i = 0; i < cont; i++) {
        var id = $('#contenedor'+i).data(i);
        alert(id);
        tomarImagenPorSeccion('contenedor'+i, id);  
        
      }
      
    })
  })
</script>
        
</body>
 </html>


