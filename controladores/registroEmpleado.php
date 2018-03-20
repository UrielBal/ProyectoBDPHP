<?php  
require_once ("../modelos/carga.php");

$nombre = $_POST['nombre'];
$apellidoPaterno = $_POST['apellidoPaterno'];
$apellidoMaterno = $_POST['apellidoMaterno'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$idAgencia = $_POST['id_agencia'];
$tipo = $_POST['tipo_empleado'];

if($conexion = obtenerConexion()){
		$query = "SELECT * FROM cuenta WHERE usuario = '$usuario' and tipo_cuenta = 'EMPLEADO';";
		$resultado = pg_query($conexion, $query);
		$conjunto = pg_fetch_all($resultado);

		if(!$conjunto){
			$query1 = "INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, '$usuario', '$password', 'EMPLEADO' );";
			$resultado1 = pg_query($conexion, $query1);

			$query3 = "SELECT id_cuenta FROM cuenta WHERE usuario = '$usuario' and tipo_cuenta = 'EMPLEADO';";
			$resultado3 = pg_query($conexion, $query3);
			$conjunto3 = pg_fetch_row($resultado3);

			$query5 = "INSERT INTO EMPLEADO( id_empleado, id_agencia, nombre, apellido_paterno, apellido_materno, tipo_empleado, id_cuenta ) VALUES( DEFAULT, '$idAgencia', '$nombre', '$apellidoPaterno', '$apellidoMaterno', '$tipo', '$conjunto3[0]' );";
			$resultado5 = pg_query($conexion, $query5);

			header( "location:../vistas/administrador.php" );
		}else{
			echo "la cuenta ya existe";
		}

		
	}else{
		echo "no se conecto";
	}


?>