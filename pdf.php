<?php

require_once("model/Composer/vendor/autoload.php");
include("controller/var_globals.php");
include_once('view/pdf-view.php');


//  print_r($html);

//------------- Salida PDF ------------//
    // $SPdf = array('100','178');

    $pdf = new \Mpdf\Mpdf([
        "format" => 'A4'
    ]);
    $pdf->AddPage('P','','','','','0','0','0','0');

    $nmpdf = ("Acta_". $lastid .".pdf");

    $rtpdf = ("../pdfs/");

    $pdf->WriteHTML($html);
    $pdf->Output($rtpdf . $nmpdf, "F");
    // $pdf->Output($rtpdf . $nmpdf, "I");

//------------- Salida PDF ------------//


//--------------    INSERT PDF IN DB    --------------------//

    $acta = $rtpdf . $nmpdf;

    $gestor = fopen($acta, "r");
    $tmarchivo = filesize($acta);
    $contenido = fread($gestor, $tmarchivo);
    $datact =   addslashes($contenido);

    $archivos = "archivos";

    fclose($gestor);

    $tparchivo = mime_content_type($acta);

    $sqlinsert =    "INSERT INTO $archivos (id_archivos, nom_archivos, ruta_archivos, archivo, tipo_archivo, id_pareja) 
                    VALUES (NULL, '$nmpdf', '$rtpdf', '$datact', '$tparchivo', '$lastid')";

    if($conexion->query($sqlinsert) == TRUE)    {
        // echo    "Se inserto bien";
    }   else    {
        echo    "Error!";
    }

//--------------    INSERT PDF IN DB    --------------------//

//-------------------   REDIRECCIONAR   ---------------------//

$idArchivo = $conexion->insert_id;

header('Location: ../controller/select_pdf.php?id='. $idArchivo .'');

//-------------------   REDIRECCIONAR   ---------------------//

// exit;

    ?>