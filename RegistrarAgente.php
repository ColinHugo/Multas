<?php

function registra( $nombre, $apellidoPaterno, $apellidoMaterno, $numeroTelefonico, $codigoPostal,
                   $correoElectronico, $contrasena, $confirmarContrasena, $rol ){

    try {

        include("ConectaBD.php");
    
        $query = "SELECT * FROM agentes WHERE correo_electronico=:correoElectronico";
    
        $resultado = $conexion -> prepare( $query );
    
        $correoElectronico = htmlspecialchars( $_POST["correoElectronico"] );
    
        $resultado -> bindValue(":correoElectronico", $correoElectronico);
    
        $resultado -> execute();
    
        $numeroRegistro = $resultado -> rowCount();
    
        if ( $numeroRegistro == 0 ) {
    
            $nombre = htmlspecialchars ($_POST["nombre"]);
            $apellidoPaterno = htmlspecialchars( $_POST["apellidoPaterno"] );
            $apellidoMaterno = htmlspecialchars( $_POST["apellidoMaterno"] );
            $rol = $_POST["rol"];
    
            if ( strlen( $_POST["numeroTelefonico"] ) == 10 ) {
                $numeroTelefonico = htmlspecialchars( $_POST["numeroTelefonico"] );
            }
    
            else{
                echo "<script>alert('Número Telefónico Debe Tener 10 Dígitos');
                        window.location= 'FormularioRegistro.php'</script>";
            }
    
            if ( strlen( $_POST["codigoPostal"] ) == 5 ) {
                $codigoPostal = htmlspecialchars( $_POST["codigoPostal"] );
            }
    
            else{
                echo "<script>alert('Código Postal Debe Tener 5 Dígitos');
                        window.location= 'FormularioRegistro.php'</script>";
            }
            
            $correoElectronico = htmlspecialchars( $_POST["correoElectronico"] );
            $contrasena = htmlspecialchars( $_POST["contrasena"] );
            $confirmarContrasena = htmlspecialchars( $_POST["confirmarContrasena"] );
    
            if ( strcmp( $contrasena, $confirmarContrasena ) == 0 ) {
    
                if ( strlen( $contrasena ) >= 8 ) {
    
                    $contrasenaCifrada = password_hash( $contrasena, PASSWORD_DEFAULT );
    
                    $query = "INSERT INTO agentes (rol, nombre, apellido_paterno, apellido_materno, numero_telefonico, correo_electronico, codigo_postal, contrasena)
                              VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
    
                    $query = $conexion -> prepare( $query );
    
                    $arreglo = array( $rol, $nombre, $apellidoPaterno, $apellidoMaterno, $numeroTelefonico, $correoElectronico, $codigoPostal, $contrasenaCifrada );
    
                    try {
                        $query -> execute($arreglo);
                        echo "<script>alert('Agente Agregado');
                        window.location= 'FormularioRegistro.php'</script>";
                    } 
                
                    catch (PDOException $e) {
                        print $e -> getMessage();
                        echo "<script>alert('Agente No Pudo Ser Agregado');
                                window.location= 'FormularioRegistro.php'</script>";
                    }                
                }
    
                else {
                    echo "<script>alert('Contraseña Debe Tener Mínimo 8 Caracteres');
                    window.location= 'FormularioRegistro.php'</script>";
                }            
            } 
            
            else {
                echo "<script>alert('Contraseñas No Coinciden.');
                        window.location= 'FormularioRegistro.php'</script>";
            }
        } 
        
        else {
            echo "<script>alert('Correo Electrónico ya fue registrado');
                window.location= 'FormularioRegistro.php'</script>";
        }
    } 
    
    catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

?>