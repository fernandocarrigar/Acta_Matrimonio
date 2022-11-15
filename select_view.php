<?php

require_once('conexion.php');
include_once('var_globals.php');

//-----     SELECT      -----//

$view = "view_acta";
$lastid = $conexion->insert_id;

    $sqlselect = "SELECT * FROM $view WHERE Acta='$lastid'";
    $result = $conexion->query($sqlselect);

    if ($result->num_rows > 0) {
        //salida de datos
        while($row = $result->fetch_assoc()) {
            $html .= "                    
                    <table>
                        <tr id='fsl'>
                            <td class='td-center'><h6>". $row['Entidad'] ."</h6></td>
                            <td class='td-center'><h6>". $row['Delegacion'] ."</h6></td>
                            <td class='td-center'><h6>". $row['Juzgado'] ."</h6></td>
                            <td class='td-center'><h6>". $row['Libro'] ."</h6></td>
                            <td class='td-center'><h6>". $row['Acta'] ."</h6></td>
                            <td class='td-center'><h6>". $row['Anual'] ."</h6></td>
                            <td class='td-center'><h6>". $row['Clase'] ."</h6></td>
                            <td class='td-center'><h6>". $row['FechaRegistro'] ."</h6></td>
                        </tr>
                    </table><br><br>
                    <table id='prub'>
                        <tr>
                            <td rowspan='3' colspan='1' class='td-H'><span>C<br>O<br>N<br>T<br>R<br>A<br>Y<br>E<br>N<br>T<br>E<br>S<br></span></td>
                            <td class='td-R'>
                                <table class='tbl-inside-2'>
                                    <tr>
                                        <td rowspan='1' colspan='1' class='td-R' id='td-el'><span>E<br>L<br></span></td>
                                    </tr>
                                    <tr>
                                        <td rowspan='1' colspan='1' class='td-R' id='td-ella'><span>E<br>L<br>L<br>A<br></span></td>
                                    </tr>
                                </table>
                            </td>
                            <td class='td-contain' colspan='5'>
                                <table class='tbl-inside'>
                                    <tr>
                                        <td class='td-tbl' colspan='3'><span>Nombre: </span><span id='sp-mayus'>". $row['N1'] ." ". $row['ApellidoPaternoN1'] ." ". $row['ApellidoMaternoN1'] ."</span></td>
                                        <td class='td-tbl' id='td-center'><span>Edad: </span><span>". $row['EdadN1'] ."</span></td>
                                        <td class='td-tbl' id='td-right'><span>Nacionalidad: </span><span id='sp-mayus'>". $row['NacionalidadN1'] ."</span></td><br>
                                    </tr><br>
                                    <tr>
                                        <td class='td-tbl' colspan='4'><span>Lugar de nacimiento: </span><span id='sp-mayus'>". $row['LugarNacimientoN1'] ."</span></td>
                                        <td class='td-tbl' id='td-right'><span>Ocupación: </span><span id='sp-mayus'>". $row['OcupacionN1'] ."</span></td>
                                    </tr><br>
                                    <tr>
                                        <td class='td-tbl' colspan='4'><span>Domicilio: </span><span id='sp-mayus'>". $row['DomicilioN1'] ."</span></td>
                                    </tr><br>
                                    <tr><td colspan='5'></td></tr>
                                    <tr><td colspan='2'></td></tr>
                                    <tr><td colspan='5'></td></tr>
                                    <tr>
                                        <td class='td-tbl' colspan='3'><span>Nombre: </span><span id='sp-mayus'>". $row['N2'] ." ". $row['ApellidoPaternoN2'] ." ". $row['ApellidoMaternoN2'] ."</span></td>
                                        <td class='td-tbl' id='td-center'><span>Edad: </span><span>". $row['EdadN2'] ."</span></td>
                                        <td class='td-tbl' id='td-right'><span>Nacionalidad: </span><span id='sp-mayus'>". $row['NacionalidadN2'] ."</span></td><br>                                    
                                    </tr><br>
                                    <tr>
                                        <td class='td-tbl' colspan='4'><span>Lugar de nacimiento: </span><span id='sp-mayus'>". $row['LugarNacimientoN2'] ."</span></td>
                                        <td class='td-tbl' id='td-right'><span>Ocupación: </span><span id='sp-mayus'>". $row['OcupacionN2'] ."</span></td>
                                    </tr><br>
                                    <tr>
                                        <td class='td-tbl' colspan='4'><span>Domicilio: </span><span id='sp-mayus'>". $row['DomicilioN2'] ."</span></td>                                      
                                    </tr><br>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td id='td-sp'>
                                <span id='sp-mayus'>este matrimonio esta sujeto al regimen de: </span> 
                                <span id='sp-mayus'>". $row['TipoRegimen'] ."</span>
                            </td><br>
                        </tr>
                    </table>
                    <table id='prub'>
                        <tr>
                            <td rowspan='3' colspan='1' class='td-H'><span>P<br>A<br>D<br>R<br>E<br>S<br></span></td>
                            <td class='td-H'>
                                <table class='tbl-inside-2'>
                                    <tr>
                                        <td rowspan='1' colspan='1' class='td-R' id='td-el'><span>E<br>L<br></span></td>
                                    </tr>
                                    <tr>
                                        <td rowspan='1' colspan='1' class='td-R' id='td-ella'><span>E<br>L<br>L<br>A<br></span></td>
                                    </tr>
                                </table>
                            </td>
                            <td id='td-contain'>
                                <table class='tbl-inside'>
                                    <tr>
                                        <td class='td-tbl' colspan='4'><span>Padre: </span><span id='sp-mayus'>". $row['NombrePadreN1'] ."</span></td>
                                        <td class='td-tbl' id='td-right-2'><span>Ocupación: </span><span id='sp-mayus'>". $row['OcupacionPadreN1'] ."</span></td>
                                    </tr><br>
                                    <tr>
                                        <td class='td-tbl' colspan='4'><span>Madre: </span><span id='sp-mayus'>". $row['NombreMadreN1'] ."</span></td>
                                        <td class='td-tbl' id='td-right-2'><span>Ocupación: </span><span id='sp-mayus'>". $row['OcupacionMadreN1'] ."</span></td>
                                    </tr><br>
                                    <tr>
                                        <td class='td-tbl' colspan='4'><span>Domicilio: </span><span id='sp-mayus'>". $row['DomicilioPadresN1'] ."</span></td>
                                    </tr><br>
                                    <tr><td colspan='5'></td></tr>
                                    <tr><td colspan='2'></td></tr>
                                    <tr><td colspan='5'></td></tr>
                                    <tr>
                                        <td class='td-tbl' colspan='4'><span>Padre: </span><span id='sp-mayus'>". $row['NombrePadreN2'] ."</span></td>
                                        <td class='td-tbl' id='td-right-2'><span>Ocupación: </span><span id='sp-mayus'>". $row['OcupacionPadreN2'] ."</span></td>
                                    </tr><br>
                                    <tr>
                                        <td class='td-tbl' colspan='4'><span>Madre: </span><span id='sp-mayus'>". $row['NombreMadreN2'] ."</span></td>
                                        <td class='td-tbl' id='td-right-2'><span>Ocupación: </span><span id='sp-mayus'>". $row['OcupacionMadreN2'] ."</span></td>
                                    </tr><br>
                                    <tr>
                                        <td class='td-tbl' colspan='4'><span>Domicilio: </span><span id='sp-mayus'>". $row['DomicilioPadresN2'] ."</span></td>
                                    </tr><br>
                                </table>
                            </td>
                        </tr>
                    </table><br><br>";
        }
    }   else {
        echo "0 resultados";
    }

//-----     SELECT      -----//

?>