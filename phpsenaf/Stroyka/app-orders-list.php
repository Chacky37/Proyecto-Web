<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">

<?php
    session_start();
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
            <?php include "./layouts/sidebar.php" ?>
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
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <!-- <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Orders</li>
                                        </ol>
                                    </nav> -->
                                    <h1 class="h3 m-0">Pedidos</h1>
                                </div>
                                <!-- <div class="col-auto d-flex">
                                    <a href="app-order.html" class="btn btn-primary">
                                        New order
                                    </a>
                                </div> -->
                            </div>
                        </div>
                        <div class="card">
                            <div class="p-4">
                                <input type="text" placeholder="Comience a escribir para buscar pedidos" class="form-control form-control--search mx-auto" id="table-search" />
                            </div>
                            <div class="sa-divider"></div>
                            <table class="sa-datatables-init text-nowrap" data-order="[[ 1, &quot;desc&quot; ]]"
                                data-sa-search-input="#table-search">
                                <thead>
                                    <tr>
                                        <th class="w-min" data-orderable="false">
                                            <input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." />
                                        </th>
                                        <th>Número</th>
                                        <th>Fecha</th>
                                        <th>Cliente</th>
                                        <th>Pagado</th>
                                        <th>Estado</th>
                                        <th>Elementos</th>
                                        <th>Total</th>
                                        <th class="w-min" data-orderable="false"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include 'conexion.php';
                                    $resultado = $conexion->query("SELECT * FROM ventas ;") or die($conexion->error);
                                    while ($fila = mysqli_fetch_array($resultado)) {
                                ?>
    
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block"
                                                aria-label="..." /></td>
                                        <td><a href="app-order.php?id=<?php echo $fila['idVenta']; ?>" class="text-reset">#<?php echo $fila['idVenta']; ?></a></td>
                                        <td><?php echo $fila['fechaVenta']; ?></td>
                                        <td><a href="app-customer.html" class="text-reset"><?php echo $fila['cliente']; ?></a></td>
                                        <td>
                                            <div class="d-flex fs-6">
                                                <div class="badge badge-sa-<?php if($fila['pagado']=="Si"){echo "success";}else{ echo "danger";}?>"><?php echo $fila['pagado']; ?></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex fs-6">
                                                <div class="badge badge-sa-<?php if($fila['estado']=="Enviado"){ echo "success";}elseif($fila['estado']=="Pendiente"){echo "primary";}else{ echo "danger";}?>" ><?php echo $fila['estado']; ?></div>
                                            </div>
                                        </td>
                                        <td><?php echo $fila['numProducto']; ?> articulos</td>
                                        <td> $
                                            <?php echo $fila['subTotal']; ?>
                                            <!-- <div class="sa-price"><span class="sa-price__symbol">$</span><span
                                                    class="sa-price__integer">5,103</span><span
                                                    class="sa-price__decimal">.00</span></div> -->
                                        </td>
                                        <td>
                                            <div class="dropdown"><button class="btn btn-sa-muted btn-sm" type="button"
                                                    id="order-context-menu-11" data-bs-toggle="dropdown"
                                                    aria-expanded="false" aria-label="More"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="3" height="13"
                                                        fill="currentColor">
                                                        <path
                                                            d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z">
                                                        </path>
                                                    </svg></button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="order-context-menu-11">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#">Duplicate</a></li>
                                                    <li><a class="dropdown-item" href="#">Add tag</a></li>
                                                    <li><a class="dropdown-item" href="#">Remove tag</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider" />
                                                    </li>
                                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
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
</body>
<!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/app-orders-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Oct 2022 00:40:40 GMT -->

</html>