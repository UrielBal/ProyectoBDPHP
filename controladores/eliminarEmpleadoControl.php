<?php  
require_once ("../modelos/carga.php");

if($conexion = obtenerConexion()){
	$id = $_POST['id_empleado'];

	$query = "SELECT id_cuenta FROM empleado WHERE id_empleado = '$id';";
	$resultado = pg_query($conexion, $query);
	$conjunto = pg_fetch_row($resultado);

	$cuenta = $conjunto[0];

	$query2 = "DELETE FROM empleado WHERE id_empleado = '$id';";
	$resultado2 = pg_query($conexion, $query2);

	$query3 = "DELETE FROM cuenta WHERE id_cuenta = '$cuenta';";
	$resultado2 = pg_query($conexion, $query2);

	header("Location: ../vistas/administrador.php");
}else{
	echo "no se conecto";
}
?>