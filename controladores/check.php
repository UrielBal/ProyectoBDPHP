<?php
	require_once ("../modelos/carga.php");
	$usuario = $_POST["usuario"];
	$password = $_POST["password"];

	if ($conexion = obtenerConexion()) {
		$query = "SELECT * FROM cuenta WHERE usuario = '$usuario' and password = '$password';";
		$resultado = pg_query($conexion, $query);
		$conjunto = pg_fetch_all($resultado);

		if ($conjunto) {
			$usuario = pg_fetch_row($resultado);
			if ($usuario[3] == 'CLIENTE'){
				session_start();
				$_SESSION["id_cuenta"] = $usuario[0];
				$_SESSION["usuario"] = $usuario[1];
				$_SESSION["password"] = $usuario[2];
				$_SESSION["tipo_usuario"] = $usuario[3];

				header("Location: ../vistas/cliente.php");
			}
			if ($usuario[3] == 'ADMINISTRADOR') {
				session_start();
				$_SESSION["id_cuenta"] = $usuario[0];
				$_SESSION["usuario"] = $usuario[1];
				$_SESSION["password"] = $usuario[2];
				$_SESSION["tipo_usuario"] = $usuario[3];

				header("Location: ../vistas/administrador.php");
			}

			if ($usuario[3] == 'EMPLEADO') {
				session_start();
				$_SESSION["id_cuenta"] = $usuario[0];
				$_SESSION["usuario"] = $usuario[1];
				$_SESSION["password"] = $usuario[2];
				$_SESSION["tipo_usuario"] = $usuario[3];
				
				header("Location: ../vistas/empleado.php");
			}
		}else{
			echo "No se encontro el usuario";
		}
	}else{
		echo "error de conexion";
	}
?>