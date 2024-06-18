<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href ="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">

    <title>inicio de sesion </title>
</head>
<body>
<hgroup>
  <h1>CENTRO MEDICO</h1>
  <h3>iniciar sesion</h3>
</hgroup>
<form action="login.php" method="post">
  <div class="group">
    <input type="text" name="user" placeholder="Usuarios"><span class="highlight"></span><span class="bar"></span>
    <!-- <label>Usuario</label> -->
  </div>
  <div class="group">
    <input name="passw" type="password" placeholder="Contraseña"><span class="highlight"></span><span class="bar"></span>
    <!-- <label>Contraseña</label> -->
  </div>
  <button type="submit" class=" btn btn-block btn-primary" name="ingresar">INGRESAR</button>
</form>
    
<script >
$(window, document, undefined).ready(function() {

$('input').blur(function() {
  var $this = $(this);
  if ($this.val())
    $this.addClass('used');
  else
    $this.removeClass('used');
});

var $ripples = $('.ripples');

$ripples.on('click.Ripples', function(e) {

  var $this = $(this);
  var $offset = $this.parent().offset();
  var $circle = $this.find('.ripplesCircle');

  var x = e.pageX - $offset.left;
  var y = e.pageY - $offset.top;

  $circle.css({
    top: y + 'px',
    left: x + 'px'
  });

  $this.addClass('is-active');

});

$ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function(e) {
  $(this).removeClass('is-active');
});

});


</script>

</body>
</html>