<?php  
require_once ("../modelos/carga.php");

if($conexion = obtenerConexion()){
	$id = $_POST['id_cliente'];

	$query = "SELECT id_cuenta, id_direccion FROM cliente WHERE id_cliente = '$id';";
	$resultado = pg_query($conexion, $query);
	$conjunto = pg_fetch_row($resultado);

	$cuenta = $conjunto[0];
	$direccion = $conjunto[1];

	$query2 = "DELETE FROM cliente WHERE id_cliente = '$id';";
	$resultado2 = pg_query($conexion, $query2);

	$query3 = "DELETE FROM cuenta WHERE id_cuenta = '$cuenta';";
	$resultado2 = pg_query($conexion, $query2);

	$query3 = "DELETE FROM direccion WHERE id_direccion = '$direccion';";
	$resultado2 = pg_query($conexion, $query2);

	header("Location: ../vistas/administrador.php");

}else{
	echo "no se conecto";
}
?>