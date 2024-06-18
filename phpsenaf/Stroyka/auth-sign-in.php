<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">

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
    <script src="https://kit.fontawesome.com/2a204eb5d0.js" crossorigin="anonymous"></script>
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
    <div class="" style="background-image: radial-gradient(circle at 87.5% 12.5%, #fff03e 0, #fff42c 7.14%, #fff717 14.29%, #fbf900 21.43%, #ddf900 28.57%, #bdf800 35.71%, #98f605 42.86%, #69f31e 50%, #00ef32 57.14%, #00eb46 64.29%, #00e75a 71.43%, #00e36f 78.57%, #00e085 85.71%, #00dc9c 92.86%, #00d9b4 100%); height: 50%;">
        <div style="visibility: hidden;">1</div>
        <div style="visibility: hidden;">2</div>
        <div style="visibility: hidden;">3</div>

        <div class="min-h-100 p-0 p-sm-6 d-flex align-items-stretch">
            <div class="card w-25x flex-grow-1 flex-sm-grow-0 rounded-3 m-sm-auto">
                <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
                    <h1 class="mb-0 fs-3 mb-5">¡Hola! ingresa tu e-mail y contraseña</h1>
                    <!-- <div class="fs-exact-14 text-muted mt-2 pt-1 mb-5 pb-2">Inicie sesión en su cuenta para continuar.</div> -->
                    <?php
                    if (isset($_REQUEST['login'])) {
                        session_start();
                        $email = $_REQUEST['email'] ?? '';
                        $pasword = $_REQUEST['pass'] ?? '';
                        include_once "conexion.php";
                        $con = mysqli_connect($host, $user, $pass, $db);
                        $query = "SELECT id,email,nombre from administrador where email='" . $email . "' and pass='" . $pasword . "';  ";
                        $res = mysqli_query($con, $query);
                        $row = mysqli_fetch_assoc($res);
                        if ($row) {
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['nombre'] = $row['nombre'];
                            header("location: index.php");
                        } else {
                    ?>
                            <div class="alert alert-danger" role="alert">
                                ¡Error credenciales incorrectas!
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <form method="post">
                        <div class="form-group mb-4">
                            <input type="email" placeholder="Correo" class="form-control form-control-lg" name="email" />
                        </div>
                        <div class=" mb-4">
                            <input type="password" placeholder="Contraseña" class="form-control form-control-lg" name="pass" />
                        </div>
                        <!-- <div class="mb-4 row py-2 flex-wrap">
                    <div class="col-auto me-auto"><label class="form-check mb-0"><input type="checkbox"
                                class="form-check-input" /><span class="form-check-label">Recuerdame</span></label>
                    </div>
                    <div class="col-auto d-flex align-items-center"><a href="auth-forgot-password.html">¿Olvidaste tu contraseña?</a></div>
                    </div> -->
                        <div><button type="submit" class="btn btn-primary btn-lg w-100" name="login">Ingresar</button></div>
                    </form>
                </div>
                <!-- <div class="sa-divider sa-divider--has-text">
                <div class="sa-divider__text">Or continue with</div>
            </div> -->
            </div>
        </div>
    </div>
    <div class="sa-app__footer d-block d-md-flex" style="margin-top: 255px;">
        <?php include "./layouts/footer.php" ?>
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

</html>