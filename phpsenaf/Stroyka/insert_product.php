<?php   
echo require_once('conexion.php');
$con = mysqli_connect($host, $user, $pass, $db);

    if (isset($_POST['publicar'])) {

        $nombre =   $_POST['nombre'];
        //$descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $precio = number_format($precio, 0, ',', '.');
        $sku = $_POST['sku'];
        $disponibilidad = $_POST['stock'];
        //$envio=$_POST['status'];
        $etiqueta=$_POST['etiqueta'];
        $seccion=$_POST['seccion'];
        $categoria=$_POST['categoria'];
        $talla=$_POST['talla'];

        $path = 'img-product/';
        $Extension = array('jpg', 'jpeg', 'png','PNG','JPG','JPEG');


        if(isset($_FILES['image'])){

            //almacenamos las propiedades de las imagenes
            $name_array = $_FILES['image']['name'];
            $tmp_name_array = $_FILES['image']['tmp_name'];
            $type_array = $_FILES['image']['type'];
            $size_array = $_FILES['image']['size'];
            $error_array = $_FILES['image']['error'];
            $imageType= array();
            for ($i=0; $i <4 ; $i++) { 
                # code...
                $string = $path.$name_array[$i];
                // $string1 = "$string";
                $imageType[$i] = pathinfo($string, PATHINFO_EXTENSION);
            }
        
            define( "byte" , 1048576);
            $megabyte = 1048576;
        
            //recorremos el array de imagenes para subirlas al simultaneo
            if ( ($megabyte>$size_array[0])&&($megabyte>$size_array[1])&&($megabyte>$size_array[2])&&($megabyte>$size_array[3]) ) {
        
                if ( in_array($imageType[0], $Extension) && in_array($imageType[1], $Extension) && in_array($imageType[2], $Extension) && in_array($imageType[3], $Extension)  ){
                    # code...
                    for($i = 0; $i < 4 ; $i++){
                        move_uploaded_file($tmp_name_array[$i], "img-product/".$name_array[$i]);
                            //guardamos en la base de datos el nombre  
                    }

                    $insertarproducto ="INSERT INTO productos(nombre, precio, sku, disponibilidad, talla, etiqueta, seccion, categoria, imagen1, imagen2, imagen3, imagen4 )
                    VALUES('$nombre', '$precio', '$sku', '$disponibilidad', '$talla', '$etiqueta', '$seccion', '$categoria', '$name_array[0]', '$name_array[1]', '$name_array[2]', '$name_array[3]')";
            
                    $res = mysqli_query($conexion, $insertarproducto);
                    #print_r($insertar);
        
                    // $act = "INSERT INTO productos (descripcion,image1,image2,image3,image4,image5) values ('$descripcion','$name_array[0]','$name_array[1]','$name_array[2]','$name_array[3]')";
                    // mysqli_query($conexion, $act) or die("no se inserto productos");
                    // echo "<script> window.location='productos.php'; </script>";
        
                }else {
                    //echo "<script> alert('El archivo tiene que ser: jpg, jpeg y png '); </script>";
                    header("location: app-product.php?modulo=productos&notificacion=¡Error!..... la imagenes tienen que ser : jpg, jpeg, png");
                    //print_r($imageType);
                }
        
            }else{
                header("location: app-product.php?modulo=productos&notificacion=¡Error!..... las imagenes tienen que ser menor a un tamaño de 1MB");
                //echo "<script> alert('El archivo tiene que ser menor a 1mb'); </script>";
                //var_dump($size_array);
            } 
        
            // echo "<script> window.location='productos.php'; </script>";
        
        }
        

        // $insertarproducto ="INSERT INTO productos(nombre, precio, descripcion, sku, disponibilidad, envio, talla, etiqueta, seccion, categoria, especificacion1, especificacion2, imagen1, imagen2, imagen3, imagen4 )
        // VALUES('$nombre', '$precio', '$descripcion', '$sku', '$disponibilidad', '$envio', '$talla', '$etiqueta', '$seccion', '$categoria', '$especificacion1', '$especificacion2', '$name_array[0]','$name_array[1]','$name_array[2]','$name_array[3]')";

        // $res = mysqli_query($conexion, $insertarproducto);
        #print_r($insertar);
        
        
        
        if ($res) {
            header("location: app-product.php?modulo=productos&mensaje=¡Producto registrado con exito!");
           // echo '<meta http-equiv="refresh" content="0; url=app-product.php?modulo=productos&mensaje=¡Producto registrado con exito!" /> ';
        }
        # code...
    }

?>