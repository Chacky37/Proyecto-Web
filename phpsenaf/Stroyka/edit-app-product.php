<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">
<?php
    include_once "conexion.php";
    $con = mysqli_connect($host, $user, $pass, $db);
    session_start();
    if ( isset($_REQUEST['publicar']) ) {    

    $nombre= mysqli_real_escape_string($con,$_REQUEST['nombre']??'') ;
    $precio= mysqli_real_escape_string($con,$_REQUEST['precio']??'') ;
    $id= mysqli_real_escape_string($con,$_REQUEST['id']??'') ;

    $query = "UPDATE productos SET
        nombre='" . $nombre . "',precio='" . $precio . "'
        where id='".$id."';
        ";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=app-products-list.php?mensaje=¡Producto '.$nombre.' editado con exito!" /> ';
    }
    else {
?>
    <div class="alert alert-danger" role="alert">
        Error al crear el producto <?php echo mysqli_error($con); ?>
    </div>
<?php
    }
}

    $id= mysqli_real_escape_string($con,$_REQUEST['id']??'');
    $query="SELECT id,nombre,precio from productos where id='".$id."'; ";
    $res=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($res);
?>

<head>
    <meta charSet="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <title>Admin - Sport Running</title><!-- icon -->
    <link rel="icon" type="image/png" href="images/favicon.png" /><!-- fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
    <!-- css -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.ltr.css" />
    <link rel="stylesheet" href="vendor/highlight.js/styles/github.css" />
    <link rel="stylesheet" href="vendor/simplebar/simplebar.min.css" />
    <link rel="stylesheet" href="vendor/quill/quill.snow.css" />
    <link rel="stylesheet" href="vendor/air-datepicker/css/datepicker.min.css" />
    <link rel="stylesheet" href="vendor/select2/css/select2.min.css" />
    <link rel="stylesheet" href="vendor/datatables/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="vendor/fullcalendar/main.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-97489509-8');
    </script>
</head>

