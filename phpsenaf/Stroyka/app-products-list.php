<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">

<?php
    include_once "conexion.php";
    $con = mysqli_connect($host, $user, $pass, $db);
    session_start();    
?>
<head>
    <meta charSet="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <title>Admin - Sport Running</title><!-- icon -->
    <link rel="icon" type="image/png" href="images/favicon.png" /><!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
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
            <?php include "./layouts/tolbar.php" ?>
            <!-- sa-app__toolbar / end -->
            <!-- sa-app__body -->
            <div id="top" class="sa-app__body">
                <div class="mx-xxl-3 px-4 px-sm-5">
                    <div class="py-5">
                        <div class="row g-4 align-items-center">
                            <div class="col">
                                <nav class="mb-2" aria-label="breadcrumb">
                                    <ol class="breadcrumb breadcrumb-sa-simple">
                                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                                    </ol>
                                </nav>
                                <h1 class="h3 m-0">Listado de Productos</h1>
                            </div>
                            <div class="col-auto d-flex">
                                
                                <a href="app-product.php" class="btn btn-primary">Nuevo producto</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        if (isset($_REQUEST['mensaje'])) {
                    ?>  
                        <div class="alert alert-warning" role="alert">
                            <span class="h5"><?php echo $_REQUEST['mensaje'] ?></span>
                        </div>        
                    <?php
                        }
                    ?>
                    <?php
                        if(isset($_REQUEST['idEliminar'])){
                            $id= mysqli_real_escape_string($con,$_REQUEST['idEliminar']??'');
                            $query="DELETE from productos  where id='".$id."';";
                            $res=mysqli_query($con,$query);
                            if($res){
                                ?>
                                <div class="alert alert-success float-right" role="alert">
                                    ¡Producto eliminado con exito!
                                </div>
                                <?php
                            }else{
                                ?>
                                <div class="alert alert-danger float-right" role="alert">
                                    Error al borrar <?php echo mysqli_error($con); ?>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
                <div class="mx-xxl-3 px-4 px-sm-5 pb-6">
                    <div class="sa-layout">
                        <div class="sa-layout__backdrop" data-sa-layout-sidebar-close=""></div>
                        <div class="sa-layout__sidebar">
                            <div class="sa-layout__sidebar-header">
                                <div class="sa-layout__sidebar-title">
                                    Filters
                                </div>
                                <button type="button" class="sa-close sa-layout__sidebar-close" aria-label="Close"
                                    data-sa-layout-sidebar-close="">
                                </button>
                            </div>
                            <!-- <div class="sa-layout__sidebar-body sa-filters">
                                <ul class="sa-filters__list">
                                    <li class="sa-filters__item">
                                        <div class="sa-filters__item-title">Price</div>
                                        <div class="sa-filters__item-body">
                                            <div class="sa-filter-range" data-min="0" data-max="2000" data-from="0"
                                                data-to="2000">
                                                <div class="sa-filter-range__slider"></div>
                                                <input type="hidden" value="0" class="sa-filter-range__input-from" />
                                                <input type="hidden" value="2000" class="sa-filter-range__input-to" />
                                            </div>
                                        </div>
                                    </li>
                                    <li class="sa-filters__item">
                                        <div class="sa-filters__item-title">Categories</div>
                                        <div class="sa-filters__item-body">
                                            <ul class="list-unstyled m-0 mt-n2">
                                                <li>
                                                    <label class="d-flex align-items-center pt-2">
                                                        <input type="checkbox" class="form-check-input m-0 me-3 fs-exact-16"
                                                            checked="" />Power tools
                                                    </label>
                                                </li>
                                                <li><label class="d-flex align-items-center pt-2">
                                                        <input type="checkbox" class="form-check-input m-0 me-3 fs-exact-16" />Hand tools
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="d-flex align-items-center pt-2">
                                                        <input type="checkbox" class="form-check-input m-0 me-3 fs-exact-16"                checked="">Machine tools
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="d-flex align-items-center pt-2">
                                                        <input type="checkbox" class="form-check-input m-0 me-3 fs-exact-16" />
                                                        Power machinery
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="d-flex align-items-center pt-2">
                                                        <input type="checkbox" class="form-check-input m-0 me-3 fs-exact-16" />
                                                        Measurement
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="sa-filters__item">
                                        <div class="sa-filters__item-title">Product type</div>
                                        <div class="sa-filters__item-body">
                                            <ul class="list-unstyled m-0 mt-n2">
                                                <li><label class="d-flex align-items-center pt-2"><input type="radio"
                                                            class="form-check-input m-0 me-3 fs-exact-16"
                                                            name="filter-product_type" checked="" />Simple</label></li>
                                                <li><label class="d-flex align-items-center pt-2"><input type="radio"
                                                            class="form-check-input m-0 me-3 fs-exact-16"
                                                            name="filter-product_type" />Variable</label></li>
                                                <li><label class="d-flex align-items-center pt-2"><input type="radio"
                                                            class="form-check-input m-0 me-3 fs-exact-16"
                                                            name="filter-product_type" />Digital</label></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="sa-filters__item">
                                        <div class="sa-filters__item-title">Brands</div>
                                        <div class="sa-filters__item-body">
                                            <ul class="list-unstyled m-0 mt-n2">
                                                <li><label class="d-flex align-items-center pt-2"><input type="checkbox"
                                                            class="form-check-input m-0 me-3 fs-exact-16" />Brandix</label>
                                                </li>
                                                <li><label class="d-flex align-items-center pt-2"><input type="checkbox"
                                                            class="form-check-input m-0 me-3 fs-exact-16"
                                                            checked="" />FastWheels</label></li>
                                                <li><label class="d-flex align-items-center pt-2"><input type="checkbox"
                                                            class="form-check-input m-0 me-3 fs-exact-16"
                                                            checked="" />FuelCorp</label></li>
                                                <li><label class="d-flex align-items-center pt-2"><input type="checkbox"
                                                            class="form-check-input m-0 me-3 fs-exact-16" />RedGate</label>
                                                </li>
                                                <li><label class="d-flex align-items-center pt-2"><input type="checkbox"
                                                            class="form-check-input m-0 me-3 fs-exact-16" />Specter</label>
                                                </li>
                                                <li><label class="d-flex align-items-center pt-2"><input type="checkbox"
                                                            class="form-check-input m-0 me-3 fs-exact-16" />TurboElectric</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                        <div class="sa-layout__content">
                            <div class="card">
                                <div class="p-4">
                                    <div class="row g-4">
                                        <!-- <div class="col-auto sa-layout__filters-button">
                                            <button class="btn btn-sa-muted btn-sa-icon fs-exact-16"
                                                data-sa-layout-sidebar-open="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"        fill="currentColor">
                                                    <path
                                                        d="M7,14v-2h9v2H7z M14,7h2v2h-2V7z M12.5,6C12.8,6,13,6.2,13,6.5v3c0,0.3-0.2,0.5-0.5,0.5h-2 C10.2,10,10,9.8,10,9.5v-3C10,6.2,10.2,6,10.5,6H12.5z M7,2h9v2H7V2z M5.5,5h-2C3.2,5,3,4.8,3,4.5v-3C3,1.2,3.2,1,3.5,1h2 C5.8,1,6,1.2,6,1.5v3C6,4.8,5.8,5,5.5,5z M0,2h2v2H0V2z M9,9H0V7h9V9z M2,14H0v-2h2V14z M3.5,11h2C5.8,11,6,11.2,6,11.5v3 C6,14.8,5.8,15,5.5,15h-2C3.2,15,3,14.8,3,14.5v-3C3,11.2,3.2,11,3.5,11z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div> -->
                                        <div class="col">
                                            <input type="text" placeholder="Empieza a escribir para buscar productos" class="form-control form-control--search mx-auto" id="table-search" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sa-divider"></div>
                                <table class="sa-datatables-init" id="example" data-order="[[ 1, &quot;asc&quot; ]]"
                                    data-sa-search-input="#table-search">
                                    <thead>
                                        <tr>
                                            <th class="w-min" data-orderable="false"><input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." /></th>
                                            <th class="min-w-20x">Producto</th>
                                            <th>Categoría</th>
                                            <th>Stock</th>
                                            <th>Precio</th>
                                            <th class="w-min" data-orderable="false"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * from productos; ";
                                        $res = mysqli_query($con, $query);

                                        while($row = mysqli_fetch_array($res)) {
                                        ?>    
                                        <tr>
                                            <td><input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block"aria-label="..." /></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="me-4">
                                                        <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                            <img src="img-product/<?php echo $row['imagen1'];?>" width="40" height="40" alt="" />
                                                        </div>
                                                    </a>
                                                    <div>
                                                        <a href="#" class="text-reset">
                                                            <?php echo $row['nombre']; ?>
                                                        </a>
                                                        <div class="sa-meta mt-0">
                                                            <ul class="sa-meta__list">
                                                                <li class="sa-meta__item">ID:
                                                                    <span title="Click to copy product ID" class="st-copy"><?php echo $row['id']; ?></span>
                                                                </li>
                                                                <li class="sa-meta__item">SKU:
                                                                    <span title="Click to copy product SKU" class="st-copy"><?php echo $row['sku']; ?></span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a href="app-category.html" class="text-reset"><?php echo $row['categoria']; ?></a></td>
                                            <td><div class="badge badge-sa-success"><?php echo $row['disponibilidad']; ?></div></td>
                                            <td>
                                                <div class="sa-price">
                                                    <span class="sa-price__symbol">$</span>
                                                    <span class="sa-price__integer"><?php echo $row['precio']; ?></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sa-muted btn-sm" type="button" id="product-context-menu-0"
                                                        data-bs-toggle="dropdown" aria-expanded="false"
                                                        aria-label="More">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="3" height="13" fill="currentColor">
                                                            <path
                                                                d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="product-context-menu-0">
                                                        <li><a class="dropdown-item" href="edit-product.php?id=<?php echo $row['id'];?>">Editar</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider" />
                                                        </li>
                                                        <li><a class="dropdown-item text-danger" href="app-products-list.php?idEliminar=<?php echo $row['id'] ?>">Eliminar</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- sa-app__body / end -->

            <!-- sa-app__footer -->
            <div class="sa-app__footer d-block d-md-flex">
              <?php include "./layouts/footer.php" ?>  
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
    <!-- <script>
    $(document).ready(function() {
        $('#example').DataTable({
            language: {
                url: 'spanish.json' //Ubicacion del archivo con el json del idioma.
            }
        });
    });
    </script> -->
</body>

</html>