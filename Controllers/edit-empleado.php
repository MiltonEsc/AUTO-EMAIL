
<?php include ($_SERVER['DOCUMENT_ROOT'].'/AUTO-EMAIL/Views/pages/head.php');?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/AUTO-EMAIL/Views/pages/sidebar.php');?>
<!--<head>-->
<div class="main-panel">
    
<?php include ($_SERVER['DOCUMENT_ROOT']."/AUTO-EMAIL/conexion/db.php");?>
<?php
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

            header("Location:../index.php");
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
                <!-- <div class="clearfix"></div> -->
                </form>
            </div>
        </div>
    </div>
</div>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/AUTO-EMAIL/Views/pages/navbar.php');?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/AUTO-EMAIL/Views/pages/footer.php');?>

</div>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/AUTO-EMAIL/Views/pages/customizer.php');?>