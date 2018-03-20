<?php  
require_once ("../modelos/carga.php");

$nombre = $_POST['nombre'];
$apellidoPaterno = $_POST['apellidoPaterno'];
$apellidoMaterno = $_POST['apellidoMaterno'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$ciudad = $_POST['ciudad'];
$colonia = $_POST['colonia'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];

if($conexion = obtenerConexion()){
		$query = "SELECT * FROM cuenta WHERE usuario = '$usuario' and tipo_cuenta = 'CLIENTE';";
		$resultado = pg_query($conexion, $query);
		$conjunto = pg_fetch_all($resultado);

		if(!$conjunto){
			$query1 = "INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, '$usuario', '$password', 'CLIENTE' );";
			$resultado1 = pg_query($conexion, $query1);

			$query2 = "INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( DEFAULT, '$ciudad', '$colonia', '$calle', '$numero' );";
			$resultado2 = pg_query($conexion, $query2);

			$query3 = "SELECT id_cuenta FROM cuenta WHERE usuario = '$usuario' and tipo_cuenta = 'CLIENTE';";
			$resultado3 = pg_query($conexion, $query3);
			$conjunto3 = pg_fetch_row($resultado3);

			$query4 = "SELECT id_direccion FROM direccion WHERE ciudad = '$ciudad' and colonia = '$colonia' and calle = '$calle' and numero = '$numero';";
			$resultado4 = pg_query($conexion, $query4);
			$conjunto4 = pg_fetch_row($resultado4);

			$query5 = "INSERT INTO CLIENTE( id_cliente, id_vendedor, nombre, apellido_paterno, apellido_materno, correo, id_cuenta, id_direccion ) VALUES( DEFAULT, null, '$nombre', '$apellidoPaterno', '$apellidoMaterno', '$correo', '$conjunto3[0]', '$conjunto4[0]' );";
			$resultado5 = pg_query($conexion, $query5);

			header( "location:../vistas/administrador.php" );
		}else{
			echo "la cuenta ya existe";
		}

		
	}else{
		echo "no se conecto";
	}


?>