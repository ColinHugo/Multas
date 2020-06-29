<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Generar Multa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
 
 <style type="text/css">
    #izquierda{
        float:left;
        padding:10px;
        color:#fff;
        width:300px;
        margin:40px;
        background:#039;
    }
    #derecha{
        float:left;
        padding:10px;
        color:#fff;
        width:300px;
        margin:40px;
        background:#039;
    }
  </style>

</head>

<body>

    <?php

        session_start();
        $id = $_SESSION["id"];

        if (!isset($_SESSION["usuario"])) header("location:index.php");   

    ?>

    <header><?php include_once("Cabecera.php"); ?></header>

    <a href="Cierre.php">Cierra Sesión</a>

    <?php if ( $_SESSION["rol"] == 1 ) include("Botonera.php"); ?>

    <div class="container">

        <form action="ProcesaMulta.php" method="POST" name="multa" enctype="multipart/form-data">

            <div id="izquierda" class="form-group">

                <fieldset>
                
                    <legend>Motivo de la multa</legend>
                
                    <label for="celular">Uso celular:&nbsp;&nbsp;&nbsp;</label>
                    <input type="checkbox" name="motivoMulta[]" id="celular" value="Uso del Celular"><br>

                    <label for="estacionarse">Estacionarse en lugar prohibido:&nbsp;&nbsp;&nbsp;</label>
                    <input type="checkbox" name="motivoMulta[]" id="estacionarse" value="Estacionado en lugar prohibido"><br>

                    <label for="cinturon">No usar cinturón de seguridad:&nbsp;&nbsp;&nbsp;</label>
                    <input type="checkbox" name="motivoMulta[]" id="cinturon" value="No Usar Cinturón de Seguridad"><br>

                    <label for="semaforo">Saltarse semáforo:&nbsp;&nbsp;&nbsp;</label>
                    <input type="checkbox" name="motivoMulta[]" id="semaforo" value="Ignorar Semáforo"><br>

                    <label for="alcohol">Estado alcohólico:&nbsp;&nbsp;&nbsp;</label>
                    <input type="checkbox" name="motivoMulta[]" id="alcohol" value="Estado Alcohólico"><br>


                </fieldset>

            </div>

            <div id="derecha" class="form-group">

                <fieldset>

                    <legend>Tipo del vehículo</legend>

                    <label for="sedan">Sedan:&nbsp;&nbsp;&nbsp;</label>
                    <input type="radio" name="tipoVehiculo" id="sedan" value="Sedan"><br>
                     
                    <label for="camioneta">Camioneta:&nbsp;&nbsp;&nbsp;</label>
                    <input type="radio" name="tipoVehiculo" id="camioneta" value="Camioneta"><br>

                    <label for="pickUp">Pick up:&nbsp;&nbsp;&nbsp;</label>
                    <input type="radio" name="tipoVehiculo" id="pickUp" value="Pick Up"><br>

                </fieldset>

                <fieldset>

                    <legend>Datos del vehículo</legend>

                    <div class="form-group">

                        <label for="marcaVehiculo">Marca del vehículo: </label>
                        <input type="text" name="marcaVehiculo" id="marcaVehiculo" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="modeloVehiculo">Modelo del vehículo: </label>
                        <input type="text" name="modeloVehiculo" id="modeloVehiculo" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="numeroPlaca">Número de la placa: </label>
                        <input type="tel" name="numeroPlaca" id="numeroPlaca" class="form-control">
                    </div>

                </fieldset>

            </div>

            <fieldset>

                <legend>Fecha y hora de Infracción</legend>

                <div class="form-group">

                    <input type="datetime-local" name="fecha" id="fecha" class="form-control">

                </div>
            </fieldset>

            <div class="form-group">

                <input type="file" name="foto" size="20" accept="image/png, .jpeg, .jpg" multiple class="btn btn-primary">

            </div>

            <input type="hidden" name="id" value='<?php $id ?>'>

            <div class="form-group">
                <input type="submit" value="Guardar" class="btn btn-primary">
                <input type="reset" value="Cancelar" class="btn btn-primary">
            </div>

        </form>

    </div>
</body>
</html>