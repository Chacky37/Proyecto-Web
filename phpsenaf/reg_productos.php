<?php
include("conexion.php");

error_reporting(E_ERROR | E_PARSE);


//aqui van las imagenes (Carpeta o ruta que usaras)
$path = 'img/';
$Extension = array('jpg', 'jpeg');

$descripcion = $_POST['desc'];

//Hacemos un poco de código verificando que se recibieron las imagenes
if(isset($_FILES['image'])){

    //almacenamos las propiedades de las imagenes
    $name_array = $_FILES['image']['name'];
    $tmp_name_array = $_FILES['image']['tmp_name'];
    $type_array = $_FILES['image']['type'];
    $size_array = $_FILES['image']['size'];
    $error_array = $_FILES['image']['error'];
    $imageType= array();
    for ($i=0; $i <5 ; $i++) { 
        # code...
        $string = $path.$name_array[$i];
        // $string1 = "$string";
        $imageType[$i] = pathinfo($string, PATHINFO_EXTENSION);
    }

    define( "byte" , 1048576);
    $megabyte = 1048576;

    //recorremos el array de imagenes para subirlas al simultaneo
    if ( ($megabyte>$size_array[0])&&($megabyte>$size_array[1])&&($megabyte>$size_array[2])&&($megabyte>$size_array[3])&&($megabyte>$size_array[4]) ) {

        if ( in_array($imageType[0], $Extension) && in_array($imageType[1], $Extension) && in_array($imageType[2], $Extension) && in_array($imageType[3], $Extension) && in_array($imageType[4], $Extension)   ){
            # code...
            for($i = 0; $i < 5 ; $i++){
                move_uploaded_file($tmp_name_array[$i], "img/".$name_array[$i]);
                    //guardamos en la base de datos el nombre  
            }

            $act = "INSERT INTO productos (descripcion,image1,image2,image3,image4,image5) values ('$descripcion','$name_array[0]','$name_array[1]','$name_array[2]','$name_array[3]','$name_array[4]')";
            mysqli_query($conexion, $act) or die("no se inserto productos");
            // echo "<script> window.location='productos.php'; </script>";

        }else {
            echo "<script> alert('El archivo tiene que ser: jpg, jpeg y png '); </script>";
            print_r($imageType);
        }

    }else{
        echo "<script> alert('El archivo tiene que ser menor a 1mb'); </script>";
        var_dump($size_array);
    } 

    // echo "<script> window.location='productos.php'; </script>";

}
 
?>
