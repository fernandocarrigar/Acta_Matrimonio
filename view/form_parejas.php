<?php

include("../controller/conexion.php");

?>

<html>
<!doctype html>
    <head>
        <link rel="stylesheet" type="text/css" href="../model/vendor/reset.css">
        <link rel="stylesheet" type="text/css" href="../model/vendor/style.css">
        <link rel="stylesheet" type="text/css" href="../model/vendor/nav-bar.css">

        <title>Formulario</title>
    </head>
    <body id="form">

    <ul class="topnav">
        <li><a class="active" href="../index.php">Home</a></li>
        <li><a href="form_parejas.php">Nueva Acta</a></li>
        <li><a href="view_archivos.php">Registros</a></li>
        <li id="cncl"><a href="javascript: history.back()" type="button" id="btn">Cancelar</a></li>
        <!-- <li class="right"><a href="#about">About</a></li> -->
    </ul>

    <div class="brd">
        <form action="result_pdf.php" method="POST" target="_blank" id="form1">
            <h1>Datos de las personas</h1>

    <!--------------------------    DATOS DEL CONYUGE 1     ------------------------->

                <h4 id="h4-ttl">Datos del conyuge</h4>
            <div class="fH">
            
                <label for="name" class="frm">Nombre:</label><br>
                <input type="text" id="nameH" name="nameH" placeholder="Inserte su nombre" maxlength="50" required><br>
                <label for="apP" class="frm">Apellido Paterno:</label><br>
                <input type="text" id="apPH" name="apPH" placeholder="Inserte su apellido paterno" maxlength="50" required><br>
                <label for="apM" class="frm">Apellido Materno:</label><br>
                <input type="text" id="apMH" name="apMH" placeholder="Inserte su apellido paterno" maxlength="50" required><br>
                <label for="date" class="frm">Fecha de nacimiento:</label><br><br>
                <input type="date" name="fch_nacH" id="fch_nacH" required><br><br>
                <label for="domic">Domicilio:</label>
                <input type="text" name="domicH" id="domicH" placeholder="¿Cual es su domicilio?" required>
            </div>

            <div class="fH">
                <label for="curp" class="frm">CURP:</label><br>
                <input type="text" name="curpH" id="curp" placeholder="Ingrese su CURP" maxlength="18" required><br>
                <label for="nacionalidad">Nacionalidad:</label><br>
                <select name="nacH" id="nacH" required>
                    <option value ="" disabled selected>Seleccione su nacionalidad</option>
