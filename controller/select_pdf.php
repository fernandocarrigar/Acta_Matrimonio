<?php

include('conexion.php');


//--------------------- ID DE LISTA ------------------------//
    $id_doc = $_GET['id'];
//--------------------- ID DE LISTA ------------------------//
//--------------------- ID DE INSERT_ID --------------------//
    // $id_doc = $conexion->insert_id;
//--------------------- ID DE INSERT_ID --------------------//

//--------------------- SELECT ACTA ------------------------//

$sqlselect = "SELECT * FROM archivos WHERE id_archivos='$id_doc'";
$result = $conexion->query($sqlselect);

if ($result->num_rows > 0) {
    //salida de datos
    while($row = $result->fetch_assoc()) {
        // $name_archivo = $row['nom_archivos'];
        // header("Content type: $tipo");
        // header('Content-disposition: attachment; filename="'.$name_archivo.' "');
        // header('Content-Transfer-Encoding: binary');
        // header('Accept-Ranges: bytes');
        ?>

<head>
    <link rel="stylesheet" href="../model/vendor/view_pdf.css">

    <title>Acta</title>
</head>
<body>
    <div class="container">


<?php
        echo '<iframe src=" data:'. $row['tipo_archivo'] .'; base64,'. base64_encode( $row['archivo'] ) .'" class="responsive-iframe"></iframe>';
    }
}   else {
    echo "0 resultados";
}

//--------------------- SELECT ACTA ------------------------//

?>

</div>

</body>