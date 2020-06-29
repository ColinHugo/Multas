<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Agente</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <header><?php include_once("Cabecera.php"); ?></header>

    <a href="Cierre.php">Cierra Sesión</a>

    <nav><?php include_once("Botonera.php"); ?></nav>

    <main>

        <div class="container">

            <form action="BuscarAgente.php" method="POST">

                <div class="form-group">

                    <label for="correoElectronico">Correo Electrónico: </label>
                    <input type="email" name="correoElectronico" id="correoElectronico" class="form-control" required autofocus>

                </div>

                <div class="form-group">
                    <input type="submit" value="Buscar" class="btn btn-primary" name="enviar">
                </div>

            </form>
        </div>
    </main>
</body>
</html>