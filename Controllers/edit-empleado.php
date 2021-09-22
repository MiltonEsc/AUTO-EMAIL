
<?php include ($_SERVER['DOCUMENT_ROOT'].'/AUTO-EMAIL/Views/pages/head.php');?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/AUTO-EMAIL/Views/pages/sidebar.php');?>
<!--<head>-->
<div class="main-panel">
    
<?php include ($_SERVER['DOCUMENT_ROOT']."/AUTO-EMAIL/conexion/db.php");?>
<?php
    setlocale(LC_TIME, "spanish");
    $fechaActual = strftime("%d de %B de %Y");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM personas WHERE id = $id";
        $update_persona = $mysqli->query($query);
        if (mysqli_num_rows($update_persona) == 1) {
            $row_update = mysqli_fetch_array($update_persona);
            $id = $row_update['id']; 
            $nombres = $row_update['nombres'];
            $correo = $row_update['correo'];
            $nac = $row_update['fecha_nacimiento'];
            $cargo = $row_update['cargo'];
            $exten = $row_update['exten'];
        }

        if (isset($_POST['update-empleado'])) {
            $id = $_GET['id'];
            $nombres = $_POST['nombres'];
            $correo = $_POST['correo'];
            $nac = $_POST['nac'];
            $cargo = $_POST['cargo'];
            $exten = $_POST['exten'];

            $query = "UPDATE personas set nombres = '$nombres', cargo = '$cargo', exten = '$exten', fecha_nacimiento = '$nac', correo = '$correo' WHERE id = $id";
            mysqli_query($mysqli, $query);
            $_SESSION['message'] = 'Person@ Actualizada Sastifactoriamente';
            $_SESSION['message_type'] = 'success';
            header("Refresh:0");
        }

       $foto_ruta = '../Archivos'.'/contenedor'.$id.'.png';
       echo "<script>alert($foto_ruta)</script>";
       if (file_exists($foto_ruta)) {
        echo "Esta variable está definida, así que se imprimirá";
       }else {
           echo "no definida";
       }
    }
?>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title">Actualizar Emplead@</h4>
                <p class="card-category">Complete el Registro para Actualizar un Emplead@</p>
            </div>
            <div class="card-body">
                <form action="edit-empleado.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nombres</label>
                        <input type="text" name="nombres" value="<?php echo $nombres;?>" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Correo</label>
                        <input type="email" name="correo" value="<?php echo $correo;?>" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="">Fecha de Nacimiento</label>
                        <input type="date" name="nac" value="<?php echo $nac;?>" class="form-control" placeholder="">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Cargo en la Empresa</label>
                        <input type="text" name="cargo" value="<?php echo $cargo;?>" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Extencion</label>
                        <input type="text" name="exten" value="<?php echo $exten;?> "class="form-control">
                    </div>
                    </div>
                </div>
                <button name="update-empleado"class="btn btn-warning pull-right">Actualizar Persona</button>
                <button id="btnCapturar" type="button" class="btn btn-danger">capturar foto</button>
                <!-- <div class="clearfix"></div> -->
                </form>
            </div>
        </div>
        <?php if (file_exists($foto_ruta)) {
           
         foreach ($update_persona as $ListarDatos) : ?>
            <div id="contenedor<?php echo $ListarDatos['id']?>" class="contenedor" style="width: 800px; height:600px; margin:0 auto;">
                <img id="fondo" src="<?php $_SERVER['DOCUMENT_ROOT']?>/AUTO-EMAIL/Views/img/Plantillacumpleanios.png" style="width: 800px; height:600px; z-index: -3; position: absolute;" alt="" srcset="">
                    <div style="padding-top: 60px; margin-left: 60px; width: 340px; height: 474px;">
                            <h4 style="text-align: center; margin-bottom: 2px; cursive;  font-size: 20px; color: #b45f06"></h4>
                            
                            <h4 style="text-align: center; margin-top: 58px; font-size: 15px; font-family: 'Exo', sans-serif; color: black;"><strong>Hoy <?php echo $fechaActual; ?></strong></h4>
                        <div class="foto">
                            <center><img src="<?php $_SERVER['DOCUMENT_ROOT']?>/AUTO-EMAIL/Views/assets/img/faces/perfil1.jpg" width="140" height="140"style="text-align: center; margin:0 auto;" alt="" srcset=""></center>
                        </div>
                        <center><h4 style="text-align: center; margin: 4px 0px 0px 0px; font-family: 'Courgette', cursive; font-weight: bold; font-size: 19px; color: #b45f06"><?php echo $ListarDatos['nombres']; ?></h4></center>
                            
                        <center><p style="text-align: center; font-family: 'Exo', sans-serif; margin: 0; font-size: 15px; color:black;"><strong><?php echo $ListarDatos['cargo']; ?></strong></p></center>
                        <center><p style="text-align: center; margin: 0; font-family: 'Exo', sans-serif;color:black; font-weight: 500;"><strong>Ext. <?php echo $ListarDatos['exten']; ?></strong></p></center>
                    </div>          
                </div>
            </div>
        <?php endforeach; ?> 
    <?php } else {
        echo "no existe esto";
    }?>
<script src="<?php $_SERVER['DOCUMENT_ROOT']?>../libraries/jquery-3.4.1.min.js"></script>     
<script src="<?php $_SERVER['DOCUMENT_ROOT']?>../libraries/html2canvas.min.js"></script>
<script src="../script.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#btnCapturar').click(function(){
      var cont = '<?php echo $ListarDatos['id']?>';

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
<?php include ($_SERVER['DOCUMENT_ROOT'].'/AUTO-EMAIL/Views/pages/navbar.php');?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/AUTO-EMAIL/Views/pages/footer.php');?>

</div>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/AUTO-EMAIL/Views/pages/customizer.php');?>
<img src="" alt="" srcset="">