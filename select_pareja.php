<?php

include('conexion.php');

$sql_select = "SELECT * FROM parejas";
$result = $conexion->query($sql_select);

if ($result->num_rows > 0)  {
    while($row = $result->fetch_assoc())    {
        echo $row['id_pareja'];	
        echo $row['fecha_par'];	
        echo $row['id_sit_mat'];	
        echo $row['id_per_mas'];	
        echo $row['id_per_fem'];	
        echo $row['id_dts_lgs'];	
    };
}

?>