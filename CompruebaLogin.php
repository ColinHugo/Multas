<?php

include("ConectaBD.php");

try {

    $nombre = htmlspecialchars( $_POST["nombre"] );
    $contrasena = htmlspecialchars( $_POST["contrasena"] );

    $contador = 0;

    $query = "SELECT * FROM agentes WHERE nombre=:nombre";

    $resultado = $conexion -> prepare( $query );

    $resultado -> execute( array( ":nombre" => $nombre ) );

    while ( $registro = $resultado -> fetch( PDO::FETCH_ASSOC ) ) {

        if ( password_verify( $contrasena, $registro["contrasena"] ) ) {
            $contador++;            
        }
    }

    if ( $contador > 0 ) {

        try {

            $consulta = "SELECT rol, id FROM agentes WHERE nombre='$nombre'";
            $rol = $conexion -> prepare( $consulta );
            $rol -> execute();
            
            if( $resultset = $rol -> fetch( PDO::FETCH_OBJ ) ) {
                $num = $resultset -> rol;
                $id = $resultset -> id;
            }
        } 
        
        catch (PDOException $e) {
            echo "No se pudo establecer tipo de usuario" . $e -> getMessage();            
        }

        if ( $num == 1 ) {
            session_start();
            $_SESSION["usuario"] = $_POST["nombre"];
            $_SESSION["rol"] = 1;
            $_SESSION["id"] = $id;
            header( "location:FormularioRegistro.php" );
        }

        else{
            session_start();
            $_SESSION["usuario"] = $_POST["nombre"];
            $_SESSION["rol"] = 0; 
            $_SESSION["id"] = $id;           
            header("location:GeneraMulta.php");
        }
    }

    else{
        echo "<script>alert('Datos Inválidos');
                window.location= 'index.php'</script>";
    }
} 

catch (PDOException $e) {
    die("Error al iniciar sesión" . $e -> getMessage());    
}

?>   