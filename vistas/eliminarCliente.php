<?php  
	require_once ("../modelos/carga.php");
	
	if($conexion = obtenerConexion()){
		$query = "
		SELECT *
		FROM cliente;
		";
		
		$resultado = pg_query($conexion, $query);
		$conjunto = pg_fetch_all($resultado);
	}else{
		echo "no se conecto";
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
	<h3 class="text-center">Clientes</h3>		
  </div>
  <div class="row">
  	<div class="col-md-12 table-responsive">
	  <table class="table table-striped">
	    <thead>
	      <tr>
	        <th>NUMERO</th>
	        <th>ID CLIENTE</th>
			<th>ID VENDEDOR</th>
			<th>NOMBRE</th>
			<th>APELLIDO PATERNO</th>
			<th>APELLIDO MATERNO</th>
			<th>CORREO</th>
			<th>ID CUENTA</th>
			<th>ID DIRECCION</th>
	      </tr>
	    </thead>
	    <tbody>
	      <?php  
			if($conjunto != null){
				foreach ($conjunto as $key => $arreglo) {
				$num = $key + 1;
				echo "<tr>";
				echo "<td>".$num."</td>";
					foreach ($arreglo as $key => $value) {
						echo "<td>";
						echo $value;
						echo "</td>";
					}
				echo "</tr>";
				}
			}
	      ?>
	    </tbody>
	  </table>
  	</div>
  </div>
</div>
</body>
</html>