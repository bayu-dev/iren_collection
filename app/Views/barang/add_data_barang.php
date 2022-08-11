<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>


<div id="wrapper" class="pt-5">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-12">
                <div class="box-content">
                    <h4 class="box-title">Tambah Data Barang</h4>
                    <div class="pt-3 col-md-12 text-left">
                        <a href="<?= base_url('barang') ?>" type="button" class="btn btn-primary btn-sm"><i class="ti-plus"></i> Kembali</a>
                        <hr>
                    </div>
                    <form action="<?= base_url('barang/create') ?>" method="POST" class="no-validated" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id_barang" class="col-form-label">ID Barang</label>
                                <input type="text" class="form-control" name="id_barang" value="<?= $id_barang; ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama_barang" class="col-form-label">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" autocomplete="off">
                                <?php if (isset($validation)) : ?>
                                    <span class="badge badge-danger"> <?= $validation->getError('nama_barang') ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="kategori_barang" class="col-form-label">Kategori Barang</label>
                                <select name="kategori_barang" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($kategori as $list) : ?>
                                        <option value="<?= $list['id_kategori']; ?>"><?= $list['nama_kategori']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?php if (isset($validation)) : ?>
                                    <span class="badge badge-danger"> <?= $validation->getError('kategori_barang') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="harga" class="col-form-label">Harga Barang</label>
                                <input type="text" class="form-control" name="harga" placeholder="Harga Barang" autocomplete="off">
                                <?php if (isset($validation)) : ?>
                                    <span class="badge badge-danger"> <?= $validation->getError('harga') ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="deskripsi" class="col-form-label">Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" autocomplete="off">
                                <?php if (isset($validation)) : ?>
                                    <span class="badge badge-danger"> <?= $validation->getError('deskripsi') ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_image" class="col-form-label">Product Image</label>
                            <input type="file" class="dropify" data-max-file-size="10M" name="product_image" />
                        </div>
                        <div class="mb-2 mt-1">
                            <div class="float-left d-none d-sm-block">
                                <a type="button" href="<?= base_url('barang') ?>" class="btn btn-secondary btn-sm"><i class="mdi mdi-arrow-left"> Kembali</i></a>
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