<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.ninjateam.org/html/zeiss/light/?storefront=envato-elements by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Jul 2022 16:14:20 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url('assets_frontend/images/iren_logo.png') ?>" type="image/x-icon">
    <title>Home - Iren Collection</title>

    <link rel="stylesheet" href="<?= base_url() ?>/assets/styles/style.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/styles/custom.css">

    <!-- Material Design Icon -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/fonts/material-design/css/materialdesignicons.css">

    <!-- mCustomScrollbar -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

    <!-- Waves Effect -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugin/waves/waves.min.css">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugin/sweet-alert/sweetalert.css">

    <!-- FlexDatalist -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugin/flexdatalist/jquery.flexdatalist.min.css">

    <!-- Popover -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugin/popover/jquery.popSelect.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugin/select2/css/select2.min.css">

    <!-- Timepicker -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugin/timepicker/bootstrap-timepicker.min.css">

    <!-- Touch Spin -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugin/touchspin/jquery.bootstrap-touchspin.min.css">

    <!-- Colorpicker -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugin/colorpicker/css/bootstrap-colorpicker.min.css">

    <!-- Datepicker -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugin/datepicker/css/bootstrap-datepicker.min.css">

    <!-- DateRangepicker -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugin/daterangepicker/daterangepicker.css">

    <!-- Color Picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/color-switcher/color-switcher.min.css">

    <!-- Data Tables -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugin/datatables/media/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">


    <link href="<?= base_url(); ?>/assets/toastr/toastr.min.css" rel="stylesheet">
</head>

<body>
    <div class="main-menu">
        <?= $this->include('templates/header'); ?>
        <!-- /.header -->
        <?= $this->include('templates/menu'); ?>
        <!-- /.content -->
    </div>
    <!-- /.main-menu -->

    <?= $this->include('templates/navbar'); ?>
    <!-- /.fixed-navbar -->

    <?= $this->renderSection('content-admin'); ?>
    <!--/#wrapper -->

    <!-- Placed at the end of the document so the pages load faster -->
    <?= $this->include('templates/script'); ?>
    <?= $this->renderSection('content-script'); ?>

</body>

</html>