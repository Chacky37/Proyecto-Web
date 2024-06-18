
<?php 
 session_start();
 if (empty($_SESSION['Carrito'])==false) {
     # code...
     $carrito =$_SESSION['carrito'];
 }

 if (isset($_SESSION['carrito'])) {
    $carrito =$_SESSION['carrito'];
     # code...
 }

 // Supongamos que tienes el id del producto que quieres eliminar


?> 
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuarios</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <link rel="stylesheet" href="css/estilos2.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navcolor navbar-light ">
      <div class="container">
        <a href="" class="navbar-brand">
          <img src="cm.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" onclick="window.location='productos.php';">
          <span class="brand-text font-weight-light">TerraModa</span>
        </a>


        <!--Eli -->

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <!-- Messages Dropdown Menu -->
          <!-- Notifications Dropdown Menu -->

        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="col-sm-6">
            <h1 class="m-0">Ralizar pedido</h1>
          </div>
          <br>
          <div>
            <button class="btn btn-primary " onclick="abrirformulario('abrir')">Nuevo Producto
              <i class="fa fa-plus"></i>
            </button>
          </div>
          <br>
          <div class="col-xs-12">
            <hr>
            <form id="formulario" method="post" action="agregar-carrito.php" style="display:none;" enctype="multipart/form-data">
              <div class="form-group">
                <label for="codigo">Producto:</label>
                <input class="form-control" name="id_producto" required type="text" id="producto" placeholder="codigo producto">
              </div>
              <div class="form-group">
                <label for="descripcion">Cantidad:</label>
                <input class="form-control" name="cantidad" required type="number" id="cantidad" placeholder="cantidad">
              </div>
              <div class="form-group">
                <label for="codigo">Talla:</label>
                <!-- <div class="col-sm-8"> -->
                <select name="talla" class="form-select form-control">
                  <option value="" selected>seleccione una opcion....</option>
                  <optgroup label="Tallas">
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <!-- <option value="invitado">Invitado</option> -->
                  </optgroup>
                </select>
                <!-- </div> -->
              </div>

              <br><br>
              <div class="row">
                <button name="guardar" type="submit" class="btn btn-success m-2">Agregar</button>
                <button type="reset" class="btn btn-danger m-2" onclick="abrirformulario('cerrar')">Cancelar</button>
              </div>
            </form>
            <hr>
          </div>
          <br>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>NOMBRE</th>
                <th>CANTIDAD</th>
                <th>PRECIO UN</th>
                <th>SUBTOTAL</th>
                <th>ELIMINAR</th>
              </tr>
            </thead>
            <tbody>
            <?php
                       
                if(isset($_SESSION['carrito'])){
                $subtotal=0;
                for($i=0;$i<=count($carrito)-1;$i ++){
                    if(isset($carrito[$i])&&($carrito[$i]!=NULL)){
                  
            ?>


              <tr>
                <td><?php echo $carrito[$i]['nombre'];?></td>
                <td><?php echo $carrito[$i]['cantidad'];?></td>
                <td><?php echo $carrito[$i]['precio'];?></td>
                <td><?php echo $carrito[$i]['total'];?></td>
                <td>
                  <buttton class="btn btn-danger" onclick="window.location='eliminar-producto-carrito.php?id_producto=<?php echo $carrito[$i]['id']; ?>';"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
              <?php } }}
              ?>
            </tbody>
          </table>
        </div>
        <br>
        <div class="col-sm-6">
          <button name="guardar" type="submit" class="btn btn-success m-2" onclick="window.location='finalizar-pedido.php';">Guardar</button>
          
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  
  
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      sistema de informacion
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2024 <a href="#">TeraModa</a>.</strong> derechos reservados
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="js/demo.js"></script>

  <script src="https://kit.fontawesome.com/475c2ec95c.js" crossorigin="anonymous"></script>
  <script>
    function abrirformulario(dato) {
      if (dato == "abrir") {
        document.getElementById('formulario').style.display = "block";

      } else if (dato = "cerrar") {
        document.getElementById('formulario').style.display = "none";

      }


    }

    function eliminar(clieid) {
      var mensaje = confirm("¿ esta seguro que desea eliminar el cliente ?");

      if (mensaje == true) {
        window.location = "eliminar.php?id=" + clieid;


      }


    }
  </script>

</body>

</html>