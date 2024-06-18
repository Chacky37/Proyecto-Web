<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href ="bootstrap.min.css">


  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <title>Algoritmo 1</title>
</head>
<body>
<div class="container m-2">
    <div  style="background-color: #42d6e5; width: 600px; border-radius: 5px;" class=" card-body border elevation-3">
      
      <h1 class=""> FORMULARIO 1</h1>
      <form action="algoritmo1.php" method="post">
        <div class="form-group row mb-3">
          <label  class="col-form-label col-sm-3" for="">parcial uno : </label>
          <input type="text"  name="parcial1" class="form-control col-sm-6" placeholder="Nota del parcial 1" required>
        </div>
        <div class="form-group row mb-3">
          <label  class="col-form-label col-sm-3 "for="">parcial dos :</label>
          <input type="text"  name="parcial2" class="form-control col-sm-6" placeholder="nota del parcial 2" required>
        </div>
        <div class="form-group row mb-3">
          <label  class="col-form-label col-sm-3 "for="">parcial tres :</label>
          <input type="text" name="parcial3" class="form-control col-sm-6" placeholder="nota del parcial 3" required>
        </div>
        <div class="form-group row mb-3">
          <label  class="col-form-label col-sm-3 "for="">Examen final :</label>
          <input type="text"  name="efinal" class="form-control col-sm-6" placeholder=" nota examen final" required>
        </div>
        <div class="form-group row mb-3">
          <label  class="col-form-label col-sm-3 "for="">Trabajo final :</label>
          <input type="text"  name="tfinal" class="form-control col-sm-6" placeholder=" nota del trabajo final" required>
        </div>
          
        <button type="submit" name="enviar" class="btn btn-success ">CALCULAR</button>
      </form>

      <?php
        if (isset($_POST['enviar'])) {
            # code...
        
            $parcial1 = $_POST['parcial1'];
            $parcial2 = $_POST['parcial2'];
            $parcial3 = $_POST['parcial3'];
            $efinal = $_POST['efinal'];
            $tfinal = $_POST['tfinal'];

            $sumaparcial = ($parcial1 + $parcial2 + $parcial3) ;
            $promedioparcial = ($parcial1 + $parcial2 + $parcial3) / 3 ;
            // echo $sumaparcial;
            // echo $promedioparcial ; 
            $nota1 = $promedioparcial * 0.35 ;
            $nota2 = $efinal * 0.35 ;
            $nota3 = $tfinal * 0.30 ;

            $calificacion = ($nota1 + $nota2 + $nota3 );

            if ($calificacion >= 3) {
                # code...
                echo 'su nota final es '.round($calificacion, 2).' estado: Aprobado' ;
            }else {
                # code...
                echo 'su nota final es'.round($calificacion,2).'estado: desaprobado' ;
            }

        }    

      ?>
    </div>

</div>
</body>
</html>