<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>
<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="box-content bg-success text-white">
                    <div class="statistics-box with-icon">
                        <i class="ico small fa fa-dollar-sign"></i>
                        <p class="text text-white">Transaksi Penjualan</p>
                        <h2 class="counter"><?= $total_penjualan; ?></h2>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>
            <!-- /.col-xl-3 col-lg-6 col-12 -->
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="box-content bg-info text-white">
                    <div class="statistics-box with-icon">
                        <i class="ico small fa fa-cart-plus"></i>
                        <p class="text text-white">Transaksi Pembelian</p>
                        <h2 class="counter"><?= $total_pembelian; ?></h2>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>
            <!-- /.col-xl-3 col-lg-6 col-12 -->
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="box-content bg-danger text-white">
                    <div class="statistics-box with-icon">
                        <i class="ico small fa fa-user"></i>
                        <p class="text text-white">Jumlah Supplier</p>
                        <h2 class="counter"><?= $total_supplier; ?></h2>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>
            <!-- /.col-xl-3 col-lg-6 col-12 -->
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="box-content bg-warning text-white">
                    <div class="statistics-box with-icon">
                        <i class="ico small fa fa-archive"></i>
                        <p class="text text-white">Jumlah Barang</p>
                        <h2 class="counter"><?= $total_barang; ?></h2>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>
            <!-- /.col-xl-3 col-lg-6 col-12 -->
        </div>
    </div>
</div>

<?= $this->endSection('content-admin'); ?>