<?php
	require_once ("../modelos/carga.php");

	$nombre = $_POST["nombre"];
	$apellido_paterno = $_POST["apellido_paterno"];
	$apellido_materno = $_POST["apellido_materno"];
	$correo = $_POST["correo"];
	$usuario = $_POST["usuario"];
	$password = $_POST["password"];

	if($conexion = obtenerConexion()){
		$query = "SELECT * FROM cuenta WHERE usuario = '$usuario' and tipo_cuenta = 'CLIENTE';";
		$resultado = pg_query($conexion, $query);
		$conjunto = pg_fetch_all($resultado);

		if (!$conjunto){//si no existe un usuario igual
			$query2 = "INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, '$usuario', '$password', 'CLIENTE' );"; //ingresamos la cuenta
			$resultado2 = pg_query($conexion, $query2);
			$query3 = "SELECT id_cuenta FROM cuenta WHERE usuario = '$usuario' and tipo_cuenta = 'CLIENTE';"; //tomamos el id de la cuenta
			$resultado3 = pg_query($conexion, $query3);
			$id_cuenta = pg_fetch_row($resultado3); //arreglo con la cuenta		
			$query4 = "INSERT INTO CLIENTE( id_cliente, id_vendedor, nombre, apellido_paterno, apellido_materno, correo, id_cuenta, id_direccion ) VALUES( DEFAULT, NULL , '$nombre', '$apellido_paterno', '$apellido_materno', '$correo', '$id_cuenta[0]', NULL );"; //creamos al cliente

			session_start();
			$_SESSION["id_cuenta"] = $id_cuenta[0];
			$_SESSION["usuario"] = $usuario;
			$_SESSION["password"] = $password;
			$_SESSION["tipo_usuario"] = 'CLIENTE';

			$resultado4 = pg_query($conexion, $query4);
			$asunto = 'Cuenta de TechnoHouse';
			$contenido = "Usuario: $usuario;;;;Password: $password";
			mail($correo, $asunto , $contenido);	
			header( "location:../vistas/cliente.php" );
		}else{
			header( "location:../vistas/registroExistente.html" );
		}
	}else{
		echo "no se conecto";
	}
?>