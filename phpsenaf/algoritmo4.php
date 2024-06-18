<!DOCTYPE html>
<html lang="es">
<head>   
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tabla de amortizacion</title>
  <link rel="stylesheet" href ="bootstrap.min.css">


</head>
<body style="background: #f4f6f9;" class="hold-transition sidebar-mini layout-fixed">
<div  class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div  class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="container m-2">
    <div  style="background-color: #8ae1a9; width: 600px; border-radius: 5px;" class=" card-body border elevation-3">
      
      <h1 class=""> FORMULARIO 4 </h1>
      <form action="insertar.php?orden=1" method="post">
        <div class="form-group row mb-3">
          <label  class="col-form-label col-sm-3" for="">Nombre : </label>
          <input type="text"  name="nombrec" class="form-control col-sm-6"  placeholder="nombre" required>
        </div>
        <div class="form-group row mb-3">
          <label  class="col-form-label col-sm-3 "for=""> Documento :</label>
          <input type="text"  name="documento" class="form-control col-sm-6" placeholder="cc" required>
        </div>
        <div class="form-group row mb-3">
          <label  class="col-form-label col-sm-3 "for="">Tasa De Credito:</label>
          <input type="text" name="credito" class="form-control col-sm-6" title="" placeholder="cantidad" required>
        </div>
        <div class="form-group row mb-3">
          <label  class="col-form-label col-sm-3 "for=""> Tasa De Interes :</label>
          <input type="text"  name="intereses" class="form-control col-sm-6" placeholder="tasa de interes mensual" required>
        </div>
        <div class="form-group row mb-3">
          <label  class="col-form-label col-sm-3 "for=""> Plazo :</label>
          <input type="text" name="plazo" class="form-control col-sm-6" title="" placeholder="plazo en meses" required>
        </div>
          
        <button type="submit" name="calcular" class="btn btn-primary ">CALCULAR</button>
      </form>
    </div>
    <br>
    <pre>
        <?php
        echo '<br>';
        print_r($_SESSION['cuotas']);
        echo '<br>';
        print_r($creditos);
        echo '<br>';
        print_r($intereses);
        echo '<br>';
        print_r($plazos);
        echo '<br>';

        // print_r($creditos);
        // echo '<br>';

        // print_r($plazos);
        // echo '<br>';

        // print_r($intereses);
        // echo '<br>';



        ?>
    </pre>
 <hr>
    <div class="table-reponsive">
    <table class="table">
        <thead class="table-light">
            <tr>
                <th>N° de cuota</th>
                <th>Saldo anterior</th>
                <th>Couta fija</th>
                <th>Abono de interes</th>
                <th>Abono capital</th>
                <th>Nuevo saldo</th>

            </tr>
        </thead>
        <tbody>
        <?php
            $largo = count($cuotas); ;
            for ($contador=0; $contador < $largo ; $contador++) { 
            
            ?>
    
            <tr>
                <td><?php  echo $contador ; ?></td>
                <td><?php echo $_SESSION['cuotas'][$contador]; ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
        <?php } ?>   
        </tbody>
    </table>
    </div>

</div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