<body>
    <!-- sa-app -->
    <div class="sa-app sa-app--desktop-sidebar-shown sa-app--mobile-sidebar-hidden sa-app--toolbar-fixed">
        <!-- sa-app__sidebar -->
        <div class="sa-app__sidebar">
            <?php include "./layouts/sidebar.php"; ?>
            <div class="sa-app__sidebar-shadow"></div>
            <div class="sa-app__sidebar-backdrop" data-sa-close-sidebar=""></div>
        </div><!-- sa-app__sidebar / end -->
        <!-- sa-app__content -->
        <div class="sa-app__content">
            <!-- sa-app__toolbar -->
            <?php include "./layouts/tolbar.php"; ?>
            <!-- sa-app__toolbar / end -->
                
            <!-- sa-app__body -->
            <div id="top" class="sa-app__body">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container">
                        <form action="edit-app-product.php" method="post">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <!-- <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="app-products-list.html">Products</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                                        </ol>
                                    </nav> -->
                                    <h1 class="h3 m-0">Editar Producto</h1>
                                </div>
                                <div class="col-auto d-flex">
                                    <!-- <a href="#" class="btn btn-secondary me-3">Duplicate</a> -->
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>" >
                                    <button type="submit" class="btn btn-primary" name="publicar">Guardar cambios</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__main">
                                    <div class="card">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Información básica</h2>
                                            </div>
                                            <div class="mb-4">
                                                <label for="form-product/name" class="form-label">Nombre del producto</label>
                                                <input type="text" class="form-control" value="<?php echo $row['nombre'];?>" name="nombre" placeholder="Ingrese el nombre del producto" />
                                            </div>
                                            <!-- <div class="mb-4"><label for="form-product/slug" class="form-label">Slug</label>
                                                <div class="input-group input-group--sa-slug">
                                                    <span class="input-group-text" id="form-product/slug-addon">https://example.com/products/</span>
                                                    <input type="text" class="form-control" id="form-product/slug" aria-describedby="form-product/slug-addon form-product/slug-help"
                                                    value="brandix-screwdriver-screw150" />
                                                </div>
                                                <div id="form-product/slug-help" class="form-text">Unique human-readable
                                                    product identifier. No longer than 255 characters.
                                                </div>
                                            </div> -->
                                            <div class="mb-4"><label for="form-product/description" class="form-label">Descripción</label>
                                                <textarea id="form-product/description" class="sa-quill-control form-control" rows="8">
                                                    Escribe una descripción que detalle muy bien las cualidades de tu producto.
                                                </textarea>
                                            </div>
                                            <!-- <div>
                                                <label for="form-product/short-description" class="form-label">Short description</label>
                                                <textarea id="form-product/short-description" class="form-control" rows="2"></textarea>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Valor</h2>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="form-product/price" class="form-label">Precio</label>
                                                <div class="col">
                                                    <input type="number" class="form-control" id="form-product/price" name="precio" value="<?php echo $row['precio'] ?>" placeholder="$ 35.000" />
                                                </div>
                                                <!-- <div class="col">
                                                    <label for="form-product/old-price" class="form-label">Old price</label>
                                                    <input type="number" class="form-control" id="form-product/old-price" />
                                                </div> -->
                                            </div>
                                            <!-- <div class="mt-4 mb-n2"><a href="#">Schedule discount</a></div> -->
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Inventario</h2>
                                            </div>
                                            <div class="mb-4"><label for="form-product/sku" class="form-label">SKU</label>
                                                <input type="text" class="form-control" id="form-product/sku" value="SCREW150" />
                                            </div>
                                            <div class="mb-4">
                                                <label>Disponibilidad</label>
                                                <select class="sa-select2 form-select" multiple="">
                                                    <option selected="">En existencia</option>
                                                    <option>Agotado</option>
                                                </select>
                                            </div>
                                            <!-- <div class="mb-4 pt-2">
                                                <label class="form-check">
                                                    <input type="checkbox" class="form-check-input" /><span class="form-check-label">Enablestock management</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label for="form-product/quantity" class="form-label">Stock quantity</label>
                                                <input type="number" class="form-control" id="form-product/quantity" value="18" />
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Imagenes</h2>
                                            </div>
                                        </div>
                                        <div class="mt-n5">
                                            <div class="sa-divider"></div>
                                            <div class="table-responsive">
                                                <table class="sa-table">
                                                    <thead>
                                                        <tr>
                                                            <th class="w-min">Imagen</th>
                                                            <th class="min-w-10x">texto alternativo</th>
                                                            <th class="w-min">Orden</th>
                                                            <th class="w-min"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                                    <img src="images/products/product-16-1-40x40.jpg" width="40" height="40" alt="" />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control form-control-sm" />
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control form-control-sm w-4x" value="0" />
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sa-muted btn-sm mx-n3" type="button" aria-label="Delete image" data-bs-toggle="tooltip" data-bs-placement="right"
                                                                    title="Borrar imagen">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="currentColor">
                                                                        <path
                                                                            d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z">
                                                                        </path>
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                                    <img src="images/products/product-16-2-40x40.jpg" width="40" height="40" alt="" />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control form-control-sm" />
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control form-control-sm w-4x" value="1" />
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sa-muted btn-sm mx-n3" type="button" aria-label="Delete image" data-bs-toggle="tooltip" data-bs-placement="right"
                                                                    title="Borrar imagen">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="currentColor">
                                                                        <path
                                                                            d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z">
                                                                        </path>
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                                    <img src="images/products/product-16-3-40x40.jpg" width="40" height="40" alt="" />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control form-control-sm" />
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control form-control-sm w-4x" value="2" />
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sa-muted btn-sm mx-n3" type="button" aria-label="Delete image" data-bs-toggle="tooltip" data-bs-placement="right"
                                                                    title="Delete image">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="currentColor">
                                                                        <path
                                                                            d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z">
                                                                        </path>
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                                    <img src="images/products/product-16-4-40x40.jpg" width="40" height="40" alt="" />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control form-control-sm" />
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control form-control-sm w-4x" value="3" />
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sa-muted btn-sm mx-n3" type="button" aria-label="Delete image" data-bs-toggle="tooltip" data-bs-placement="right"
                                                                    title="Borrar imagen">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="currentColor">
                                                                        <path
                                                                            d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z">
                                                                        </path>
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="sa-divider"></div>
                                            <div class="px-5 py-4 my-2">
                                                <input class="form-control" type="file" id="formFileMultiple" multiple>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Especificaciones</h2>
                                            </div>
                                            <div class="mb-4">
                                                <div class="row g-2">
                                                    <div class="col-md-6">
                                                        <input class="form-control" type="text" name="" id="" placeholder="Especificación 1">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input class="form-control" type="text" name="" id="" placeholder="Especificación 2">
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-md-6">
                                                            <input class="form-control" type="text" name="" id="" placeholder="Especificación 3">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input class="form-control" type="text" name="" id="" placeholder="Especificación 4">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Search engine optimization</h2>
                                                <div class="mt-3 text-muted">Provide information that will help improve
                                                    the snippet and bring your product to the top of search engines.
                                                </div>
                                            </div>
                                            <div class="mb-4"><label for="form-product/seo-title"
                                                    class="form-label">Page title</label><input type="text"
                                                    class="form-control" id="form-product/seo-title" /></div>
                                            <div><label for="form-product/seo-description" class="form-label">Meta
                                                    description</label><textarea id="form-product/seo-description"
                                                    class="form-control" rows="2"></textarea></div>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="sa-entity-layout__sidebar">
                                    <!-- <div class="card w-100">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Visibility</h2>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-check">
                                                    <input type="radio" class="form-check-input" name="status" />
                                                    <span class="form-check-label">Published</span>
                                                </label>
                                                <label class="form-check">
                                                    <input type="radio" class="form-check-input" name="status" checked="" />
                                                    <span class="form-check-label">Scheduled</span>
                                                </label>
                                                <label class="form-check mb-0">
                                                    <input type="radio" class="form-check-input" name="status" />
                                                    <span class="form-check-label">Hidden</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label for="form-product/seo-title" class="form-label">Publish date</label><input type="text" class="form-control datepicker-here" id="form-product/publish-date" data-auto-close="true" data-language="en" />
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="card w-100">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Envío</h2>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-check">
                                                    <input type="radio" class="form-check-input" name="status" checked="" />
                                                    <span class="form-check-label">Envío no incluido</span>
                                                </label>
                                                <label class="form-check">
                                                    <input type="radio" class="form-check-input" name="status" />
                                                    <span class="form-check-label">Envío gratis</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w-100 mt-4">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Etiqueta al producto</h2>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-check">
                                                    <input type="radio" class="form-check-input" name="1" checked="" />
                                                    <span class="form-check-label">Nuevo</span>
                                                </label>
                                                <label class="form-check">
                                                    <input type="radio" class="form-check-input" name="2" />
                                                    <span class="form-check-label">Oferta especial</span>
                                                </label>
                                                <label class="form-check">
                                                    <input type="radio" class="form-check-input" name="3" />
                                                    <span class="form-check-label">Más vendido</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w-100 mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Sección en la tienda</h2>
                                            </div>
                                            <select class="sa-select2 form-select">
                                                <option selected>Productos destacados</option>
                                                <option>Los más vendidos</option>
                                                <option >Los recién llegados</option>
                                                <option>Ofertas especiales</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card w-100 mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Categorías</h2>
                                            </div>
                                            <select class="sa-select2 form-select">
                                                <option selected="">Bicicletero</option>
                                                <option>Blusa</option>
                                                <option>Buzo</option>
                                                <option>Buzo de hombre</option>
                                                <option>Camiseta</option>
                                                <option>Camiseta hombre</option>
                                                <option>Camisilla</option>
                                                <option>Camisilla hombre</option>
                                                <option>Chaqueta</option>
                                                <option>Chaqueta hombre</option>
                                                <option>Conjunto</option>
                                                <option>Enterizo</option>
                                                <option>Esqueleto</option>
                                                <option>Falda short</option>
                                                <option>Jogger</option>
                                                <option>Leggins</option>
                                                <option>Licra corta hombre</option>
                                                <option>Pantaloneta</option>
                                                <option>Pantaloneta hombre</option>
                                                <option>Short</option>
                                                <option>Top</option>
                                            </select>
                                            <!-- <div class="mt-4 mb-n2"><a href="#">Añadir nueva categoria</a></div> -->
                                        </div>
                                    </div>
                                    <!-- <div class="card w-100 mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Tags</h2>
                                            </div><select class="sa-select2 form-select" data-tags="true" multiple="">
                                                <option selected="">Universe</option>
                                                <option selected="">Sputnik</option>
                                                <option selected="">Steel</option>
                                                <option selected="">Rocket</option>
                                            </select>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div><!-- sa-app__body / end -->

            <!-- sa-app__footer -->
            <div class="sa-app__footer d-block d-md-flex">
                <?php include "./layouts/footer.php"; ?>
            </div><!-- sa-app__footer / end -->
            

        </div><!-- sa-app__content / end -->

        <!-- sa-app__toasts -->
        <div class="sa-app__toasts toast-container bottom-0 end-0"></div><!-- sa-app__toasts / end -->
    </div><!-- sa-app / end -->

    <!-- scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/feather-icons/feather.min.js"></script>
    <script src="vendor/simplebar/simplebar.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/highlight.js/highlight.pack.js"></script>
    <script src="vendor/quill/quill.min.js"></script>
    <script src="vendor/air-datepicker/js/datepicker.min.js"></script>
    <script src="vendor/air-datepicker/js/i18n/datepicker.en.js"></script>
    <script src="vendor/select2/js/select2.min.js"></script>
    <script src="vendor/fontawesome/js/all.min.js" data-auto-replace-svg="" async=""></script>
    <script src="vendor/chart.js/chart.min.js"></script>
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/js/dataTables.bootstrap5.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/fullcalendar/main.min.js"></script>
    <script src="js/stroyka.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/calendar.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/demo-chart-js.js"></script>
</body>
<!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/app-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Oct 2022 00:40:36 GMT -->

</html>