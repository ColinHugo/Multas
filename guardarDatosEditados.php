<?php

include("ConectaBD.php");


if( isset( $_POST[ "id" ] ) && $_POST[ "id" ] != "" &&
	isset( $_POST["rol"] ) && $_POST["rol"] != "" &&
	isset( $_POST[ "nombre"] ) && $_POST[ "nombre" ] != "" && 
	isset( $_POST[ "apellidoPaterno"] ) && $_POST[ "apellidoPaterno" ] != "" && 
	isset( $_POST[ "apellidoMaterno"] ) && $_POST[ "apellidoMaterno" ] != "" && 
	isset( $_POST[ "numeroTelefonico"] ) && $_POST[ "numeroTelefonico" ] != "" &&
	isset( $_POST[ "codigoPostal"] ) && $_POST[ "codigoPostal" ] != "" &&
	isset( $_POST[ "correoElectronico" ] ) && $_POST[ "correoElectronico" ] != "" ){

		$id = $_POST["id"];
		$rol = $_POST["rol"];
		$nombre = $_POST["nombre"];
		$apellidoPaterno = $_POST["apellidoPaterno"];
		$apellidoMaterno = $_POST["apellidoMaterno"];
		$numeroTelefonico = $_POST["numeroTelefonico"];
		$codigoPostal = $_POST["codigoPostal"];
		$correoElectronico = $_POST["correoElectronico"];

		$query = $conexion -> prepare("UPDATE agentes SET id = ?, rol = ?, nombre = ?, apellido_paterno = ?, 
									  apellido_materno = ?, numero_telefonico = ?, codigo_postal = ?, 
									  correo_electronico = ? WHERE id = '$id';");

		$resultado = $query -> execute( [ $id, $rol, $nombre, $apellidoPaterno, $apellidoMaterno, $numeroTelefonico,
											  $codigoPostal, $correoElectronico ] ); 

		if($resultado === TRUE) {

			echo "<script>alert('Registro Actualizado');
            	    window.location= 'FormularioBusqueda.php'</script>";
		}

		else {
			echo "<script>alert('Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario');
            	    window.location= 'FormularioBusqueda.php'</script>";
		}
	}

	else{
		echo "<script>alert('Parámetros Incorrectos');
            	    window.location= 'FormularioBusqueda.php'</script>";

	}
?>