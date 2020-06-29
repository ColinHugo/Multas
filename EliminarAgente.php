<?php

try {

    include("ConectaBD.php");

    if ( isset( $_GET["codigo"] ) and $_GET["codigo"] != "" ){

        $codigo = htmlspecialchars( $_GET["codigo"] );
        $query = "DELETE FROM agentes WHERE id=:codigo";

        $resultado = $conexion -> prepare( $query );

        try {

            $resultado -> execute( array( ":codigo" => $codigo) );
                echo "<script>alert('Agente Eliminado');
                window.location= 'FormularioRegistro.php'</script>";
            } 
            
            catch (PDOException $e) {
                print $e -> getMessage();
                echo "<script>alert('Agente No Pudo Ser Eliminado');
                        window.location= 'BuscarAgente.php'</script>";
            }
    
    } 
    
    else {    
        echo "<script>alert('No se ha indicado cual registro eliminar');
                        window.location= 'FormularioRegistro.php'</script>";    
    }
    
    echo "<script>alert('Error inesperado');
                        window.location= 'BuscarAgente.php'</script>";

} 

catch( PDOException $e ){
    die("Error: " . $e -> getMessage());
}
