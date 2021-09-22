<?php

include("../conexion/db.php");
if(isset($_POST["From"], $_POST["to"]))
{
    $result = '';
    $query = "SELECT * FROM personas WHERE fecha_nacimiento BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."'";
    $sql = mysqli_query($mysqli, $query);
    $result .='
    <table class="table table-bordered">
    <tr>
    <th width="100">ID</th>
    <th>Customer Name</th>
    <th>Purchased Item</th>
    <th>Purchased Date</th>
    <th width="100">Price</th>
    </tr>';
    if(mysqli_num_rows($sql) > 0)
    {
        while($row = mysqli_fetch_array($sql))
        {
            $result .='
            <tr>
            <td>'.$row["id"].'</td>
            <td>'.$row["customer_name"].'</td>
            <td>'.$row["purchased_items"].'</td>
            <td>'.$row["purchased_date"].'</td>
            <td>'.$row["price"].'</td>
            </tr>';
        }
    }
    else
    {
        $result .='
        <tr>
        <td colspan="5">No Purchased Item Found</td>
        </tr>';
    }
    $result .='</table>';
    echo $result;
}
?>