<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>


<div id="wrapper" class="pt-5">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-12">
                <div class="box-content">
                    <h4 class="box-title">Tambah Data Supplier</h4>
                    <div class="pt-3 col-md-12 text-left">
                        <a href="<?= base_url('supplier') ?>" type="button" class="btn btn-primary btn-sm"><i class="ti-plus"></i> Kembali</a>
                        <hr>
                    </div>
                    <form action="<?= base_url('supplier/create') ?>" method="POST" class="no-validated">
                        <?= csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id_supplier" class="col-form-label">ID Supplier</label>
                                <input type="text" class="form-control" name="id_supplier" value="<?= $id_supplier; ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama_supplier" class="col-form-label">Nama Supplier</label>
                                <input type="text" class="form-control" name="nama_supplier" placeholder="Nama Supplier" autocomplete="off">
                                <?php if (isset($validation)) : ?>
                                    <span class="badge badge-danger"> <?= $validation->getError('nama_supplier') ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="alamat" class="col-form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat" autocomplete="off">
                                <?php if (isset($validation)) : ?>
                                    <span class="badge badge-danger"> <?= $validation->getError('alamat') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="no_telp" class="col-form-label">No Telp</label>
                                <input type="number" class="form-control" name="no_telp" placeholder="No Telp" autocomplete="off">
                                <?php if (isset($validation)) : ?>
                                    <span class="badge badge-danger"> <?= $validation->getError('no_telp') ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="mb-2 mt-1">
                            <div class="float-left d-none d-sm-block">
                                <a type="button" href="<?= base_url('supplier') ?>" class="btn btn-secondary btn-sm"><i class="mdi mdi-arrow-left"> Kembali</i></a>
                                <button type="submit" class="btn btn-primary  btn-sm"><i class="mdi mdi-content-save"> Simpan</i> </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-content -->
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content-admin'); ?>