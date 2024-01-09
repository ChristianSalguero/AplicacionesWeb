<?php

// procesar.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // No se le agrega ningún IF ya que es un campo obligatorio en el formulario.
    $nombre = $_POST["nombre"];

    // No se le agrega ningún IF ya que es un campo obligatorio en el formulario.
    $apellidos = $_POST["apellidos"];

    $edad = $_POST["edad"];
    $edadformateda = date("d/m/Y", strtotime($edad));

    if (isset($_POST["direccion"]) && $_POST["direccion"] != "") {
        $direccion = $_POST["direccion"];
    } else {
        $direccion = "Dirección no agregada.";
    }

    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $nombreArchivo = $_FILES["photo"]["name"];
        // Generar un nombre único para el archivo
        $nombreArchivoUnico = uniqid() . "_" . $nombreArchivo;
        $rutaArchivo = "photos/" . $nombreArchivoUnico;
        // Mover la foto de perfil a una carpeta de destino
        move_uploaded_file($_FILES["photo"]["tmp_name"], $rutaArchivo);
    } else {
        $rutaArchivo = "photos/NoPhoto.jpg";
    }

    // No se le agrega ningún IF ya que es un campo obligatorio en el formulario.
    $login = $_POST["login"];

    // No se le agrega ningún IF ya que es un campo obligatorio en el formulario.
    $password = $_POST["password"];

    // No se le agrega ningún IF ya que es un campo obligatorio en el formulario.
    $sexo = $_POST["sexo"];

    if (isset($_POST["seguro"]) && is_array($_POST["seguro"])) {
        $segurosSeleccionados = $_POST["seguro"];
    } else {
        $segurosSeleccionados = "Ningún seguro seleccionado.";
    }

    if (isset($_POST["seguroautomoviles"]) && $_POST["seguroautomoviles"] != "") {
        $seguroautomoviles = $_POST["seguroautomoviles"];
    } else {
        $seguroautomoviles = "Seguro de coche no contratado.";
    }

    if (isset($_POST["segurohogar"]) && $_POST["segurohogar"] != "") {
        $segurohogar = $_POST["segurohogar"];
    } else {
        $segurohogar = "Seguro de hogar no contratado.";
    }

    if (isset($_POST["segurovida"]) && $_POST["segurovida"] != "") {
        $segurovida = $_POST["segurovida"];
    } else {
        $segurovida = "Seguro de vida no contratado.";
    }

    if (isset($_POST["codigopostal"]) && $_POST["codigopostal"] != "Correo postal") {
        $codigopostal = $_POST["codigopostal"];
    } else {
        $codigopostal = "Código postal no agregado.";
    }
    
    if (isset($_POST["horario"]) && $_POST["horario"] != "Horario") {
        $horario = $_POST["horario"];
    } else {
        $horario = "Horario no agregado.";
    }

    if (isset($_POST["descripcion"]) && $_POST["descripcion"] != "") {
        $descripcion = $_POST["descripcion"];
    } else {
        $descripcion = "Ninguna descripción agregada.";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Usuario Registrado Correctamente</title>
        <style>
            body {
                font-family: Verdana;
                background-image: url("photos/background.jpg");
                color: white;
            }
            h1 {
                text-align: center;
                margin-top: 40px;
                font-size: 50px;
            }
            .perfil {
                margin-top: 40px;
                margin-left: 50px;
                width: 150px;
                height: 150px;
                border-radius: 500px;
            }
            .caja {
                background-color: #332F2C;
                border-radius: 30px;
                margin-left: 15%;
                margin-right: 15%;
                opacity: 0.9;
                border: 5px solid gray;
                width: 1250px;
                height: 780px;
            }
            .usercaja {
                width: 70vh;
                margin-left: 230px;
                margin-top: -165px;
            }
            .user {
                font-size: 40px;
            }
            .fechacaja {
                width: 50vh;
                margin-left: 230px;
                margin-top: -25px;
                margin-bottom: 60px;
            }
            .fecha {
                font-size: 20px;
            }
            hr {
                margin-top: 25px;
                color: #332f2c;
                margin-bottom: 25px;
            }
            .subtitulo {
                font-size: 30px;
                margin-left: 60px;
            }
            .nombrecaja {
                font-size: 18px;
                margin-left: 120px;
                margin-top: -20px;
                max-width: 400px;
            }
            .apellidoscaja {
                font-size: 18px;
                margin-left: 120px;
                margin-top: -5px;
                max-width: 400px;
            }
            .direccioncaja {
                font-size: 18px;
                margin-left: 120px;
                margin-top: -5px;
                max-width: 550px;
            }
            .passwdcaja {
                font-size: 18px;
                margin-left: 120px;
                margin-top: -5px;
                max-width: 400px;
            }
            .sexocaja {
                font-size: 18px;
                margin-left: 120px;
                margin-top: -5px;
                max-width: 400px;
            }
            .seguroscaja {
                font-size: 18px;
                margin-left: 120px;
                margin-top: -5px;
                max-width: 400px;
            }
            .seguroautomovilcaja {
                font-size: 18px;
                margin-left: 120px;
                margin-top: -5px;
                max-width: 500px;
            }
            .segurohogarcaja {
                font-size: 18px;
                margin-left: 120px;
                margin-top: -5px;
                max-width: 500px;
            }
            .segurovidacaja {
                font-size: 18px;
                margin-left: 120px;
                margin-top: -5px;
                max-width: 500px;
            }
            .descripcioncaja {
                font-size: 18px;
                max-width: 500px;
                margin-left: 720px;
                margin-top: -430px;
            }
            .subtitulo2 {
                font-size: 20px;
                margin-left: 720px;
                margin-top: 80px;
            }
            .codigopostalcaja {
                font-size: 18px;
                max-width: 500px;
                margin-left: 720px;
                margin-top: -5px;
            }
            .horariocaja {
                font-size: 18px;
                max-width: 500px;
                margin-left: 720px;
                margin-top: -5px;
            }
        </style>
    </head>
    <body>
        <h1>Hola, <?php echo $nombre; ?>! Tu usuario se ha creado correctamente.</h1>
        <div class="caja">
            <div class="arriba">
                <img class="perfil" src="<?php echo $rutaArchivo; ?>" alt="foto de perfil">
                <div class="usercaja">
                    <p class="user"><b><?php echo $login; ?></b></p>
                </div>
                <div class="fechacaja">
                    <p class="fecha"><b>Fecha de nacimiento: <?php echo $edadformateda; ?></b></p>
                </div>
            </div>
            <hr>
            <div class="abajo">
                <div class="subtitulo">
                    <h2 class="datos">Tus datos: </h2>
                </div>
                <div class="nombrecaja">
                    <p class="nombre"><b>Nombre: </b><?php echo $nombre; ?></p>
                </div>
                <div class="apellidoscaja">
                    <p class="apellidos"><b>Apellidos: </b><?php echo $apellidos; ?></p>
                </div>
                <div class="direccioncaja">
                    <p class="direccion"><b>Dirrección: </b><?php echo $direccion; ?></p>
                </div>
                <div class="passwdcaja">
                    <p class="passwd"><b>Contraseña: </b><?php echo $password; ?></p>
                </div>
                <div class="sexocaja">
                    <p class="sexo"><b>Sexo: </b><?php echo $sexo; ?></p>
                </div>
                <div class="seguroscaja">
                    <p class="seguros"><b>Seguros contratados: </b></p>
                    <ul class="seguroslista">
                        <?php
                        if (isset($_POST["seguro"]) && is_array($_POST["seguro"])) {
                            $segurosSeleccionados = $_POST["seguro"];
                            foreach ($segurosSeleccionados as $seguro) {
                               echo "<li>" . htmlspecialchars($seguro) . "</li>";
                            }
                        } else {
                            echo $segurosSeleccionados;
                        }
                        ?>
                    </ul>
                </div>
                <div class="seguroautomovilcaja">
                    <p class="seguroautomovil"><b>Seguro automovil contratado: </b><?php echo $seguroautomoviles; ?></p>
                </div>
                <div class="segurohogarcaja">
                    <p class="segurohogar"><b>Seguros de hogar contratado: </b><?php echo $segurohogar; ?></p>
                </div>
                <div class="segurovidacaja">
                    <p class="segurovida"><b>Seguros de vida contratado: </b><?php echo $segurovida; ?></p>
                </div>
                <div class="descripcioncaja">
                    <p class="descripcion"><b>Descripción: </b><?php echo $descripcion; ?></p>
                </div>
                <div class="subtitulo2">
                    <h3 class="preferenciascontacto">Preferencias de contacto:</h3>
                </div>
                <div class="codigopostalcaja">
                    <p class="codigopostal"><b>Código postal: </b><?php echo $codigopostal; ?></p>
                </div>
                <div class="horariocaja">
                    <p class="horario"><b>Horario: </b><?php echo $horario; ?></p>
                </div>
            </div>
        </div>
    </body>
</html>
