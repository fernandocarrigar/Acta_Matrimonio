<?php

require('conexion.php');
include_once('var_insert.php');
include_once('clcedad.php');

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

$sqlupdate =    "UPDATE parejas
                    SET id_sit_mat = '$tpreg'
                        WHERE id_pareja='$idp_a'";

if ($conexion->query($sqlupdate) === TRUE) {

	} else {
		echo "Error updating record: " . $conn->error;
	}


$sqlupdate =    "UPDATE persona
                    SET nombre_per = '$nameH', ap_paterno_per = '$apPH', ap_materno_per = '$apMH', fecha_nac_per = '$fch_nacH', edad_per = '$edadH', 
                        id_nac = '$nacH', id_genero = '$genH', lug_nac_per = '$lugnacH', domicilio_per = '$domicH', ocupacion_per = '$ocupacH'
                    WHERE id_per='$id_ph'";

if ($conexion->query($sqlupdate) === TRUE) {
	
	} else {
		echo "Error updating record: " . $conn->error;
	}

$sqlupdate =    "UPDATE persona
                    SET nombre_per = '$nameM', ap_paterno_per = '$apPM', ap_materno_per = '$apMM', fecha_nac_per = '$fch_nacM', edad_per = '$edadM', 
                        id_nac = '$nacM', id_genero = '$genM', lug_nac_per = '$lugnacM', domicilio_per = '$domicM', ocupacion_per = '$ocupacM'
                        WHERE id_per='$id_pm'";

if ($conexion->query($sqlupdate) === TRUE) {

	} else {
	echo "Error updating record: " . $conn->error;
  	}


$sqlupdate =    "UPDATE dts_legales
                SET dts_entidad = '$enti', dts_delegacion = '$deleg', dts_juzgado = '$juzg', dts_libro = '$lbro', dts_clase = '$clase'
                WHERE id_dts_lgs='$id_lg'";

if ($conexion->query($sqlupdate) === TRUE) {

	} else {
	echo "Error updating record: " . $conn->error;
	}

$sqlupdate =    "UPDATE padres
				SET nombre_pad = '$padreH', nombre_mad = '$madreH', domicilio_pad = '$dompadH', ocupacion_pad = '$ocupadH', ocupacion_mad = '$ocumadH'
                WHERE id_padres='$id_padH'";

if ($conexion->query($sqlupdate) === TRUE) {

	} else {
		echo "Error updating record: " . $conn->error;
	}

$sqlupdate =    "UPDATE padres
				SET nombre_pad = '$padreM', nombre_mad = '$madreM', domicilio_pad = '$dompadM', ocupacion_pad = '$ocupadM', ocupacion_mad = '$ocumadM'
                WHERE id_padres='$id_padM'";

if ($conexion->query($sqlupdate) === TRUE) {

} else {
	echo "Error updating record: " . $conn->error;
}


//----------------------------------------------------------    GENERACION NUEVO PDF    ---------------------------------------------------------------//

require_once("../model/Composer/vendor/autoload.php");
include("var_globals.php");
include_once('../view/pdf-new-view.php');


//  print_r($html);

//------------- Salida PDF ------------//
    // $SPdf = array('100','178');

    $pdf = new \Mpdf\Mpdf([
        "format" => 'A4'
    ]);
    $pdf->AddPage('P','','','','','0','0','0','0');


    $pdf->WriteHTML($html);
    $pdf->Output($rt_arc . $nom_arc, "F");
    // $pdf->Output($rtpdf . $nmpdf, "I");

//------------- Salida PDF ------------//


//--------------    INSERT PDF IN DB    --------------------//

    $acta = $rt_arc . $nom_arc;

    $gestor = fopen($acta, "r");
    $tmarchivo = filesize($acta);
    $contenido = fread($gestor, $tmarchivo);
    $datact =   addslashes($contenido);

    $archivos = "archivos";

    fclose($gestor);

    $tparchivo = mime_content_type($acta);

    $sqlupdate =    "UPDATE $archivos
                    SET archivo='$datact', tipo_archivo='$tparchivo'
                    WHERE id_archivos='$id_ar'";

    if($conexion->query($sqlupdate) == TRUE)    {
        // echo    "Se inserto bien";
    }   else    {
        echo    "Error!";
    }

//--------------    INSERT PDF IN DB    --------------------//

//----------------------------------------------------------    GENERACION NUEVO PDF    ---------------------------------------------------------------//


header('Location: ../view/view_archivos.php?id='. $id_p .'');


?>