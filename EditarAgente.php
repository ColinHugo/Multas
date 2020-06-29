<?php

include("ConectaBD.php");

if (isset($_GET["codigo"]) && $_GET["codigo"] != "") {

    $id = $_GET["codigo"];

    $query = $conexion -> prepare("SELECT * FROM agentes WHERE id = ?;");
    $query -> execute( [ $id ] );
    $agente  = $query -> fetch( PDO::FETCH_OBJ );
} 

else {
    echo "<script>alert('Parámetros insuficientes');
            window.location= 'BuscarAgente.php'</script>";
}

session_start();
if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Agentes</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">

</head>

<body>

    <header><?php include_once("Cabecera.php"); ?></header>

    <a href="FormularioBusqueda.php">Atrás</a>

    <nav><?php include_once("Botonera.php"); ?></nav>

    <main>

        <div class="container">

            <form method="post" action="guardarDatosEditados.php">

                <input type="hidden" name="id" value="<?php echo $agente ->id; ?>">

                <div class="form-group">

                    <label for="nombre">Nombre:</label>
                    <br>
                    <input value="<?php echo $agente ->nombre ?>" name="nombre" required type="text" class="form-control">

                </div>

                <div class="form-group">

                    <label for="apellidos">Apellido Paterno:</label>
                    <input value="<?php echo $agente ->apellido_paterno ?>" name="apellidoPaterno" required type="text" class="form-control">

                </div>

                <div class="form-group">

                    <label for="apellidos">Apellido Materno:</label>
                    <input value="<?php echo $agente ->apellido_materno ?>" name="apellidoMaterno" required type="text" class="form-control">

                </div>

                <div class="form-group">

                    <label for="numeroTelefonico">Número Telefónico</label>

                    <input value="<?php echo $agente ->numero_telefonico ?>" name="numeroTelefonico" required type="text" class="form-control">

                </div>

                <div class="form-group">

                    <label for="codigoPostal">Código Postal</label>
                    <input value="<?php echo $agente->codigo_postal ?>" name="codigoPostal" required type="text" class="form-control">

                </div>

                <div class="form-group">

                    <label for="correoElectronico">Correo Electónico</label>
                    <input value="<?php echo $agente ->correo_electronico ?>" name="correoElectronico" required type="text" class="form-control">

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

                    <input type="submit" value="Guardar cambios" class="btn btn-primary">
                    
                </div>

            </form>
        </div>
    </main>
</body>

</html>