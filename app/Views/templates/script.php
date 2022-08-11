<!-- Placed at the end of the document so the pages load faster -->
<script src="<?= base_url() ?>/assets/scripts/jquery.min.js"></script>
<script src="<?= base_url() ?>/assets/scripts/modernizr.min.js"></script>
<script src="<?= base_url() ?>/assets/plugin/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?= base_url() ?>/assets/plugin/nprogress/nprogress.js"></script>
<script src="<?= base_url() ?>/assets/plugin/sweet-alert/sweetalert.min.js"></script>
<script src="<?= base_url() ?>/assets/plugin/waves/waves.min.js"></script>
<!-- Full Screen Plugin -->
<script src="<?= base_url() ?>/assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

<!-- Flex Datalist -->
<script src="<?= base_url() ?>/assets/plugin/flexdatalist/jquery.flexdatalist.min.js"></script>

<!-- Popover -->
<script src="<?= base_url() ?>/assets/plugin/popover/jquery.popSelect.min.js"></script>

<!-- Select2 -->
<script src="<?= base_url() ?>/assets/plugin/select2/js/select2.min.js"></script>

<!-- Multi Select -->
<script src="<?= base_url() ?>/assets/plugin/multiselect/multiselect.min.js"></script>

<!-- Touch Spin -->
<script src="<?= base_url() ?>/assets/plugin/touchspin/jquery.bootstrap-touchspin.min.js"></script>

<!-- Timepicker -->
<script src="<?= base_url() ?>/assets/plugin/timepicker/bootstrap-timepicker.min.js"></script>

<!-- Data Tables -->
<script src="<?= base_url() ?>/assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/plugin/datatables/media/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
<script src="<?= base_url() ?>/assets/scripts/datatables.demo.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/jquery.repeater/jquery.repeater.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/jquery.repeater/form-repeater.int.js"></script>

<!-- Colorpicker -->
<script src="<?= base_url() ?>/assets/plugin/colorpicker/js/bootstrap-colorpicker.min.js"></script>

<!-- Datepicker -->
<script src="<?= base_url() ?>/assets/plugin/datepicker/js/bootstrap-datepicker.min.js"></script>

<!-- Moment -->
<script src="<?= base_url() ?>/assets/plugin/moment/moment.js"></script>

<!-- DateRangepicker -->
<script src="<?= base_url() ?>/assets/plugin/daterangepicker/daterangepicker.js"></script>

<!-- Maxlength -->
<script src="<?= base_url() ?>/assets/plugin/maxlength/bootstrap-maxlength.min.js"></script>

<!-- Demo Scripts -->
<script src="<?= base_url() ?>/assets/scripts/form.demo.min.js"></script>

<script src="<?= base_url() ?>/assets/scripts/main.min.js"></script>
<script src="<?= base_url() ?>/assets/scripts/mycommon.js"></script>
<script src="<?= base_url() ?>/assets/color-switcher/color-switcher.min.js"></script>

<script src="<?= base_url('/assets/scripts/rocket-loader.min.js'); ?>"></script>
<script src="<?= base_url(); ?>/assets/toastr/toastr.min.js"></script>



<script>
    $(document).ready(function() {
        $(".choose_date").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            locale: 'id',
            todayHighlight: true,
            orientation: 'bottom'
        });
        $(".choose_month").datepicker({
            format: "dd-mm-yyyy",
            startView: "months",
            minViewMode: "months",
            autoclose: true,
        });
        $('#datatable').dataTable({
            "pageLength": 50,
        });
    });
</script>


<script type="text/javascript">
    <?php if (session()->getFlashdata('success')) { ?>
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.positionClass = 'toast-top-center';
        toastr.success("<?= session()->getFlashdata('success'); ?>");
    <?php } else if (session()->getFlashdata('error')) {  ?>
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.positionClass = 'toast-top-center';
        toastr.error("<?= session()->getFlashdata('error'); ?>");
    <?php } else if (session()->getFlashdata('warning')) {  ?>
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.positionClass = 'toast-top-center';
        toastr.warning("<?= session()->getFlashdata('warning'); ?>");
    <?php } else if (session()->getFlashdata('info')) {  ?>
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.positionClass = 'toast-top-center';
        toastr.info("<?= session()->getFlashdata('info'); ?>");
    <?php } ?>
</script>

<script type='text/javascript'>
    $(document).ready(function() {
        $('#id_barang_pembelian').change(function() {
            var id_barang_pembelian = $('#id_barang_pembelian').val();
            if (id_barang_pembelian != '') {
                $.ajax({
                    url: "<?= base_url('pembelian/fetch_harga'); ?>",
                    method: "POST",
                    data: {
                        id_barang_pembelian: id_barang_pembelian,
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#harga_satuan').val(data);
                        $('#harga_satuan_hide').val(data);
                    }
                });
            } else {
                $('#harga_satuan').val();
                $('#harga_satuan_hide').val();
            }
        });
    });
    $(document).ready(function() {
        $('#id_barang_penjualan').change(function() {
            var id_barang_penjualan = $('#id_barang_penjualan').val();
            if (id_barang_penjualan != '') {
                $.ajax({
                    url: "<?= base_url('penjualan/fetch_harga'); ?>",
                    method: "POST",
                    data: {
                        id_barang_penjualan: id_barang_penjualan,
                    },
                    dataType: 'json',
                    success: function(data) {
                        nilai_hpp = 10 / 100 * data;
                        nilai_akhir_hpp = parseInt(nilai_hpp) + parseInt(data);
                        $('#harga_hpp').val(nilai_akhir_hpp);
                        $('#harga_hpp_hide').val(nilai_akhir_hpp);
                        $('#harga_beli_hide').val(data);
                        console.log(nilai_akhir_hpp);
                        console.log(data);
                    }
                });
            } else {
                $('#harga_hpp').val();
                $('#harga_hpp_hide').val();
                $('#harga_beli_hide').val();
            }
        });
    });
</script>