<?php

include_once('conexion.php');
include_once('var_insert.php');
include_once('clcedad.php');

// Prueba de errores: print_r($_POST);

/*

//-----------------------------     TABLAS AUXILIARES     --------------------------------//
    $sqlinsert .=   "INSERT INTO $tipo_genero (id_genero, genero)  VALUES  (NULL, '');";
    $sqlinsert .=   "INSERT INTO $lugar_nac (id_lug_nac, lug_nac)  VALUES  (NULL, '');";
    $sqlinsert .=   "INSERT INTO $nacionalidad (id_nac, nacionalidad)  VALUES  (NULL, '');";
    $sqlinsert .=   "INSERT INTO $situacion_mat (id_sit_mat, sit_mat)  VALUES  (NULL, '');";
//-----------------------------     TABLAS AUXILIARES     --------------------------------//

*/

//-------------------------     INSERT MULTIPLE CON ULTIMO ID INSERTADO     ---------------------------//

    $sqlinsert =   "INSERT INTO $padres (id_padres, nombre_pad, nombre_mad, domicilio_pad, ocupacion_pad, ocupacion_mad)  
                    VALUES  (NULL, '$padreH', '$madreH', '$dompadH', '$ocupadH', '$ocumadH')";
    if ($conexion->query($sqlinsert) === TRUE) {

        $padHid = $conexion->insert_id;

            $sqlinsert =   "INSERT INTO $padres (id_padres, nombre_pad, nombre_mad, domicilio_pad, ocupacion_pad, ocupacion_mad)  
                            VALUES  (NULL, '$padreM', '$madreM', '$dompadM', '$ocupadM', '$ocumadM')";
            if ($conexion->query($sqlinsert) === TRUE) {

                $padMid = $conexion->insert_id;

                    $sqlinsert =   "INSERT INTO $persona (id_per, nombre_per, ap_paterno_per, ap_materno_per, fecha_nac_per, edad_per, curp_per, id_nac, id_genero, lug_nac_per, domicilio_per, ocupacion_per, id_padres)  
                                        VALUES  (NULL, '$nameH', '$apPH', '$apMH', '$fch_nacH', '$edadH', '$curpH', '$nacH', '$genH', '$lugnacH', '$domicH', '$ocupacH', '$padHid')";
                    if ($conexion->query($sqlinsert) === TRUE) {
                            
                        $perHid = $conexion->insert_id;

                            $sqlinsert =   "INSERT INTO $persona (id_per, nombre_per, ap_paterno_per, ap_materno_per, fecha_nac_per, edad_per, curp_per, id_nac, id_genero, lug_nac_per, domicilio_per, ocupacion_per, id_padres)
                                                VALUES  (NULL, '$nameM', '$apPM', '$apMM', '$fch_nacM', '$edadM', '$curpM', '$nacM', '$genM', '$lugnacM', '$domicM', '$ocupacM', '$padMid')";
                            if ($conexion->query($sqlinsert) === TRUE) {
                                    
                                $perMid = $conexion->insert_id;
            
                                    $sqlinsert =   "INSERT INTO $dts_legales (id_dts_lgs, dts_entidad, dts_delegacion, dts_juzgado, dts_libro, dts_year, dts_clase) 
                                                        VALUES (NULL, '$enti', '$deleg', '$juzg', '$lbro', '$year', '$clase')";
                                    if ($conexion->query($sqlinsert) === TRUE) {

                                        $dtsid = $conexion->insert_id;

                                            $sqlinsert =   "INSERT INTO $parejas (id_pareja, fecha_par, id_sit_mat, id_per_mas, id_per_fem, id_dts_lgs)  
                                                                VALUES  (NULL, '$fch_registro', '$tpreg', '$perHid', '$perMid', '$dtsid')";
                                            if ($conexion->query($sqlinsert) === TRUE) {
                            
                                                    // header('location: ../view/result_pdf.php');
                                            }   
                                            else {
                                                echo "Error en: ". $sqlinsert ."<br>". $conexion->error;
                                            }        
        
                                        // echo "Se insertaron exitosamente los datos legales <br>";
                                    }   
                                    else {
                                        echo "Error en: ". $sqlinsert ."<br>". $conexion->error;
                                    }        
    
                                // echo "Se insertaron exitosamente los datos de la conyuge <br>";
                            }   
                            else {
                                echo "Error en: ". $sqlinsert ."<br>". $conexion->error;
                            } 

                        // echo "Se insertaron exitosamente los datos del conyugee <br>";
                    }   
                    else {
                        echo "Error en: ". $sqlinsert ."<br>". $conexion->error;
                    }

                // echo "Se insertaron exitosamente los datos de los padres de la conyuge <br>";
            }
            else {
                echo "Error en: ". $sqlinsert ."<br>". $conexion->error;
            }            
        // echo "Se insertaron exitosamente los datos de los padres del conyuge <br>";
    }
    else {
        echo "Error en: ". $sqlinsert ."<br>". $conexion->error;
    }

//-------------------------     INSERT MULTIPLE CON ULTIMO ID INSERTADO     ---------------------------//

?>