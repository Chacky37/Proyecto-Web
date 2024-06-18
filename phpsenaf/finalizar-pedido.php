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
  <link rel="stylesheet" href ="css/bootstrap.min.css">

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navcolor navbar-light ">
    <div class="container">
      <a href="" class="navbar-brand">
        <img src="cm.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" onclick="window.location='productos.php';">
        <span class="brand-text font-weight-light" >Natura</span>
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
            <h1 class="m-0">Datos Personales</h1>
          </div>
          <br>
         
         
         <br>
         <div class="col-xs-12">
           <hr>
            <form id="formulario" method="post" action="registrar.php"  style="display:block;" enctype="multipart/form-data" >
              <div class="form-group">  
                <label for="codigo">Nombre:</label>
                <input class="form-control" name="persona" required type="text" id="nombre" placeholder="nombre">
              </div>
              <div class="form-group">
                <label for="descripcion">Telefono:</label>
                <input class="form-control" name="telefono" required type="number" id="telefono" placeholder="telefono">
              </div>
              <div class="form-group">  
                <label for="codigo">Direccion:</label>
                <textarea name="dirreccion" id="" cols="0" class="form-control"></textarea>
                
              </div>
              
                <br><br>
                <div class="row">
                  <button name="guardar" type="submit" class="btn btn-success m-2">Guardar</button>
                  <button type="reset" class="btn btn-danger m-2" onclick="abrirformulario('cerrar')">Cancelar</button>
                </div>
            </form>
            <hr>
         </div>
         <br>        
         </div>
        
          <br>
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
    <strong>Copyright &copy; 2022 <a href="#">Centro Medico</a>.</strong> derechos reservados
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
        document.getElementById('formulario').style.display = "block" ;
        
      }else if(dato="cerrar"){
      document.getElementById('formulario').style.display = "none" ;

    }
        
    
}

function eliminar(clieid) {
    var mensaje = confirm("¿ esta seguro que desea eliminar el cliente ?");

    if (mensaje==true ) {
        window.location = "eliminar.php?id=" + clieid ;
        
        
    }

    
}


</script>

</body>
</html>
