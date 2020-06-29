<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Multas Realizadas</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <header><?php include_once("Cabecera.php"); ?></header>

    <a href="Cierre.php">Cierra Sesión</a>

    <?php    

    require("ConectaBD.php");

    session_start();

    if (!isset($_SESSION["usuario"])) header("location:index.php");

    $id = $_SESSION["id"];

    if ($_SESSION["rol"] == 1) include("Botonera.php");

    if (isset($_GET["codigo"]) && $_GET["codigo"] != "") {

        $codigo = htmlspecialchars($_GET["codigo"]);

        $query = "SELECT * FROM multas WHERE id='$codigo'";

        $multas = $conexion->prepare($query);

        $multas->execute();

        $numeroRegistro = $multas->rowCount();

        if ($numeroRegistro != 0) {

            try {

                $multas->setFetchMode(PDO::FETCH_ASSOC);

                echo '<main><p>
        <table border="1" align="center" cellpadding="5" >
            <thead align="center">
                <tr>
                    <th colspan="2">Motivo Multa</th>
                    <th>Tipo Vehículo</th>
                    <th>Marca Vehículo</th>
                    <th>Modelo Vehículo</th>
                    <th>Número Placa</th>
                    <th>Fecha</th>
                    <th colspan="2">Foto</th>
                </tr>
            </thead>
        
            <tbody align="center">';

                foreach ($multas as $multa) {

                    $rutaIMG = $multa["foto"];

                ?>

                    <tr>
                        <td colspan="2"> <?php echo $multa["motivo_multa"] ?> </td>
                        <td> <?php echo $multa["tipo_vehiculo"] ?> </td>
                        <td> <?php echo $multa["marca_vehiculo"] ?> </td>
                        <td> <?php echo $multa["modelo_vehiculo"] ?> </td>
                        <td> <?php echo $multa["numero_placa"] ?> </td>
                        <td> <?php echo $multa["fecha"] ?> </td>
                        <td> <img src="/img/<?php echo $rutaIMG; ?>" alt="Imagen de <?php echo $rutaIMG; ?>" width="20%"></td>
                    </tr>
                <?php
            }

            echo '</tbody></table></p></main>';
        } 
        
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>










</body>

</html>