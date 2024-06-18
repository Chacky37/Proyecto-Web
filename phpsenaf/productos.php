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

  <?php # require_once("conexion.php"); ?> 

  <?php
    # a continuacion bloquearemos cualquier intento de ingreso al sistema por la url sin antes haber iniciado sesion
    session_start();

    ?>

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navcolor navbar-light ">
    <div class="container">
      <a href="" class="navbar-brand">
        <img src="cm.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">CENTRO MEDICO</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3 " id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="error404.php" class="nav-link menu">Citas</a>
          </li>
          <li class="nav-item">
            <a href="error404.php" class="nav-link menu">Medicamentos</a>
          </li>
          <li class="nav-item">
            <a href="error404.php" class="nav-link menu ">Consultorio</a>
          </li>
          <li class="nav-item">
            <a href="error404.php" class="nav-link menu ">Pacientes</a>
          </li>
          <li class="nav-item">
            <a href="usuarios.php" class="nav-link menu text-success">Usuarios</a>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <!-- <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form> -->
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link"  href="cerrar_sesion.php" role="button">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> salir
          </a>
        </li>
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
            <h1 class="m-0">Usuarios</h1>
          </div>
          <br>
         <div>
             <button class="btn btn-primary " onclick="abrirformulario('abrir')">Nuevo Usuario
                <i class="fa fa-plus"></i> 
            </button>
         </div>
         <br>
         <div class="col-xs-12">
           <hr>
            <form id="formulario" method="post" action="reg_productos.php"  style="display:none;" enctype="multipart/form-data" >
              <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <input class="form-control" name="desc" required type="text" id="rol" placeholder="descripcion">
              </div>
              <div class="form-group">                  
                  <label for="exampleFormControlFile1">Imagen</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control-file" name="image[]" id="exampleFormControlFile1"  multiple accept="image/png, .jpeg, .jpg" required>
                  </div>
              </div>

              <!-- <div class="custom-file form-group">
                <label for="imagenes">Imagenes:</label>
                <input type="file" name="image[]" class="custom-file-input" id="customFileLang" lang="es" multiple accept="image/png, .jpeg, .jpg">
                <label class="custom-file-label" for="customFileLang"  >Seleccionar Archivo</label>
              </div> -->
              
                <br><br>
                <div class="row">
                  <button name="guardar" type="submit" class="btn btn-success m-2">Guardar</button>
                  <button type="reset" class="btn btn-danger m-2" onclick="abrirformulario('cerrar')">Cancelar</button>
                </div>
            </form>
            <hr>
         </div>
         <br>
         <?php 
              #$consulta_pro ="SELECT * FROM productos ";
              #$resultado_pro = mysqli_query($conexion, $consulta_pro) or die('no se consulto el usuario');
              #while($productos = mysqli_fetch_array($resultado_pro)){
                // foreach($usuarios as $usuario){ 
          ?>

          <div class=" container justify-content-center row">
            <div class="card" style="width: 10rem;">
              <img class="card-img-top" src="img/<?php echo $productos['image1']; ?>" alt="Card image cap">
              <div class="card-body">
                <p class="card-text"><?php echo $productos['descripcion']; ?></p>
              </div>
            </div>
            
            <div class="card" style="width: 10rem;">
              <img class="card-img-top" src="img/<?php echo $productos['image2']; ?>" alt="Card image cap">
              <div class="card-body">
                <p class="card-text"><?php echo $productos['descripcion']; ?></p>
              </div>
            </div>

            <div class="card" style="width: 10rem;">
              <img class="card-img-top" src="img/<?php echo $productos['image3']; ?>" alt="Card image cap">
              <div class="card-body">
                <p class="card-text"><?php echo $productos['descripcion']; ?></p>
              </div>
            </div>
            <div class="card" style="width: 10rem;">
              <img class="card-img-top" src="img/<?php echo $productos['image4']; ?>" alt="Card image cap">
              <div class="card-body">
                <p class="card-text"><?php echo $productos['descripcion']; ?></p>
              </div>
            </div>
            <div class="card" style="width: 10rem;">
              <img class="card-img-top" src="img/<?php echo $productos['image5']; ?>" alt="Card image cap">
              <div class="card-body">
                <p class="card-text"><?php echo $productos['descripcion']; ?></p>
              </div>
            </div>
           
          </div>
          <?php #} ?>  

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
