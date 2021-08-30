<?php 

    include("../conexion/db.php");
    session_start();
    if (isset($_POST['save-empleado'])) {
        $id = 
        $nombres = $_POST['nombres'];
        $correo = $_POST['correo'];
        $nac = $_POST['nac'];
        $cargo = $_POST['cargo'];
        $exten = $_POST['exten'];
        
        $query = "INSERT INTO personas (nombres, correo, fecha_nacimiento, cargo, exten) VALUES ('$nombres', '$correo','$nac', '$cargo','$exten' )";
        $result = $mysqli->query($query);
        if (!$result) {
            echo "Error:";
        }else {

            $_SESSION['message'] = 'Persona registrada!';
            $_SESSION['message_type'] = 'success';

            header("Location:../index.php");
        }

        
    }

