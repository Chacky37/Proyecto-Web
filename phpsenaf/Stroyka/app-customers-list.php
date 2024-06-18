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
                                            <li class="breadcrumb-item active" aria-current="page">Customers</li>
                                        </ol>
                                    </nav> -->
                                    <h1 class="h3 m-0">Clientes</h1>
                                </div>
                                <!-- <div class="col-auto d-flex">
                                    <a href="app-customer.html" class="btn btn-primary">
                                        New customer
                                    </a>
                                </div> -->
                            </div>
                        </div>
                        <?php
                            if(isset($_REQUEST['idBorrar'])){
                                $id= mysqli_real_escape_string($con,$_REQUEST['idBorrar']??'');
                                $query="DELETE from usuarios  where id='".$id."';";
                                $res=mysqli_query($con,$query);
                                if($res){
                                    ?>
                                    <div class="alert alert-success float-right" role="alert">
                                        ¡Usuario eliminado con exito!
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
                        <div class="card">
                            <div class="p-4">
                                <input type="text" placeholder="Comience a escribir para buscar clientes" class="form-control form-control--search mx-auto" id="table-search" />
                            </div>
                            <div class="sa-divider"></div>
                            <table class="sa-datatables-init" data-order="[[ 1, &quot;asc&quot; ]]"
                                data-sa-search-input="#table-search">
                                <thead>
                                    <tr>
                                        <th class="w-min" data-orderable="false">
                                            <input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." />
                                        </th>
                                        <th class="min-w-20x">Nombres</th>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                        <th>Gastó</th>
                                        <th class="w-min" data-orderable="false"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $query = "SELECT * from clientes; ";
                                    $res = mysqli_query($con, $query);

                                    while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." />
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="app-customer.html" class="me-4">
                                                    <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                        <img src="images/customers/usuario-de-perfil3.png" width="40" height="40" alt="" />
                                                    </div>
                                                </a>
                                                <div>
                                                    <a href="app-customer.php?id=<?php echo $row['id'] ?>" class="text-reset"><?php echo $row['nombre'] ?></a>
                                                    <div class="text-muted mt-n1"><?php echo $row['email'] ?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-nowrap"><?php echo $row['nombre']?></td>
                                        <td><?php echo $row['telefono_cliente']?></td>
                                        <td><?php echo $row['direccion_cliente']?></td>
                                        <td>
                                            <div class="sa-price">
                                                <span class="sa-price__symbol">$</span>
                                                <span class="sa-price__integer">28,522</span>
                                                <span class="sa-price__decimal">.35</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sa-muted btn-sm" type="button" id="customer-context-menu-0" data-bs-toggle="dropdown" aria-expanded="false" aria-label="More">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="3" height="13" fill="currentColor">
                                                        <path
                                                            d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z">
                                                        </path>
                                                    </svg>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="customer-context-menu-0">
                                                    <li><a class="dropdown-item" href="#">Editar</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider" />
                                                    </li>
                                                    <li><a class="dropdown-item text-danger" href="app-customers-list.php?idBorrar=<?php echo $row['id'] ?>">Eliminar</a></li>
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
<!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/app-customers-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Oct 2022 00:40:39 GMT -->

</html>