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

        function gtag() {
            dataLayer.push(arguments);
        }
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
                    <div class="container container--max--xl">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <!-- <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="app-orders-list.html">Orders</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Order #80294</li>
                                        </ol>
                                    </nav> -->
                                    <h1 class="h3 m-0">Pedido #<?php $idpedido= $_GET['id']; echo $idpedido; ?>
                                    </h1>
                                </div>
                                <div class="col-auto d-flex">
                                    <a href="#" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">¿Que hacer con esta orden?</a>
                                    <a href="#" class="btn btn-secondary">Eliminar</a>
                                </div>
                            </div>
                        </div>

                        <div class="sa-page-meta mb-5">
                        <?php
                            include 'conexion.php';
                            $resultado = $conexion->query("SELECT * FROM ventas WHERE idVenta = $idpedido ;") or die($conexion->error);
                            while ($fila = mysqli_fetch_array($resultado)) {
                        ?>
    
                            <div class="sa-page-meta__body">
                                <div class="sa-page-meta__list">
                                    <div class="sa-page-meta__item"><?php echo $fila['fechaVenta']; ?></div>
                                    <div class="sa-page-meta__item"><?php echo $fila['numProducto']; ?> artículos</div>
                                    <div class="sa-page-meta__item">Total $<?php echo $fila['subTotal']; ?></div>
                                    <div class="sa-page-meta__item d-flex align-items-center fs-6">
                                        <span class="badge badge-sa-success me-2"><?php echo $fila['pagado']; ?></span>
                                        <!-- <span class="badge badge-sa-warning me-2">Parcialmente cumplido</span> -->
                                    </div>
                                </div>
                            </div>
                        <?php
                            $subTotal = $fila['subTotal'];
                            $id=$fila['id'];

                            }
                        ?>        
                        </div>
                        <div class="sa-entity-layout" data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;}">
                            <div class="sa-entity-layout__body">    
                                <div class="sa-entity-layout__main">
                                    <div class="sa-card-area">
                                        <textarea class="sa-card-area__area" rows="2" placeholder="Notas sobre el pedido"></textarea>
                                        <div class="sa-card-area__card">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                </path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body px-5 py-4 d-flex align-items-center justify-content-between">
                                            <h2 class="mb-0 fs-exact-18 me-4">Artículos</h2>
                                            <!-- <div class="text-muted fs-exact-14"><a href="#">Edit items</a></div> -->
                                        </div>
                                        <div class="table-responsive">
                                            <table class="sa-table">
                                                <tbody>
                                                <?php
                                                    include 'conexion.php';
                                                    $resultado1 = $conexion->query("SELECT * FROM detalleventas WHERE venta_id = $idpedido ;") or die($conexion->error);
                                                    while ($fila1 = mysqli_fetch_array($resultado1)) {
                                                ?>
                        
                                                    <tr>
                                                        <td class="min-w-20x">
                                                            <div class="d-flex align-items-center">
                                                                <img src="img-product/<?php echo $fila1['img_producto']; ?>" class="me-4" width="40" height="40" alt="" />
                                                                <a href="app-product.html" class="text-reset">
                                                                    <?php echo $fila1['nombre_producto']; ?>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td class="text-end">$ <?php echo $fila1['precio']; ?>
                                                            <!-- <div class="sa-price">
                                                                <span class="sa-price__symbol">$</span>
                                                                <span class="sa-price__integer">849</span>
                                                                <span class="sa-price__decimal">.00</span>
                                                            </div> -->
                                                        </td>
                                                        <td class="text-end"><?php echo $fila1['cantidad']; ?></td>
                                                        <td class="text-end">$ <?php echo $fila1['total']; ?>
                                                            <!-- <div class="sa-price">
                                                                <span class="sa-price__symbol">$</span>
                                                                <span class="sa-price__integer">849</span>
                                                                <span class="sa-price__decimal">.00</span>
                                                            </div> -->
                                                        </td>
                                                    </tr>
                                                <?php
                                                    }
                                                ?>        
                                                </tbody>
                                                <tbody class="sa-table__group">
                                                    <tr>
                                                        <td colSpan="3">Subtotal</td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                <span class="sa-price__symbol">$</span>
                                                                <span class="sa-price__integer">5,877</span>
                                                                <span class="sa-price__decimal">.00</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colSpan="3">Crédito de la tienda</td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                <span class="sa-price__symbol">$</span>
                                                                <span class="sa-price__integer">00</span>
                                                                <span class="sa-price__decimal">.00</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colSpan="3">Transporte
                                                            <div class="text-muted fs-exact-13">
                                                                via FedEx International
                                                            </div>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                <span class="sa-price__symbol">$</span>
                                                                <span class="sa-price__integer">25</span>
                                                                <span class="sa-price__decimal">.00</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td colSpan="3">Total</td>
                                                        <td class="text-end">$ <?php echo $subTotal; ?>
                                                            <!-- <div class="sa-price">
                                                                <span class="sa-price__symbol">$</span>
                                                                <span class="sa-price__integer">5,882</span>
                                                                <span class="sa-price__decimal">.00</span>
                                                            </div> -->
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- <div class="card mt-5">
                                        <div
                                            class="card-body px-5 py-4 d-flex align-items-center justify-content-between">
                                            <h2 class="mb-0 fs-exact-18 me-4">Transactions</h2>
                                            <div class="text-muted fs-exact-14"><a href="#">Add transaction</a></div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="sa-table text-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <td>Payment<div class="text-muted fs-exact-13">via PayPal</div>
                                                        </td>
                                                        <td>October 7, 2020</td>
                                                        <td class="text-end">
                                                            <div class="sa-price"><span
                                                                    class="sa-price__symbol">$</span><span
                                                                    class="sa-price__integer">2,000</span><span
                                                                    class="sa-price__decimal">.00</span></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Payment<div class="text-muted fs-exact-13">from account
                                                                balance</div>
                                                        </td>
                                                        <td>November 2, 2020</td>
                                                        <td class="text-end">
                                                            <div class="sa-price"><span
                                                                    class="sa-price__symbol">$</span><span
                                                                    class="sa-price__integer">50</span><span
                                                                    class="sa-price__decimal">.00</span></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Refund<div class="text-muted fs-exact-13">to PayPal</div>
                                                        </td>
                                                        <td>December 10, 2020</td>
                                                        <td class="text-end text-danger">
                                                            <div class="sa-price"><span
                                                                    class="sa-price__symbol">$</span><span
                                                                    class="sa-price__integer">-325</span><span
                                                                    class="sa-price__decimal">.00</span></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> -->
                                    <!-- <div class="card mt-5">
                                        <div
                                            class="card-body px-5 py-4 d-flex align-items-center justify-content-between">
                                            <h2 class="mb-0 fs-exact-18 me-4">Balance</h2>
                                        </div>
                                        <table class="sa-table">
                                            <tbody class="sa-table__group">
                                                <tr>
                                                    <td>Order Total</td>
                                                    <td class="text-end">
                                                        <div class="sa-price"><span
                                                                class="sa-price__symbol">$</span><span
                                                                class="sa-price__integer">5,882</span><span
                                                                class="sa-price__decimal">.00</span></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Return Total</td>
                                                    <td class="text-end">
                                                        <div class="sa-price"><span
                                                                class="sa-price__symbol">$</span><span
                                                                class="sa-price__integer">0</span><span
                                                                class="sa-price__decimal">.00</span></div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody class="sa-table__group">
                                                <tr>
                                                    <td>Paid by customer</td>
                                                    <td class="text-end">
                                                        <div class="sa-price"><span
                                                                class="sa-price__symbol">$</span><span
                                                                class="sa-price__integer">-80</span><span
                                                                class="sa-price__decimal">.00</span></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Refunded</td>
                                                    <td class="text-end">
                                                        <div class="sa-price"><span
                                                                class="sa-price__symbol">$</span><span
                                                                class="sa-price__integer">0</span><span
                                                                class="sa-price__decimal">.00</span></div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td>Balance <span class="text-muted">(customer owes you)</span></td>
                                                    <td class="text-end">
                                                        <div class="sa-price"><span
                                                                class="sa-price__symbol">$</span><span
                                                                class="sa-price__integer">5,802</span><span
                                                                class="sa-price__decimal">.00</span></div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> -->
                                </div>
                                <div class="sa-entity-layout__sidebar">
                                <?php
                                    include 'conexion.php';
                                    $resultado2 = $conexion->query("SELECT * FROM detalleventas WHERE venta_id = $idpedido ;") or die($conexion->error);
                                    if ($fila2 = mysqli_fetch_array($resultado2)) {
                                ?>
        
                                    <div class="card">
                                        <div class="card-body d-flex align-items-center justify-content-between pb-0 pt-4">
                                            <h2 class="fs-exact-16 mb-0">Cliente</h2>
                                            <!-- <a href="#" class="fs-exact-14">Edit</a> -->
                                        </div>
                                        <div class="card-body d-flex align-items-center pt-4">
                                            <div class="sa-symbol sa-symbol--shape--circle sa-symbol--size--lg">
                                                <img src="images/customers/usuario-de-perfil3.png" width="40" height="40" alt="" />
                                            </div>
                                            <div class="ms-3 ps-2">
                                                <div class="fs-exact-14 fw-medium"><?php echo $fila2['nombre_cliente']; ?></div>
                                                <div class="fs-exact-13 text-muted">Cliente de TerraModa</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body d-flex align-items-center justify-content-between pb-0 pt-4">
                                            <h2 class="fs-exact-16 mb-0">Contacto de persona</h2>
                                            <!-- <a href="#" class="fs-exact-14">Edit</a> -->
                                        </div>
                                        <div class="card-body pt-4 fs-exact-14">
                                            <div><?php echo $fila2['nombre_cliente']; ?></div>
                                            <div class="mt-1"><a href="#"><?php echo $fila2['email_cliente']; ?></a></div>
                                            <div class="text-muted mt-1"><?php echo $fila2['tel_cliente']; ?></div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body d-flex align-items-center justify-content-between pb-0 pt-4">
                                            <h2 class="fs-exact-16 mb-0">Dirección de Envío</h2>
                                            <!-- <a href="#" class="fs-exact-14">Edit</a> -->
                                        </div>
                                        <div class="card-body pt-4 fs-exact-14">Jessica Moore<br />
                                            Random Federation<br />115302, Moscow<br />ul. Varshavskaya, 15-2-178</div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body d-flex align-items-center justify-content-between pb-0 pt-4">
                                            <h2 class="fs-exact-16 mb-0">Dirección de Envío</h2>
                                            <!-- <a href="#" class="fs-exact-14">Edit</a> -->
                                        </div>
                                        <div class="card-body pt-4 fs-exact-14">Jessica Moore<br />
                                            Random Federation<br />115302, Moscow<br />ul. Varshavskaya, 15-2-178</div>
                                    </div>
                                <?php
                                    }
                                ?>    
                                
                                </div>
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

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Acciones de la orden</h5>
                    <button type="button" class="sa-close sa-close--modal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="accion-orden.php" method="post">

                    <div>
                        <h6>¿Que deseas hacer?</h6>
                        <label class="form-check">
                            <input type="radio" class="form-check-input" name="exampleRadio1" value="Enviado">
                            <span class="form-check-label">Enviado</span>
                        </label>
                        <label class="form-check">
                            <input type="radio" class="form-check-input" name="exampleRadio1" value="Pendiente">
                            <span class="form-check-label">Pendiente</span>
                        </label>
                        <label class="form-check">
                            <input type="radio" class="form-check-input" name="exampleRadio1" value="Cancelado">
                            <span class="form-check-label">Cancelado</span>
                        </label>
                    </div>
                    <div>
                    <hr>    
                    <h6>¿Ya realizo el pago?</h6>
                        <label class="form-check">
                            <input type="radio" class="form-check-input" name="exampleRadio2" value="Si">
                            <span class="form-check-label">Pagado</span>
                        </label>
                        <label class="form-check">
                            <input type="radio" class="form-check-input" name="exampleRadio2" value="No">
                            <span class="form-check-label">Parcial</span>
                        </label>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="submit" name="enviar" class="btn btn-primary">Aplicar</button>
                    </div>

                </form>    
                </div>
            </div>
        </div>
    </div>

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
<!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/app-order.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Oct 2022 00:40:40 GMT -->

</html>