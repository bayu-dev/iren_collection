<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>


<div id="wrapper" class="pt-5">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-12">
                <div class="box-content">
                    <h4 class="box-title">Edit Data Supplier</h4>
                    <div class="pt-3 col-md-12 text-left">
                        <a href="<?= base_url('supplier') ?>" type="button" class="btn btn-primary btn-sm"><i class="ti-plus"></i> Kembali</a>
                        <hr>
                    </div>
                    <form action="<?= base_url('supplier/edit/' . $supplier['id_supplier']) ?>" method="POST" class="no-validated">
                        <?= csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="hidden" class="form-control" name="id_supplier" value="<?= $supplier['id_supplier'] ?>">
                                <label for="id_supplier" class="col-form-label">ID Supplier</label>
                                <input type="text" class="form-control" value="<?= $supplier['id_supplier'] ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama_supplier" class="col-form-label">Nama Supplier</label>
                                <input type="text" class="form-control" name="nama_supplier" value="<?= $supplier['nama_supplier'] ?>" placeholder="Nama Supplier" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="alamat" class="col-form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?= $supplier['alamat'] ?>" placeholder="Alamat" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="no_telp" class="col-form-label">No Telp</label>
                                <input type="number" class="form-control" name="no_telp" value="<?= $supplier['no_telp'] ?>" placeholder="No Telp" autocomplete="off">
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