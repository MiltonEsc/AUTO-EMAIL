
 <?php
       include("./conexion/db.php");
       
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM personas WHERE id = $id";
        $result = $mysqli->query($query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $nombres = $row['nombres'];
            echo $nombres;
        }
    }
?>
