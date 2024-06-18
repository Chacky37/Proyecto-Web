<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href ="bootstrap.min.css">


  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <title>Algoritmo 2</title>
</head>
<body>
<div class="container m-2">
    <div  style="background-color:#f54545; width: 600px; border-radius: 5px;" class=" card-body border elevation-3">
      
      <h1 class=""> FORMULARIO 2</h1>
      <form action="algoritmo2.php" method="post">
        <div class="form-group row mb-3">
          <label  class="col-form-label col-sm-3" for="">Nombre Del Vendedor : </label>
          <input type="text"  name="nombrev" class="form-control col-sm-6"  placeholder="nombre" required>
        </div>
        <div class="form-group row mb-3">
          <label  class="col-form-label col-sm-3 "for=""> Cantidad De Auto Vendidos :</label>
          <input type="number"  name="cantidad" class="form-control col-sm-6" placeholder="cantidad" required>
        </div>
        <div class="form-group row mb-3">
          <label  class="col-form-label col-sm-3 "for=""> Precio Total De Auto Vendidos:</label>
          <input type="text" name="precio" class="form-control col-sm-6" title="NO ingresar puntos('.') ni comas(',')" placeholder="precio ($)" required>
        </div>
          
        <button type="submit" name="calcular" class="btn btn-secondary ">CALCULAR</button>
      </form>

      <?php
        if (isset($_POST['calcular'])) {
            # code...
        
            $nombre = $_POST['nombrev'];
            $cantidad = $_POST['cantidad'];
            $preciototalventa = $_POST['precio'];

            $salario = 737000 ;
            $comision = $cantidad * 50000 ;
            $extra = $preciototalventa * 0.05 ;


            $salariofinal = ($salario + $comision + $extra);
            echo 'Vendedor '.$nombre.' su salario final del mes es : $ '.number_format($salariofinal,0,'.','.');


            // if ($salariofinal = true ) {
            //     # code...
            //     echo 'Vendedor '.$nombre.' su salario final del mes es :'.$salariofinal;
            // }else {
            //     # code...
            //     echo 'por favor ingrese los datos del formulario';
            // }

        }    

      ?>
    </div>

</div>





</body>
</html>