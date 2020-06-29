<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Regístrate</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <?php session_start(); if ( !isset( $_SESSION["usuario"] ) )header("location:index.php");?>

    <?php

    $nombre = NULL;
    $apellidoPaterno = NULL;
    $apellidoMaterno = NULL;
    $numeroTelefonico = NULL;
    $codigoPostal = NULL;
    $correoElectronico = NULL;
    $contrasena = NULL;
    $confirmarContrasena = NULL;
    $rol = NULL;

    if ( isset( $_POST["enviar"] ) ) {  
        
        $nombre = $_POST["nombre"];
        $apellidoPaterno = $_POST["apellidoPaterno"];
        $apellidoMaterno = $_POST["apellidoMaterno"];
        $numeroTelefonico = $_POST["numeroTelefonico"];
        $codigoPostal = $_POST["codigoPostal"];
        $correoElectronico = $_POST["correoElectronico"];
        $rol = $_POST["rol"];
        
        if ( is_string( $nombre ) ){
            $nombre = preg_replace( '/[0-9]+/', '', $_POST["nombre"] );

            if ( settype( $apellidoPaterno, "string" ) ){
                $apellidoPaterno = preg_replace( '/[0-9]+/', '', $_POST["apellidoPaterno"] );

                if ( settype( $apellidoMaterno, "string" ) ){
                    $apellidoMaterno = preg_replace( '/[0-9]+/', '', $_POST["apellidoMaterno"] );

                    if ( settype( $numeroTelefonico, "integer" ) && strlen( $numeroTelefonico ) == 10 ) {
                        $numeroTelefonico = $_POST["numeroTelefonico"];

                        if ( strlen( $codigoPostal ) == 5 ) {
                            $codigoPostal = $_POST["codigoPostal"];

                            if ( strcmp( $_POST["contrasena"], $_POST["confirmarContrasena"] ) == 0 ) {

                                if ( strlen( $_POST["contrasena"] ) >= 8 ) {
                                    $contrasena = $_POST["contrasena"];
                                    $confirmarContrasena = $_POST["confirmarContrasena"];
                    
                                    include("RegistrarAgente.php");
                                     
                                    registra( $nombre, $apellidoPaterno, $apellidoMaterno, $numeroTelefonico, $codigoPostal,
                                            $correoElectronico, $contrasena, $confirmarContrasena, $rol );

                                } else echo "<script>alert('Contraseñas pequeña')</script>";
                                
                            } else echo "<script>alert('Contraseñas no se parecen')</script>";

                        } else echo "<script>alert('Código Postal Incorrecto')</script>";

                    } else echo "<script>alert('Número telefónico incorrecto')</script>";
                
                } else echo "<script>alert('Apellido Paterno incorrecto')</script>";
                
            } else echo "<script>alert('Apellido Materno incorrecto')</script>";

        } else echo "<script>alert('Nombre incorrecto')</script>";
        
    }

    ?>   

    <header><?php include_once("Cabecera.php"); ?></header>

    <a href="Cierre.php">Cierra Sesión</a>

    <nav><?php include_once("Botonera.php"); ?></nav>

    <main>    

        <div class="container">

            <form action="" method="POST">

                <div class="form-group">

                    <label for="nombre">Nombre(s):</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>"
                    class="form-control" required autofocus>

                </div>

                <div class="form-group">

                    <label for="apellidoPaterno">Apellido Paterno: </label>
                    <input type="text" name="apellidoPaterno" id="apellidoPaterno" value="<?php echo $apellidoPaterno; ?>"
                    class="form-control" required>

                </div>

                <div class="form-group">

                    <label for="apellidoMaterno">Apellido Materno: </label>
                    <input type="text" name="apellidoMaterno" id="apellidoMaterno" value="<?php echo $apellidoMaterno; ?>"
                    class="form-control" required>

                </div>

                <div class="form-group">

                    <label for="numeroTelefonico">Número Telefónico: </label>
                    <input type="tel" name="numeroTelefonico" id="numeroTelefonico"
                    value="<?php echo $numeroTelefonico; ?>" class="form-control" maxlength="10" required>

                </div>

                <div class="form-group">

                    <label for="codigoPostal">Código Postal: </label>
                    <input type="tel" name="codigoPostal" id="codigoPostal" value="<?php echo $codigoPostal; ?>"
                    class="form-control" maxlength="5" required>

                </div>

                <div class="form-group">

                    <label for="correoElectronico">Correo:</label>
                    <input type="email" name="correoElectronico" id="correoElectronico" 
                    value="<?php echo $correoElectronico; ?>" class="form-control" placeholder="nombre@servicio.com" required>

                </div>

                <div class="form-group">

                    <label for="contrasena">Contrasena:</label>
                    <input type="password" name="contrasena" id="contrasena" 
                    class="form-control" placeholder="8 Caracteres Mínimo" required>

                </div>

                <div class="form-group">

                    <label for="confirmarConstrasena">Repetir Contrasena:</label>
                    <input type="password" name="confirmarContrasena" id="confirmarConstrasena" 
                    class="form-control" required>

                </div>

                <div class="form-group">

                    <fieldset>

                        <legend>Tipo de Usuario</legend>

                            <label for="agente">Agente:&nbsp;&nbsp;&nbsp;</label>
                            <input type="radio" name="rol" value="0" id="agente"><br>
 
                            <label for="administrativo">Administrativo:&nbsp;&nbsp;&nbsp;</label>
                            <input type="radio" name="rol" value="1" id="administrativo"><br>

                    </fieldset>

                </div>

                <div class="form-group">
                    <input type="submit" name="enviar" value="Guardar" class="btn btn-primary">
                    <input type="reset" value="Cancelar" class="btn btn-primary">
                </div>

            </form>
        </div>
    </main>
</body>
</html>