<?php  
require_once ("../modelos/carga.php");

$inmueble = $_POST['id_inmueble'];
$cliente = $_POST['id_cliente'];

if($conexion = obtenerConexion()){
	$query = "UPDATE inmueble SET id_cliente = '$cliente' where id_inmueble = '$inmueble';";
	$resultado = pg_query($conexion, $query);

	header( "location:../vistas/empleado.php" );
}else{
	echo "no se conecto";
}


?>