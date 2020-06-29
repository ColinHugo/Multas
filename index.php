<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicia Sesión</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <header><?php include_once("Cabecera.php"); ?></header>

    <main>

        <div class="container">

            <form action="CompruebaLogin.php" method="POST">

                <div class="form-group">

                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" class="form-control" required autofocus>

                </div>

                <div class="form-group">

                    <label for="contrasena">Contraseña: </label>
                    <input type="password" name="contrasena" class="form-control" required>

                </div>

                <div class="form-group">
                    <input type="submit" value="Iniciar Sesion" class="btn btn-primary" name="enviar">
                </div>

            </form>
        </div>
    </main>
</body>
</html>