<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>


<div id="wrapper" class="pt-5">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-6">
                <div class="box-content">
                    <h4 class="box-title">Tambah Data Penjualan</h4>
                    <div class="pt-3 col-md-12 text-left">
                        <a href="<?= base_url('penjualan') ?>" type="button" class="btn btn-primary btn-sm"><i class="ti-plus"></i> Kembali</a>
                        <hr>
                    </div>
                    <div class="col-12">
                        <!-- /.box-content -->
                        <div class="box-content">
                            <form action="<?= base_url('penjualan/add') ?>" method="POST" class="no-validated ">
                                <?= csrf_field(); ?>
                                <div class="form-group mb-1">
                                    <label class="form-label">ID Penjualan</label>
                                    <input type="text" class="form-control" value="<?= $id_penjualan; ?>" disabled>
                                </div>

                                <div class="form-group mb-1">
                                    <label for="tanggal" class="form-label">Tanggal Penjualan</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control choose_date" placeholder="Pilih Tanggal" name="tanggal" autocomplete="off">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div><!-- input-group -->
                                </div>
                                <div class="form-group input-group-btn">
                                    <a href="<?= base_url('penjualan') ?>" class="btn btn-secondary"><i class="mdi mdi-close-thick fa-lg"></i> Batal</a>
                                    <button type="submit" class="btn btn-primary text-white"><i class="mdi mdi-content-save-move fa-lg"></i> Proses</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.box-content -->
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content-admin'); ?>