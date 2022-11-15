<?php

$id_p = $_GET['id'];
// print_r ($_POST);
// echo($id_p);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../model/vendor/reset.css">
    <link rel="stylesheet" type="text/css" href="../model/vendor/form_upd.css">

    <title>Actualiza los datos</title>
</head>
<body>
    <div class="div-ctn-ttl">
        <div class="div-ttl"><h4 id="h4-ttl">Datos del conyuge</h4></div>
        <div class="div-ttl"><h4 id="h4-ttl">Datos del conyuge</h4></div>
        <div class="div-ttl"><h4 id="h4-ttl">Datos de los padres</h4></div>
        <div class="div-ttl"><h4 id="h4-ttl">Datos de fiscales</h4></div>
    </div>

    <form action="../controller/update_acta.php?id=<?php echo $id_p ?>" method="post">
        <div class="div-contain">


<?php
    include_once('../controller/select_update_acta.php');
    // echo $id_p;
?>
        </div>
        <div class="div-btn">
        <button type="submit" id="btn-sbt">Actualizar datos</button>
        <a href="../view/view_archivos.php" type="button" id="btn">Cancelar</a>
        </div>
    </form>



</body>
</html>
<?php

// if (!empty($_POST)) {
//     include('../controller/update_acta.php');
// }

// header('Location: ../view/view_archivos.php?id='. $id_p .'');

?>