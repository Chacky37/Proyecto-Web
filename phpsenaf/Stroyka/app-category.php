<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">

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
                    <div class="container container--max--xl">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a
                                                    href="app-categories-list.html">Categories</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                                        </ol>
                                    </nav>
                                    <h1 class="h3 m-0">Edit Category</h1>
                                </div>
                                <div class="col-auto d-flex"><a href="#" class="btn btn-secondary me-3">Duplicate</a><a
                                        href="#" class="btn btn-primary">Save</a></div>
                            </div>
                        </div>
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__main">
                                    <div class="card">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                            </div>
                                            <div class="mb-4"><label for="form-category/name"
                                                    class="form-label">Name</label><input type="text"
                                                    class="form-control" id="form-category/name" value="Hand Tools" />
                                            </div>
                                            <div class="mb-4"><label for="form-category/slug"
                                                    class="form-label">Slug</label>
                                                <div class="input-group input-group--sa-slug"><span
                                                        class="input-group-text"
                                                        id="form-category/slug-addon">https://example.com/catalog/</span><input
                                                        type="text" class="form-control" id="form-category/slug"
                                                        aria-describedby="form-category/slug-addon form-category/slug-help"
                                                        value="hand-tools" /></div>
                                                <div id="form-category/slug-help" class="form-text">Unique
                                                    human-readable category identifier. No longer than 255 characters.
                                                </div>
                                            </div>
                                            <div class="mb-4"><label for="form-category/description"
                                                    class="form-label">Description</label><textarea
                                                    id="form-category/description" class="sa-quill-control form-control"
                                                    rows="8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Search engine optimization</h2>
                                                <div class="mt-3 text-muted">Provide information that will help improve
                                                    the snippet and bring your category to the top of search engines.
                                                </div>
                                            </div>
                                            <div class="mb-4"><label for="form-category/seo-title"
                                                    class="form-label">Page title</label><input type="text"
                                                    class="form-control" id="form-category/seo-title" /></div>
                                            <div><label for="form-category/seo-description" class="form-label">Meta
                                                    description</label><textarea id="form-category/seo-description"
                                                    class="form-control" rows="2"></textarea></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card w-100">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Visibility</h2>
                                            </div>
                                            <div class="mb-4"><label class="form-check"><input type="radio"
                                                        class="form-check-input" name="status" /><span
                                                        class="form-check-label">Published</span></label><label
                                                    class="form-check"><input type="radio" class="form-check-input"
                                                        name="status" checked="" /><span
                                                        class="form-check-label">Scheduled</span></label><label
                                                    class="form-check mb-0"><input type="radio" class="form-check-input"
                                                        name="status" /><span
                                                        class="form-check-label">Hidden</span></label></div>
                                            <div><label for="form-category/seo-title" class="form-label">Publish
                                                    date</label><input type="text" class="form-control datepicker-here"
                                                    id="form-category/publish-date" data-auto-close="true"
                                                    data-language="en" />
                                                <div class="form-text">The category will not be visible until the
                                                    specified date.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w-100 mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Parent category</h2>
                                            </div>
                                            <select class="sa-select2 form-select">
                                                <option>[None]</option>
                                                <option selected="">Tools</option>
                                                <option>Screwdrivers</option>
                                                <option>Chainsaws</option>
                                                <option>Hand tools</option>
                                                <option>Machine tools</option>
                                                <option>Power machinery</option>
                                                <option>Measurements</option>
                                                <option>Power tools</option>
                                            </select>
                                            <div class="form-text">Select a category that will be the parent of the
                                                current one.</div>
                                        </div>
                                    </div>
                                    <div class="card w-100 mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Image</h2>
                                            </div>
                                            <div class="border p-4 d-flex justify-content-center">
                                                <div class="max-w-20x"><img src="images/products/product-7-320x320.jpg"
                                                        class="w-100 h-auto" width="320" height="320" alt="" /></div>
                                            </div>
                                            <div class="mt-4 mb-n2"><a href="#" class="me-3 pe-2">Replace image</a><a
                                                    href="#" class="text-danger me-3 pe-2">Remove image</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/app-category.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Oct 2022 00:40:36 GMT -->

</html>