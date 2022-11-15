<?php

require('conexion.php');

$id_p = $_GET['id'];
// echo $id_p;
$sql_select = "SELECT * FROM archivos WHERE id_archivos='$id_p'";
$result = $conexion->query($sql_select);

if ($result->num_rows > 0)  {
    while($row = $result->fetch_assoc())    {
        $id_ar = $row['id_archivos'];
        $nom_arc = $row['nom_archivos'];
        $rt_arc = $row['ruta_archivos'];
        $idp_a = $row['id_pareja'];

            $sql_select = "SELECT * FROM parejas WHERE id_pareja='$idp_a'";
            $result = $conexion->query($sql_select);

            if ($result->num_rows > 0)  {
                while($row = $result->fetch_assoc())    {
                    $id_ph = $row['id_per_mas'];
                    $id_pm = $row['id_per_fem'];
                    $id_st = $row['id_sit_mat'];
                    $id_lg = $row['id_dts_lgs'];

                        $sql_select = "SELECT * FROM persona WHERE id_per='$id_ph'";
                        $result = $conexion->query($sql_select);

                        if ($result->num_rows > 0)  {
                            while($row = $result->fetch_assoc())    {
                                $id_padH = $row['id_padres'];
							}
						}

						$sql_select = "SELECT * FROM persona WHERE id_per='$id_pm'";
                        $result = $conexion->query($sql_select);

                        if ($result->num_rows > 0)  {
                            while($row = $result->fetch_assoc())    {
                                $id_padM = $row['id_padres'];
							}
						}
				
				}
			}

	}
}

$sqldelete =    "DELETE FROM archivos WHERE id_archivos='$id_p'"; 
                // AND (parejas WHERE id_pareja='$idp_a') 
                // AND (persona WHERE (id_per='$id_ph') AND (id_per='$id_pm')) 
                // AND (padres WHERE (id_padres='$id_padH') AND (id_padres='$id_padM')) 
                // AND (dts_legales WHERE id_dts_lgs='$id_lg')";

if($conexion->query($sqldelete) === TRUE){

    $sqldelete =    "DELETE FROM parejas WHERE id_pareja='$idp_a'"; 

    if($conexion->query($sqldelete) === TRUE){

        $sqldelete =    "DELETE FROM persona WHERE id_per='$id_ph'"; 

        if($conexion->query($sqldelete) === TRUE){

            $sqldelete =    "DELETE FROM padres WHERE id_padres='$id_padH'"; 

            if($conexion->query($sqldelete) === TRUE){

                $sqldelete =    "DELETE FROM dts_legales WHERE id_dts_lgs='$id_lg'"; 

                if($conexion->query($sqldelete) === TRUE){

                }
            }
        }

        $sqldelete =    "DELETE FROM persona WHERE id_per='$id_pm'"; 

        if($conexion->query($sqldelete) === TRUE){
            
            $sqldelete =    "DELETE FROM padres WHERE id_padres='$id_padM'"; 

            if($conexion->query($sqldelete) === TRUE){

                header('Location: ../view/view_archivos.php?idDelete='. $id_p .'');

            }
        }
    }
}else{
    header('Location: ../view/view_archivos.php?idDelete=0');
}