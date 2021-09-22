<?php include $_SERVER['DOCUMENT_ROOT']."/AUTO-EMAIL/conexion/db.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/AUTO-EMAIL/Views/pages/head.php";?>
<!--<head>-->
<?php include $_SERVER['DOCUMENT_ROOT']."/AUTO-EMAIL/Views/pages/sidebar.php";?>
<div class="main-panel">
      <!-- Navbar -->
      <?php include $_SERVER['DOCUMENT_ROOT']."/AUTO-EMAIL/Views/pages/navbar.php"?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
<?php
$cons_todos_resultado = "SELECT * FROM personas WHERE estado = 1";           	
$resultado_todos = $mysqli->query($cons_todos_resultado);
setlocale(LC_TIME, "spanish");
$fechaActual = strftime("%d de %B de %Y");
$cons_ultimo_reg = "SELECT * FROM personas WHERE estado = 1 ORDER BY id DESC LIMIT 1";
$resultado_cons_ultimo_reg = $mysqli->query($cons_ultimo_reg);
$esto = mysqli_fetch_assoc($resultado_todos);

foreach ($resultado_todos as $val) {
  $id = $val['id'];
  $id_array[] = $id;
  
}

  $cadena = implode('-', $id_array);
  echo $cadena;
$cont = 1;
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Template</title>
   <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,700;1,300&display=swap" rel="stylesheet">
 </head>
 <body style="margin: 0px; padding: 0px;">
    <div class="card  sticky-top ">
        <div class="card-body  z-index-1">
              <!-- markup -->
              <button id="OcultarImg" type="button" class="btn btn-default">Ocultar las fotos</button>
              <button id="MostrarImg" type="button" class="btn btn-default">Mostar todas las fotos</button>
              <button id="btnCapturar" type="button" class="btn btn-danger">capturar todas las fotos</button>
              <button id="btnCapturarUltimoRegistro" type="button" class="btn btn-success">Capturar solo la ultima foto</button>
        </div>
    </div>
    <div class="col-md-2">
        <input type="date" name="From" id="From" class="form-control" placeholder="From Date"/>
    </div>
    <div class="col-md-2">
        <input type="date" name="to" id="to" class="form-control" placeholder="To Date"/>
    </div>
    <div class="col-md-8">
        <input type="button" name="range" id="range" value="Range" class="btn btn-success"/>
    </div>
    <div class="clearfix"></div>
      <div id="imagenes">
      
          <?php foreach ($resultado_todos as $ListarDatos) : ?>
            
            <?php $ListarDatos['id'] ?>
  
        <div id="contenedor<?php echo $ListarDatos['id']?>" class="contenedor" style="width: 800px; height:600px; margin:0 auto;">
              <img id="fondo" src="<?php $_SERVER['DOCUMENT_ROOT']?>/AUTO-EMAIL/Views/img/Plantillacumpleanios.png" style="width: 800px; height:600px; z-index: -3; position: absolute;" alt="" srcset="">
                  <div style="padding-top: 60px; margin-left: 60px; width: 340px; height: 474px;">
                          <h4 style="text-align: center; margin-bottom: 2px; cursive;  font-size: 20px; color: #b45f06"></h4>
                          
                          <h4 style="text-align: center; margin-top: 58px; font-size: 15px; font-family: 'Exo', sans-serif; color: black;"><strong>Hoy <?php echo $fechaActual; ?></strong></h4>
                      <div class="foto">
                          <center><img src="<?php $_SERVER['DOCUMENT_ROOT']?>/AUTO-EMAIL/Views/assets/img/faces/perfil1.jpg" width="140" height="140"style="text-align: center; margin:0 auto;" alt="" srcset=""></center>
                      </div>
                      <center><h4 style="text-align: center; margin: 4px 0px 0px 0px; font-family: 'Courgette', cursive; font-weight: bold; font-size: 19px; color: #b45f06"><?php echo $ListarDatos['nombres']; ?></h4></center>
                          
                      <center><p style="text-align: center; font-family: 'Exo', sans-serif; margin: 0; font-size: 15px; color:black;"><strong>Director De Gestion Tecnica Comercial<?php echo $ListarDatos['cargo']; ?></strong></p></center>
                      <center><p style="text-align: center; margin: 0; font-family: 'Exo', sans-serif;color:black; font-weight: 500;"><strong>Ext. <?php echo $ListarDatos['exten']; ?></strong></p></center>
                  </div>          
            </div>
          <br>
          
          <?php
          $cont++;      
          endforeach; ?>
      </div>
      
          </div>
<script src="<?php $_SERVER['DOCUMENT_ROOT']?>../libraries/jquery-3.4.1.min.js"></script>     
<script src="<?php $_SERVER['DOCUMENT_ROOT']?>../libraries/html2canvas.min.js"></script>
<script src="../script.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#btnCapturar').click(function(){
      var cont = '<?php echo $ListarDatos['id']?>';
      alert(cont);

      for (let i = 1; i <= cont; i++) {
        
        tomarImagenPorSeccion('contenedor'+i,'contenedor'+i);  
      }
    });

    $('#OcultarImg').click(function(){
      $("#imagenes").css("display", "none");
      $("#padre").css("display", "none");
      
    });
    $('#MostrarImg').click(function(){
      $("#imagenes").css("display", "block");
      $("#padre").css("display", "block");
      
    });
  })
</script>
</div>
<?php include $_SERVER['DOCUMENT_ROOT']."/AUTO-EMAIL/Views/pages/footer.php"?>
<?php include $_SERVER['DOCUMENT_ROOT']."/AUTO-EMAIL/Views/pages/customizer.php"?>

