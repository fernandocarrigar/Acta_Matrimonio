<?php

require_once('../controller/conexion.php');

?>

<html>
<head>

    <title>Lista de actas</title>

<!------------------------------    CSS     -------------------------------->
    <link rel="stylesheet" type="text/css" href="../model/vendor/reset.css">
    <link rel="stylesheet" type="text/css" href="../model/vendor/listas.css">
    <link rel="stylesheet" type="text/css" href="../model/vendor/nav-bar.css">

    <script src='../model/vendor/js/font_icons.js' crossorigin='anonymous'></script>

</head>

<body>

<ul class="topnav">
    <li><a class="active" href="../index.php">Home</a></li>
    <li><a href="form_parejas.php">Nueva Acta</a></li>
    <li><a href="view_archivos.php">Registros</a></li>
    <!-- <li class="right"><a href="#about">About</a></li> -->
</ul>

    <div class="div-contain">
    <div class="div-list">
        <table id="tab-list">
            <tr>
                <th>Nombre del Acta:</th>
                <th>Fecha del registro:</th>
                <th>Nombre del conyugue N°1:</th>
                <th>Nombre del conyugue N°2:</th>
                <th colspan="3">Opciones</th>
            </tr>
                <?php

                //-----------------------   PAGINACION   ------------------------//

                $results_per_page = 10;  

                $sqlselect = "SELECT * FROM view_lts_archivo";
                $result = $conexion->query($sqlselect);
                $number_of_result = $result->num_rows;

                //determine the total number of pages available  
                $number_of_page = ceil($number_of_result / $results_per_page);

                if (!isset ($_GET['page']) ) {  
                    $page = 1;  
                } else {  
                    $page = $_GET['page'];  
                }  

                $page_first_result = ($page-1) * $results_per_page;

                // echo $page_first_result;
                // echo $number_of_page;

                //-----------------------   PAGINACION   ------------------------//

                $sqlselect = "SELECT * FROM view_lts_archivo LIMIT $page_first_result, $results_per_page";
                $result = $conexion->query($sqlselect);
                
                if ($result->num_rows > 0) {
                    //salida de datos
                    while($row = $result->fetch_assoc()) {
                        echo    '<tr>
                                    <td>'. $row['NombreArchivo'] .'</td>
                                    <td>'. $row['FechaRegistro'] .'</td>
                                    <td>'. $row['N1'] .' '. $row['ApellidoPaternoN1'] .' '. $row['ApellidoMaternoN1'] .'</td>
                                    <td>'. $row['N2'] .' '. $row['ApellidoPaternoN2'] .' '. $row['ApellidoMaternoN2'] .'</td>
                                    <td class="td-op"><a href="../controller/select_pdf.php?id='. $row['Id_Archivo'] .'" target="_blank" id="btn"><i class="fas fa-file-alt"></i></a></td>
                                    <td class="td-op"><a href="../view/form_update.php?id='. $row['Id_Archivo'] .'" id="btn"><i class="far fa-edit"></i></a></td>
                                    <td class="td-op"><a href="#miModal" id="btn"><i class="far fa-trash-alt"></i></a></td>
                                    
                                        <div id="miModal" class="modal">
                                            <div class="modal-contenido">
                                                <h2>¿Desea eliminar este registro?</h2>
                                                <a href="../controller/delete_acta.php?id='. $row['Id_Archivo'] .'" class="btn" id="a-btn">¡Eliminar!</a>
                                                <a href="#" type="button" class="btn">Cancelar</a>
                                            </div>  
                                        </div>

                                </tr>';
                    }
                }   else {
                    echo "0 resultados";
                }
                
                ?>

            
        </table>



        <div id="div-pag">

        <?php
            for($page = 1; $page<= $number_of_page; $page++) {  
                echo    '<a href="view_archivos.php?page=' . $page . '" id="a-list" type="button">' . $page . ' </a>';
  
            }
            
            if (!empty($_GET['id'])) {
                echo'<script type="text/javascript">
                    alert("Se actualizo con exito!");
                    </script>';
            }
            
        ?>
        </div>
    </div>
    </div>
</body>

</html>

<?php
// include_once('close-conexion.php');
?>