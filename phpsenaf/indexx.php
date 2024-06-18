<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Iniciar sesion</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Admin</b>LTE
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia sesión</p>

      <?php
        if(isset($_REQUEST['login'])) {
          session_start();
          $email=$_REQUEST['email']??'';
          $pass=$_REQUEST['pass']??''; 
          include_once "conexion.php";
          $con=mysqli_connect($host,$user,$pass,$db);
          $query="SELECT id,email,nombre from usuarios where email='".$email."' and  pass='".$pass."' ";
          $res=mysqli_query($con,$query);
          $row=mysqli_fetch_assoc($res);
          if ($row) {
            $_SESSION['id']=$row['id'];
            $_SESSION['email']=$row['email'];
            $_SESSION['nombre']=$row['nombre'];
            header("location: tablero.php");
          }else {
            ?>
              <div class="alert alert-danger" role="alert">
                 ¡Error credenciales incorrectas!
              </div>
            <?php
          }

        }
      ?>

      <form method="POST">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block" name="login">Iniciar Sesion</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
