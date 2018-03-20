<?php  
session_start();
$id = $_SESSION["id_cuenta"];
$_SESSION["usuario"];
$_SESSION["password"];
$_SESSION["tipo_usuario"];

if($_SESSION["tipo_usuario"] == 'CLIENTE'){
  header("Location: cliente.php");
}
if($_SESSION["tipo_usuario"] == 'EMPLEADO'){
  header("Location: empleado.php");
}

require_once ("../modelos/carga.php");

if ($conexion = obtenerConexion()) {
  $query2 = "SELECT * FROM administrador WHERE id_cuenta = '$id';";
  $resultado2 = pg_query($conexion, $query2);
  $conjunto2 = pg_fetch_row($resultado2);

  include("../modelos/Administrador.php");

  $administrador = new Administrador($conjunto2[0], $conjunto2[1], $conjunto2[2], $conjunto2[3], $conjunto2[4]);
}
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="icon" href="media/icon.jpeg" type="image/jpeg" sizes="16x16"> <!--Se pone icono en la pestaña de la pagina-->
        <title>TechnoHouse</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
      <header>
        <!--Barra de navegacion-->
        <nav class="navbar navbar-static-top navbar-inverse" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <!--Barra de navegacion responsive-->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuDesplegable">
                <span class="sr-only">Desplegar / Ocultar Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!--opciones de la barra de navegacion-->
              <a href="administrador.php" class="navbar-brand">Administrador: <?php echo $administrador->getNombre() ." " ;echo $administrador->getApellidoPaterno() ." ";echo $administrador->getApellidoMaterno(); ?></a>
            </div>
            <div class="collapse navbar-collapse" id="menuDesplegable">
              <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Alta<span class="caret"></span></a>
                     <!--Menu desplegable-->
                     <ul class="dropdown-menu" role="menu">
                      <li><a href="#" id="altaCliente">Cliente</a></li>
                      <li><a href="#" id="altaEmpleado">Empleado</a></li>
                      <li><a href="#" id="altaSucursal">Sucursales</a></li>
                     </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Eliminiar<span class="caret"></span></a>
                     <!--Menu desplegable-->
                     <ul class="dropdown-menu" role="menu">
                      <li><a href="#" id="eliminarEmpleado">Empleado</a></li>
                      <li><a href="#" id="eliminarCliente">Cliente</a></li>
                     </ul>
                </li>
                <li><a href="../controladores/cerrarSesion.php">Cerrar Sesion</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <section class="container main" style="background-origin: url()">
        <div class="row">
          <section id="contenido1" class="col-md-12 posts jumbotron" style="background-color: #EBE8E8"><!--Se agrega color de Fondo-->
            <form action="../controladores/eliminarEmpleadoControl.php" method="POST">
              <div class="row">
                <div class="col-md-8 text-center">
                  <input type="text" name="id_empleado" placeholder="ID EMPLEADO" class="text-center" required>
                </div>
                <div class="col-md-4 text-center">
                  <button class="btn btn-danger">ELIMINAR</button>
                </div>
              </div>
            </form>
            <br>
            <form action="../controladores/eliminarClienteControl.php" method="POST">
              <div class="row">
                <div class="col-md-8 text-center">
                  <input type="text" name="id_cliente" placeholder="ID CLIENTE" class="text-center" required>
                </div>
                <div class="col-md-4 text-center">
                  <button class="btn btn-danger">ELIMINAR</button>
                </div>
              </div>
            </form>
          </section>
        </div>
        <div class="row">
          <section id="contenido" class="col-md-12 posts jumbotron" style="background-color: #EBE8E8"><!--Se agrega color de Fondo-->
          </section>
        </div>
      </section>
    </div> 
        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script>
        $(document).ready(function(){
          $('#altaCliente').click(function(){
            $("#contenido").load("altaCliente.html");
          });

          $('#altaEmpleado').click(function(){
            $("#contenido").load("altaEmpleado.html");
          });

          $('#altaSucursal').click(function(){
            $("#contenido").load("altaSucursal.html");
          });

          $('#eliminarCliente').click(function(){
            $("#contenido").load("eliminarCliente.php");
          });

          $('#eliminarEmpleado').click(function(){
            $("#contenido").load("eliminarEmpleado.php");
          });
        });
      </script>
    </body>
</html>