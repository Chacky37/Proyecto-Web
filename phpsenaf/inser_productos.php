<?php   
 require_once('conexion.php');

    if (isset($_POST['guardar'])) {

        
        $descripcion = $_POST['desc'];


        $name_array = $_FILES['image']['name'];
        $tmp_name_array = $_FILES['image']['tmp_name'];
        $type_array = $_FILES['image']['type'];
        $size_array = $_FILES['image']['size'];
        $error_array = $_FILES['image']['error'];

        $directorio = 'img/';

        $imagenpro = $directorio . basename($name_array);

        $imgpreparacion =substr($imagenpro,6);
        echo $imagenpro;
        echo $imgpreparacion;

        // echo $imgpreparacion;
        // echo $imagenpro;
    
        $extension = strtolower(pathinfo($imagenpro, PATHINFO_EXTENSION));
        
    
        // valida que es imagen
        $validarimagen = getimagesize($tmp_name_array);
    
        //var_dump($tamaño);
    
        if($validarimagen != false){
    
            //validando tamaño del archivo
            $tamaño = $size_array;
     
            if($tamaño > 500000){
                echo "<script> alert('El archivo tiene que ser menor a 500kb'); </script>";
            }else{
    
                //validar tipo de imagen
                if($extension == "jpg" || $extension == "jpeg"){
                    // se validó el archivo correctamente
                   for ($i=0; $i < 1; $i++) { 
                       # code...
                       if(move_uploaded_file($tmp_name_array[$i], $directorio . basename($name_array[$i]))){
                           echo " <script> alert('El archivo se subió correctamente'); </script>";
                       }else{
                           echo " <script> alert('Hubo un error en la subida del archivo'); </script> ";
                       }
                   } 
                }else{
                    echo " <script> alert('Solo se admiten archivos jpg/jpeg'); </script>";
                }
            }
        }else{
            echo " <script> alert('El documento no es una imagen'); </script> ";
        }


        $insertarproductos ="INSERT INTO productos(descripcion, image1, image2, image3, image4, image5)
        VALUES('$descripcion','$name_array[0]','$name_array[1]','$name_array[2]','$name_array[3]','$name_array[4]')";

        mysqli_query($conexion, $insertarproductos) or die("no se inserto carta");
        #print_r($insertar);
        #header("location: ../../carta.php");
        echo "<script> window.location='productos.php'; </script>";


        
        # code...
    }
?>
