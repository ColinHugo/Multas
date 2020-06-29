<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Agentes</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <?php

    session_start();
    if (!isset($_SESSION["usuario"])) header("location:index.php");    

    ?>

    <header><?php include_once("Cabecera.php"); ?></header>

    <a href="FormularioRegistro.php">Atrás</a>

    <nav><?php include_once("Botonera.php"); ?></nav>

    <?php

    include_once("ConectaBD.php");

    if (isset($_POST["correoElectronico"]) && $_POST["correoElectronico"] != "") {

        $correoElectronico = htmlspecialchars($_POST["correoElectronico"]);

        $query = "SELECT * FROM agentes WHERE correo_electronico='$correoElectronico'";
        $agentes = $conexion->prepare($query);

        $agentes->execute();

        $numeroRegistro = $agentes->rowCount();

        if ($numeroRegistro != 0) {

            try {

                $agentes->setFetchMode(PDO::FETCH_ASSOC);

                echo '<main><p>
                        <table border="1" align="center" cellpadding="5" >
                            <thead align="center">
                                <tr>
                                    <th>ID</th>
                                    <th>ROL</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Número Telefónico</th>
                                    <th>Correo Electrónico</th>
                                    <th>Código Postal</th>
                                    <th colspan="3">Opciones</th>
                                </tr>
                            </thead>
                        
                            <tbody align="center">';

                foreach ($agentes as $agente) {
                    echo "<tr><td>" . $agente["id"] . "</td>";
                    echo "<td>" . $agente["rol"] . "</td>";
                    echo "<td>" . $agente["nombre"] . "</td>";
                    echo "<td>" . $agente["apellido_paterno"] . "</td>";
                    echo "<td>" . $agente["apellido_materno"] . "</td>";
                    echo "<td>" . $agente["numero_telefonico"] . "</td>";
                    echo "<td>" . $agente["correo_electronico"] . "</td>";
                    echo "<td>" . $agente["codigo_postal"] . "</td>";
                    // echo "<td>" . $agente["contrasena"] . "</td></tr>";
                    echo '<td><a href="EliminarAgente.php?codigo=' . $agente["id"] . '">BORRAR</a></td>';
                    echo '<td><a href="EditarAgente.php?codigo=' . $agente["id"] . '">MODIFICAR</a></td>';
                    echo '<td><a href="MuestraMultas.php?codigo=' . $agente["id"] . '">VER MULTAS</a></td></tr>';
                }

                echo '</tbody></table></p></main>';
            } 
            
            catch (PDOException $e) {
                print $e->getMessage();
                echo "<script>alert('Fallo en la busqueda');</script>";
            }
        } 
        
        else {
            echo "<script>alert('No existen Datos');
                window.location= 'FormularioRegistro.php'</script>";
        }
    }

    ?>

</body>
</html>