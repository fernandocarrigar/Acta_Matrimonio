<?php

include('conexion.php');


$sql_select = "SELECT * FROM archivos WHERE id_archivos='$id_p'";
$result = $conexion->query($sql_select);

if ($result->num_rows > 0)  {
    while($row = $result->fetch_assoc())    {
        $id_ar = $row['id_archivos'];
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
                                $curph = $row['curp_per'];
                                $id_nac = $row['id_nac'];
                                $ocupa = $row['ocupacion_per'];
                                $lgnac = $row['lug_nac_per'];
                                $idpadh = $row['id_padres'];
                                $id_gn = $row['id_genero'];
?>
            <div class="div-2">

                <label for="name" class="frm">Nombre:</label><br>
                    <input type="text" id="nameH" name="nameH" placeholder="Inserte su nombre" value="<?php echo ($row['nombre_per']);?>" maxlength="50" required><br><br>
                <label for="apP" class="frm">Apellido Paterno:</label><br>
                    <input type="text" id="apPH" name="apPH" placeholder="Inserte su apellido paterno" value="<?php echo ($row['ap_paterno_per']);?>" maxlength="50" required><br><br>
                <label for="apM" class="frm">Apellido Materno:</label><br>
                    <input type="text" id="apMH" name="apMH" placeholder="Inserte su apellido paterno" value="<?php echo ($row['ap_materno_per']);?>" maxlength="50" required><br><br>
                <label for="date" class="frm">Fecha de nacimiento:</label><br>
                    <input type="date" name="fch_nacH" id="fch_nacH" value="<?php echo ($row['fecha_nac_per'])?>" required><br><br>
                <label for="domic">Domicilio:</label><br>
                    <input type="text" name="domicH" id="domicH" placeholder="¿Cual es su domicilio?" value="<?php echo ($row['domicilio_per']);?>" required><br><br>

                <!-- <label for="curp" class="frm">CURP:</label><br> -->
                    <input type="hidden" name="curpH" id="curp" placeholder="Ingrese su CURP" value="<?php echo ($curph);?>" maxlength="18" required><br>
                
                <label for="nacionalidad">Nacionalidad:</label><br>
                    <select name="nacH" id="nacH" required>
                        <option value ="" disabled selected>Seleccione su nacionalidad</option>
<?php
                        $sqlselect = "SELECT * FROM  `nacionalidad`";
                        $result = $conexion->query($sqlselect);

                        if ($result->num_rows > 0) {
                            //salida de datos
                            while($row = $result->fetch_assoc()) {
                                $idnac = $row['id_nac'];
                                $nac = $row['nacionalidad'];

                                if($id_nac == $idnac){
                                    echo    ("
                                            <option selected value='". $idnac ."'>". $nac ."</option>
                                            ");
                                }else{
                                    echo    ("
                                            <option value='". $idnac ."'>". $nac ."</option>
                                            ");
                                }
                            }
                        }

?>
                </select><br><br>
                <label for="gen" class="frm">Genero:</label><br>
                    <select name="genH" id="genH" required>
                        <option value="" disabled selected>Seleccione su genero</option>
<?php
                        $sqlselect = "SELECT * FROM  `tipo_genero`";
                        $result = $conexion->query($sqlselect);

                        if ($result->num_rows > 0) {
                            //salida de datos
                            while($row = $result->fetch_assoc()) {
                                $idgn = $row['id_genero'];
                                $nmgn = $row['genero'];
                                
                                if($id_gn == $idgn){
                                    echo    ("
                                            <option selected value='". $idgn ."'>". $nmgn ."</option>
                                            ");
                                }else{
                                    echo    ("
                                            <option value='". $idgn ."'>". $nmgn ."</option>
                                            ");
                                }
                        }
                    }
?>
                    
                    </select><br><br>
                <label for="ocup">Ocupación:</label><br>
                    <input type="text" name="ocupacH" id="ocupacH" placeholder="¿Cual es su ocupación?" value="<?php echo $ocupa;?>" required><br><br>
                <label for="lugnac">Lugar de nacimiento:</label><br>
                    <input type="text" name="lugnacH" id="lugnacH" placeholder="¿Cual es su lugar de nacimiento?" value="<?php echo $lgnac;?>" required><br><br>
            </div>
    
<?php
                            }
                        }

                        $sql_select = "SELECT * FROM persona WHERE id_per='$id_pm'";
                        $result = $conexion->query($sql_select);

                        if ($result->num_rows > 0)  {
                            while($row = $result->fetch_assoc())    {
                                $curpm = $row['curp_per'];
                                $id_nac = $row['id_nac'];
                                $ocupa = $row['ocupacion_per'];
                                $lgnac = $row['lug_nac_per'];
                                $idpadm = $row['id_padres'];
                                $id_gn = $row['id_genero'];
?>

    <!--------------------------    DATOS DEL CONYUGE 2     ------------------------->
            <div class="div-2">

                <label for="name" class="frm">Nombre:</label><br>
                    <input type="text" id="nameM" name="nameM" placeholder="Inserte su nombre" value="<?php echo ($row['nombre_per']);?>" maxlength="50" required><br><br>
                <label for="apP" class="frm">Apellido Paterno:</label><br>
                    <input type="text" id="apPM" name="apPM" placeholder="Inserte su apellido paterno" value="<?php echo ($row['ap_paterno_per']);?>" maxlength="50" required><br><br>
                <label for="apM" class="frm">Apellido Materno:</label><br>
                    <input type="text" id="apMM" name="apMM" placeholder="Inserte su apellido paterno" value="<?php echo ($row['ap_materno_per']);?>" maxlength="50" required><br><br>
                <label for="date" class="frm">Fecha de nacimiento:</label><br>
                    <input type="date" name="fch_nacM" id="fch_nacM" value="<?php echo $row['fecha_nac_per'];?>" required><br><br>
                <label for="domic">Domicilio:</label><br>
                    <input type="text" name="domicM" id="domicM" placeholder="¿Cual es su domicilio?" value="<?php echo ($row['domicilio_per']);?>" required><br><br>

                <!-- <label for="curp" class="frm">CURP:</label><br> -->
                    <input type="hidden" name="curpM" id="curp" placeholder="Ingrese su CURP" value="<?php echo ($curpm);?>" maxlength="18" required><br>
                <label for="nacionalidad">Nacionalidad:</label><br>
                    <select name="nacM" id="nacM" required>
                        <option value ="" disabled selected>Seleccione su nacionalidad</option>
<?php

                        $sqlselect = "SELECT * FROM  `nacionalidad`";
                        $result = $conexion->query($sqlselect);

                        if ($result->num_rows > 0) {
                            //salida de datos
                            while($row = $result->fetch_assoc()) {
                                $idnac = $row['id_nac'];
                                $nac = $row['nacionalidad'];
                                
                                if($id_nac == $idnac){
                                    echo    ("
                                            <option selected value='". $idnac ."'>". $nac ."</option>
                                            ");
                                }else{
                                    echo    ("
                                            <option value='". $idnac ."'>". $nac ."</option>
                                            ");
                                }
                            }
                        }
?>
                    </select><br><br>
                <label for="gen" class="frm">Genero:</label><br>
                    <select name="genM" id="genM" required>
                        <option value="" disabled selected>Seleccione su genero</option>
<?php
                        $sqlselect = "SELECT * FROM  `tipo_genero`";
                        $result = $conexion->query($sqlselect);

                        if ($result->num_rows > 0) {
                            //salida de datos
                            while($row = $result->fetch_assoc()) {
                                $idgn = $row['id_genero'];
                                $nmgn = $row['genero'];
                                
                                if($id_gn == $idgn){
                                    echo    ("
                                            <option selected value='". $idgn ."'>". $nmgn ."</option>
                                            ");
                                }else{
                                    echo    ("
                                            <option value='". $idgn ."'>". $nmgn ."</option>
                                            ");
                                }
                            }
                        }
?>
                    </select><br><br>
                <label for="lugnac">Lugar de nacimiento:</label><br>
                    <input type="text" name="lugnacM" id="lugnacM" placeholder="¿Cual es su lugar de nacimiento?" value="<?php echo $lgnac;?>" required><br><br>
                <label for="ocup">Ocupación:</label><br>
                    <input type="text" name="ocupacM" id="ocupacM" placeholder="¿Cual es su ocupación?" value="<?php echo $ocupa;?>" required><br><br>
            </div>

<?php
                            }
                        }

                        $sql_select = "SELECT * FROM padres WHERE id_padres='$idpadh'";
                        $result = $conexion->query($sql_select);

                        if ($result->num_rows > 0)  {
                            while($row = $result->fetch_assoc())    {
                                $nmpad = $row['nombre_pad'];
                                $nmmad = $row['nombre_mad'];
                                $dmpad = $row['domicilio_pad'];
                                $ocpad = $row['ocupacion_pad'];
                                $ocmad = $row['ocupacion_mad'];
?>
    <!--------------    FORMULARIO DE PADRES    ---------------->
            <div class="div-2">

                <label for="nampad">Nombre del padre del novio:</label><br>
                    <input type="text" name="padreH" id="pads" placeholder="Inserte el nombre del padre" value="<?php echo ($nmpad);?>" ><br><br>
                <label for="nammad">Nombre de la madre del novio:</label><br>
                    <input type="text" name="madreH" id="pads" placeholder="Inserte el nombre de la madre" value="<?php echo ($nmmad);?>" ><br><br>
                <label for="dompad">Domicilio:</label><br>
                    <input type="text" name="dompadH" id="pads" placeholder="Ingrese el domicilio de los padres" value="<?php echo ($dmpad);?>"><br><br>
                <label for="ocupmad">Ocupación de la madre:</label><br>
                    <input type="text" name="ocumadH" id="pads" placeholder="Ocupación de la madre" value="<?php echo ($ocmad);?>" ><br><br>
                <label for="ocuppad">Ocupación de la padre:</label><br>
                    <input type="text" name="ocupadH" id="pads" placeholder="Ocupación de la padre" value="<?php echo ($ocpad);?>" ><br><br>

<?php
                            }
                        }

                        $sql_select = "SELECT * FROM padres WHERE id_padres='$idpadm'";
                        $result = $conexion->query($sql_select);

                        if ($result->num_rows > 0)  {
                            while($row = $result->fetch_assoc())    {
                                $nmpad = $row['nombre_pad'];
                                $nmmad = $row['nombre_mad'];
                                $dmpad = $row['domicilio_pad'];
                                $ocpad = $row['ocupacion_pad'];
                                $ocmad = $row['ocupacion_mad'];
?>
                <label for="nampad">Nombre del padre de la novia:</label><br>
                    <input type="text" name="padreM" id="pads" placeholder="Inserte el nombre del padre" value="<?php echo ($nmpad);?>"><br><br>
                <label for="nammad">Nombre de la madre de la novia:</label><br>
                    <input type="text" name="madreM" id="pads" placeholder="Inserte el nombre de la madre" value="<?php echo ($nmmad);?>"><br><br>
                <label for="dompad">Domicilio:</label><br>
                    <input type="text" name="dompadM" id="pads" placeholder="Ingrese el domicilio de los padres" value="<?php echo ($dmpad);?>"><br><br>
                <label for="ocupmad">Ocupación de la madre:</label><br>
                    <input type="text" name="ocumadM" id="pads" placeholder="Ocupación de la madre" value="<?php echo ($ocmad);?>"><br><br>
                <label for="ocuppad">Ocupación de la padre:</label><br>
                    <input type="text" name="ocupadM" id="pads" placeholder="Ocupación de la padre" value="<?php echo ($ocpad);?>"><br><br>
            </div>

<?php
                            }
                        }

                        $sql_select = "SELECT * FROM dts_legales WHERE id_dts_lgs='$id_lg'";
                        $result = $conexion->query($sql_select);

                        if ($result->num_rows > 0)  {
                            while($row = $result->fetch_assoc())    {
                                $entd = $row['dts_entidad'];
                                $delg = $row['dts_delegacion'];
                                $jzgd = $row['dts_juzgado'];
                                $lib = $row['dts_libro'];
                                $yearlg = $row['dts_year'];
                                $clse = $row['dts_clase'];

// 	
// 	
// 

?>
    <!----- FORMULARIO DATOS LEGALES ------>
            <div class="div-2">
                <label for="enti">Entidad:</label><br>
                    <input type="text" name="enti" class="ofcl" placeholder="¿Que Entidad es?" value="<?php echo ($entd);?>" required><br><br>
                <label for="deleg">Delegación:</label><br>
                    <input type="text" name="deleg" class="ofcl" placeholder="¿Que Delegación es?" value="<?php echo ($delg);?>" required><br><br>
                <label for="juzg">Juzgado:</label><br>
                    <input type="text" name="juzg" class="ofcl" placeholder="¿Que Juzgado es?" value="<?php echo ($jzgd);?>" required><br><br>
                <label for="juzg">Tipo de regimen:</label><br>
                    <select name='tpreg' id='tpreg' class='ofcl' required>
                        <option value='' disabled selected>Seleccione su tipo de regimen</option>
<?php

                        $sqlselect = "SELECT * FROM  `situacion_mat`";
                        $result = $conexion->query($sqlselect);

                        if ($result->num_rows > 0) {
                            //salida de datos
                            while($row = $result->fetch_assoc()) {
                                $idsit = $row['id_sit_mat'];
                                $sit_mat = $row['sit_mat'];
                                
                                if($id_st == $idsit){
                                    echo    ("
                                            <option selected value='". $idsit ."'>". $sit_mat ."</option>
                                            ");
                                }else{
                                    echo    ("
                                            <option value='". $idsit ."'>". $sit_mat ."</option>
                                            ");
                                }
                            }
                        }
                    }
                }
?>
                    </select><br>
                <label for="enti">Libro:</label><br>
                    <input type="text" name="lbro" class="ofcl" placeholder="¿Que Libro es?" value="<?php echo ($lib);?>" required><br><br>
                <label for="juzg">Clase:</label><br>
                    <input type="text" name="clase" class="ofcl" placeholder="¿Que Clase es?" value="<?php echo ($clse);?>" required><br><br>
            </div>
<?php
                }
            }
        }
    }
?>