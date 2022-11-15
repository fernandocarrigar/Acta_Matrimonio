<?php
    session_start();
   $name = $_SESSION[$_GET['name']];
?>

<html>
<!doctype html>
    <head>
        <link rel="stylesheet" type="text/css" href="../vendor/reset.css">
        <link rel="stylesheet" type="text/css" href="../vendor/style.css">
        <title>Formulario</title>
    </head>
    <body id="form">


    <div class="brd">
        <form action="../pdf.php" method="get" target="_blank" id="form1">
            <h1>Datos de los padres: <?php echo $name ?></h1>
            <div class="div-pads">
                <label for="nampad">Nombre del padre del novio:</label><br>
                <input type="text" name="padre" id="pads" placeholder="Inserte el nombre del padre"><br>
                <label for="nammad">Nombre de la madre del novio:</label><br>
                <input type="text" name="madre" id="pads" placeholder="Inserte el nombre de la madre"><br>
                <label for="dompad">Domicilio:</label><br>
                <input type="text" name="dompad" id="pads" placeholder="Ingrese el domicilio de los padres" required><br>
                <label for="ocupmad">Ocupación de la madre:</label><br>
                <input type="text" name="ocupmad" id="pads" placeholder="Ocupación de la madre" required><br>
                <label for="ocuppad">Ocupación de la padre:</label><br>
                <input type="text" name="ocuppad" id="pads" placeholder="Ocupación de la padre" required><br>
            </div>
            <div class="div-pads">
                <label for="nampad">Nombre del padre de la novia:</label><br>
                <input type="text" name="padre" id="pads" placeholder="Inserte el nombre del padre"><br>
                <label for="nammad">Nombre de la madre de la novia:</label><br>
                <input type="text" name="madre" id="pads" placeholder="Inserte el nombre de la madre"><br>
                <label for="dompad">Domicilio:</label><br>
                <input type="text" name="dompad" id="pads" placeholder="Ingrese el domicilio de los padres" required><br>
                <label for="ocupmad">Ocupación de la madre:</label><br>
                <input type="text" name="ocupmad" id="pads" placeholder="Ocupación de la madre" required><br>
                <label for="ocuppad">Ocupación de la padre:</label><br>
                <input type="text" name="ocuppad" id="pads" placeholder="Ocupación de la padre" required><br>
            </div>
            <br>
            <div class="div-btn">
                
                <button id="btnsub" type="submit">Enviar</button>

                <a href="javascript: history.back()" type="button" id="btn">Cancelar</a>

            </div>
        
        </form>
    </div>



    </body>
    <footer>
    </footer>
    </html>