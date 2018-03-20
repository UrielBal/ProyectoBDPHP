<?php  
	function obtenerConexion(){
		$host = "localhost";
		$usuario = "postgres";
		$db = "inmobiliaria";
		$password = "312069625-1";
		$puerto = "5432";
		$conexion = pg_connect("host=$host port=$puerto user=$usuario password=$password dbname=$db") or die("No se puede conectar a la base". pg_last_error());
		return $conexion;
	}
?>