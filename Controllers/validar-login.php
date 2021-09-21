<?php
    $usuarios = $_POST['usuario'];
    $password = $_POST['password'];
    include $_SERVER['DOCUMENT_ROOT']."/AUTO-EMAIL/conexion/db.php";
    $_SESSION['usuarios'] = $usuarios;
    $_SESSION['password'] = $password;

    $query = "SELECT * FROM usuarios WHERE usuario = '$usuarios' AND contraseña='$password'";
    $result = $mysqli->query($query);

    $fila = mysqli_num_rows($result);
    if ($fila) {
        header("Location:../home.php");
    }else {
        ?>
        <script>
            alert("Error de auntenticación");
        window.setTimeout(function() {
            window.location = '../index.php';
        }, );
        
        </script>
 <?php
    }
    mysqli_free_result($result);
    mysqli_close($mysqli);
    ?>
    