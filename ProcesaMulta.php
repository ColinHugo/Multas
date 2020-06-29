<?php

include_once("ConectaBD.php");

session_start();
if (!isset($_SESSION["usuario"])) header("location:index.php");

$aux = $_POST["motivoMulta"] ;
$motivoMulta = NULL;

foreach ($aux as $motivo) $motivoMulta .= $motivo ."<br>" ;


$id = $_SESSION["id"];
//$motivoMulta = $_POST["motivoMulta"];
$tipoVehiculo = $_POST["tipoVehiculo"];
$marcaVehiculo = $_POST["marcaVehiculo"];
$modeloVehiculo = $_POST["modeloVehiculo"];
$numeroPlaca = $_POST["numeroPlaca"];
$fecha = $_POST["fecha"];
$nombreImagen = $_FILES['foto']['name'];
$tipoImagen = $_FILES['foto']['type'];
$tamanoImagen = $_FILES['foto']['size'];

if ( $tamanoImagen <= 3000000 ) {

    if ( $tipoImagen == "image/jpeg" || $tipoImagen == "image/jpg" || $tipoImagen == "image/png" ) {
        
        $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . '/img/';
        move_uploaded_file( $_FILES['foto']['tmp_name'], $carpetaDestino . $nombreImagen );
    }

    else{

        echo "<script>alert('Formato no permitido);
                window.location= 'GeneraMulta.php'</script>";        
    }
}

else{
    echo "<script>alert('El tamaño de la Foto es demasiado grande);
                window.location= 'GeneraMulta.php'</script>";
}

$query = "INSERT INTO multas(id, motivo_multa, tipo_vehiculo, marca_vehiculo, modelo_vehiculo, numero_placa, fecha, foto)
          VALUES(?, ?, ?, ?, ?, ?, ?, ?)";

$query = $conexion -> prepare( $query );

try {

    $resultado = $query -> execute( [ $id, $motivoMulta, $tipoVehiculo, $marcaVehiculo, $modeloVehiculo, 
                                      $numeroPlaca, $fecha, $nombreImagen ] );
    echo "<script>alert('Multa Agregada');
            window.location= 'GeneraMulta.php'</script>";
}

catch (PDOException $e) {

    print $e -> getMessage();
    echo "<script>alert('Multa No Pudo Ser Agregado');
            window.location= 'GeneraMulta.php'</script>";
}

?>