<?php  
require_once ("../modelos/carga.php");

$fax = $_POST['fax'];
$ciudad = $_POST['ciudad'];
$colonia = $_POST['colonia'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$zona = $_POST['zona'];
$idTitular = $_POST['id_titular'];
$telefono = $_POST['telefono'];

if($conexion = obtenerConexion()){
		$query = "SELECT id_zona FROM zona WHERE nombre_zona = '$zona';";
		$resultado = pg_query($conexion, $query);
		$conjunto = pg_fetch_all($resultado);

		if(!$conjunto){
			$query1 = "INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( DEFAULT, '$zona' );";
			$resultado1 = pg_query($conexion, $query1);

			$query2 = "SELECT id_zona from zona where nombre_zona = '$zona';";
			$resultado2 = pg_query($conexion, $query2);			
			$conjunto2 = pg_fetch_row($resultado2);

			$query2 = "INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( DEFAULT, '$ciudad', '$colonia', '$calle', '$numero' );";
			$resultado2 = pg_query($conexion, $query2);

			$query3 = "SELECT id_direccion FROM direccion WHERE ciudad = '$ciudad' and colonia = '$colonia' and calle = '$calle' and numero = '$numero';";
			$resultado3 = pg_query($conexion, $query3);
			$conjunto3 = pg_fetch_row($resultado3);

			$query4 = "INSERT INTO TELEFONO( id_telefono, id_direccion, telefono ) VALUES( DEFAULT, '$conjunto3[0]', '$telefono' );";
			$resultado4 = pg_query($conexion, $query4);

			$query5 = "INSERT INTO AGENCIA( id_agencia, fax, id_direccion, id_titular, id_zona ) VALUES( DEFAULT, '$fax', '$conjunto3[0]', '$idTitular', 'conjunto2[0]' );
";
			$resultado5 = pg_query($conexion, $query5);

			header( "location:../vistas/administrador.php" );
		}else{
			echo "la Zona ya existe";
		}

		
	}else{
		echo "no se conecto";
	}


?>