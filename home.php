<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <meta name="<?= nama_url(); ?>" content="Aplikasi">
    <meta name="<?= nama_url(); ?>" content="Aplikasi">


    <title>
        Apps | <?= nama_url(); ?>
    </title>


    <!-- Favicons -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/logo/favicon.png" type="image/png">


    <!-- Base Assets -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/main/app-dark.css">


    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/shared/iconly.css">


    <!-- Base Sweetalert -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/extensions/sweetalert2/sweetalert2.min.css">


    <!-- Base Datatables -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/pages/fontawesome.css">
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/pages/datatables.css">


</head>

<body>




    <!-- Base App -->
    <script src="<?= base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>assets/js/app.js"></script>

    <!-- Need: Apexcharts -->
    <script src="<?= base_url(); ?>assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/dashboard.js"></script>


    <!-- Base Sweetalert -->
    <script src="<?= base_url(); ?>assets/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/sweetalert2.js"></script>


    <!-- Base Datatables -->
    <script src="<?= base_url(); ?>assets/extensions/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/datatables.js"></script>


    <?php @$koneksi == NULL; ?>


</body>

</html>