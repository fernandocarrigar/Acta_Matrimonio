<?php

include("../controller/var_globals.php");


$html .=     '
                
            <link rel="stylesheet" type="text/css" href="../model/vendor/style-pdf.css">

            <body class="body-background">

            <div class="div-back">


                <div class="div-contain-html">

                <div id="div-img"> <img src="../model/assets/img/logo.jpg" id="img-logo"></img> </div>

                
                <div id="div-tittle"><h5 id="ttl">ACTA DE MATRIMONIO</h5></div>
                    <table id="fsl">
                        <tr id="fsl">
                            <td class="td-center"><h6>Entidad:</h6></td>
                            <td class="td-center"><h6>Delegación:</h6></td>
                            <td class="td-center"><h6>Juzgado:</h6></td>
                            <td class="td-center"><h6>Libro:</h6></td>
                            <td class="td-center"><h6>Acta:</h6></td>
                            <td class="td-center"><h6>Año:</h6></td>
                            <td class="td-center"><h6>Clase:</h6></td>
                            <td class="td-center" id="td-justy"><h6>Fecha de Registro:</h6></td>
                        </tr>
                    </table>';
                        include_once("../controller/select-new-view.php");
$html .=    '
                </div>
            </div>

            </body>
        ';
    
?>