<?php
                $sqlselect = "SELECT * FROM  `nacionalidad`";
                $result = $conexion->query($sqlselect);

                if ($result->num_rows > 0) {
                    //salida de datos
                    while($row = $result->fetch_assoc()) {
                        print_r    ("
                                    <option value='". $row['id_nac'] ."'>". $row['nacionalidad'] ."</option>
                                    ");
                    }
                }
?>
                </select><br>
                <label for="gen" class="frm">Genero:</label><br>
                <select name="genH" id="genH" required>
                    <option value="" disabled selected>Seleccione su genero</option>
<?php
                $sqlselect = "SELECT * FROM  `tipo_genero`";
                $result = $conexion->query($sqlselect);

                if ($result->num_rows > 0) {
                    //salida de datos
                    while($row = $result->fetch_assoc()) {
                        print_r    ("
                                    <option value='". $row['id_genero'] ."'>". $row['genero'] ."</option>
                                    ");
                    }
                }
?>
                    
                </select><br>
                <label for="lugnac">Lugar de nacimiento:</label><br>
                <input type="text" name="lugnacH" id="lugnacH" placeholder="¿Cual es su lugar de nacimiento?" required><br>
                <label for="ocup">Ocupación:</label><br>
                <input type="text" name="ocupacH" id="ocupacH" placeholder="¿Cual es su ocupación?" required><br>
            </div>
    </div>
    
    <!--------------------------    DATOS DEL CONYUGE 2     ------------------------->

    <div class="brd">
            <h4 id="h4-ttl">Datos del conyuge</h4>

            <div class="fM">
                <label for="name" class="frm">Nombre:</label><br>
                <input type="text" id="nameM" name="nameM" placeholder="Inserte su nombre" maxlength="50" required><br>
                <label for="apP" class="frm">Apellido Paterno:</label><br>
                <input type="text" id="apPM" name="apPM" placeholder="Inserte su apellido paterno" maxlength="50" required><br>
                <label for="apM" class="frm">Apellido Materno:</label><br>
                <input type="text" id="apMM" name="apMM" placeholder="Inserte su apellido paterno" maxlength="50" required><br>
                <label for="date" class="frm">Fecha de nacimiento:</label><br><br>
                <input type="date" name="fch_nacM" id="fch_nacM" required><br><br>
                <label for="domic">Domicilio:</label>
                <input type="text" name="domicM" id="domicM" placeholder="¿Cual es su domicilio?" required>
            </div>

            <div class="fM">
                <label for="curp" class="frm">CURP:</label><br>
                <input type="text" name="curpM" id="curp" placeholder="Ingrese su CURP" maxlength="18" required><br>
                <label for="nacionalidad">Nacionalidad:</label><br>
                <select name="nacM" id="nacM" required>
                    <option value ="" disabled selected>Seleccione su nacionalidad</option>
<?php
                $sqlselect = "SELECT * FROM  `nacionalidad`";
                $result = $conexion->query($sqlselect);

                if ($result->num_rows > 0) {
                    //salida de datos
                    while($row = $result->fetch_assoc()) {
                        print_r    ("
                                    <option value='". $row['id_nac'] ."'>". $row['nacionalidad'] ."</option>
                                    ");
                    }
                }
?>
                </select><br>
                <label for="gen" class="frm">Genero:</label><br>
                <select name="genM" id="genM" required>
                    <option value="" disabled selected>Seleccione su genero</option>
<?php
                $sqlselect = "SELECT * FROM  `tipo_genero`";
                $result = $conexion->query($sqlselect);

                if ($result->num_rows > 0) {
                    //salida de datos
                    while($row = $result->fetch_assoc()) {
                        print_r    ("
                                    <option value='". $row['id_genero'] ."'>". $row['genero'] ."</option>
                                    ");
                    }
                }
?>
                </select><br>
                <label for="lugnac">Lugar de nacimiento:</label><br>
                <input type="text" name="lugnacM" id="lugnacM" placeholder="¿Cual es su lugar de nacimiento?" required><br>
                <label for="ocup">Ocupación:</label><br>
                <input type="text" name="ocupacM" id="ocupacM" placeholder="¿Cual es su ocupación?" required><br>
            </div>
    </div>

    <!--------------    FORMULARIO DE PADRES    ---------------->

    <div class="brd">
        <h4 id="h4-ttl">Datos de los padres</h4>
            <div class="div-pads">
                <label for="nampad">Nombre del padre del novio:</label><br>
                <input type="text" name="padreH" id="pads" placeholder="Inserte el nombre del padre" ><br>
                <label for="nammad">Nombre de la madre del novio:</label><br>
                <input type="text" name="madreH" id="pads" placeholder="Inserte el nombre de la madre" ><br>
                <label for="dompad">Domicilio:</label><br>
                <input type="text" name="dompadH" id="pads" placeholder="Ingrese el domicilio de los padres"><br>
                <label for="ocupmad">Ocupación de la madre:</label><br>
                <input type="text" name="ocumadH" id="pads" placeholder="Ocupación de la madre" ><br>
                <label for="ocuppad">Ocupación de la padre:</label><br>
                <input type="text" name="ocupadH" id="pads" placeholder="Ocupación de la padre" ><br>
            </div>
            <div class="div-pads">
                <label for="nampad">Nombre del padre de la novia:</label><br>
                <input type="text" name="padreM" id="pads" placeholder="Inserte el nombre del padre" ><br>
                <label for="nammad">Nombre de la madre de la novia:</label><br>
                <input type="text" name="madreM" id="pads" placeholder="Inserte el nombre de la madre" ><br>
                <label for="dompad">Domicilio:</label><br>
                <input type="text" name="dompadM" id="pads" placeholder="Ingrese el domicilio de los padres"><br>
                <label for="ocupmad">Ocupación de la madre:</label><br>
                <input type="text" name="ocumadM" id="pads" placeholder="Ocupación de la madre" ><br>
                <label for="ocuppad">Ocupación de la padre:</label><br>
                <input type="text" name="ocupadM" id="pads" placeholder="Ocupación de la padre" ><br>
            </div>
    </div>
    
    <!----- FORMULARIO DATOS LEGALES ------>

    <div class="brd">
        <h4 id="h4-ttl">Datos de fiscales</h4>
            <div class="div-ofcl">
                <label for="enti">Entidad:</label><br>
                <input type="text" name="enti" class="ofcl" placeholder="¿Que Entidad es?" required><br>
                <label for="deleg">Delegación:</label><br>
                <input type="text" name="deleg" class="ofcl" placeholder="¿Que Delegación es?" required><br>
                <label for="juzg">Juzgado:</label><br>
                <input type="text" name="juzg" class="ofcl" placeholder="¿Que Juzgado es?" required><br>

                <label for="juzg">Tipo de regimen:</label><br>
                <select name='tpreg' id='tpreg' class='ofcl' required>
                    <option value='' disabled selected>Seleccione su tipo de regimen</option>
<?php

                $sqlselect = "SELECT * FROM  `situacion_mat`";
                $result = $conexion->query($sqlselect);

                if ($result->num_rows > 0) {
                    //salida de datos
                    while($row = $result->fetch_assoc()) {
                        echo ($row['sit_mat']);
                        print_r    ("
                             <option value='". $row['id_sit_mat'] ."'>". $row['sit_mat'] ."</option>
                            ");
                    }
                }
?>
                </select><br>

                <label for="enti">Libro:</label><br>
                <input type="text" name="lbro" class="ofcl" placeholder="¿Que Libro es?" required><br>
                
                <label for="juzg">Clase:</label><br>
                <input type="text" name="clase" class="ofcl" placeholder="¿Que Clase es?" required><br>

            </div>
            <br>
            <div class="div-btn">
                
                <button id="btnsub" type="submit" onclick="<script type='text/javascript'>alert('Se insertaron bien los datos')</script>">Enviar</button>


            </div>
        
        </form>
    </div>


    </body>
    <footer>
    </footer>
    </html>

<?php

    if (isset($_POST['submit'])) {
        echo    '<script type="text/javascript"> 
                    alert("
                        Se insertaron correctamente los datos.
                        <button onclick="">Click Me</button>
                    ");
                </script>';
    }

?>
