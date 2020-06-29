<?php

require("ConectaBD.php");

$query = "SELECT * FROM multas";

$multas = $conexion->prepare($query);

$multas -> execute();

$numeroRegistro = $multas -> rowCount();

if ( $numeroRegistro != 0 ) {

    try {

        $multas -> setFetchMode(PDO::FETCH_ASSOC);

        echo '<main><p>
        <table border="1" align="center" cellpadding="5" >
            <thead align="center">
                <tr>
                    <th>Motivo Multa</th>
                    <th>Tipo Vehículo</th>
                    <th>Marca Vehículo</th>
                    <th>Modelo Vehículo</th>
                    <th>Número Placa</th>
                    <th>Fecha</th>
                    <th>Foto</th>
                </tr>
            </thead>
        
            <tbody align="center">';

        foreach ($multas as $multa) {

            $rutaIMG = $multa["foto"];

            ?>

            <tr>
                <td> <?php echo $multa["motivo_multa"] ?> </td>
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
