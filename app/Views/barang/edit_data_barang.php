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
                    <form action="<?= base_url('barang/edit/' . $barang['id_barang']) ?>" method="POST" class="no-validated">
                        <?= csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="hidden" class="form-control" name="id_barang" value="<?= $barang['id_barang'] ?>">
                                <label for="id_barang" class="col-form-label">ID Barang</label>
                                <input type="text" class="form-control" value="<?= $barang['id_barang'] ?>" autocomplete="off" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama_barang" class="col-form-label">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" value="<?= $barang['nama_barang'] ?>" placeholder="Nama barang" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="jenis_barang" class="col-form-label">Kategori Barang</label>
                                <select name="kategori_barang" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($kategori as $list) : ?>
                                        <option <?php if ($list['id_kategori'] == $barang['kategori_barang']) {
                                                    echo 'selected="selected"';
                                                } ?> value="<?= $list['id_kategori']; ?>"><?= $list['nama_kategori']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="harga" class="col-form-label">Harga Barang</label>
                                <input type="text" class="form-control" name="harga" value="<?= $barang['harga'] ?>" placeholder="Harga barang" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="deskripsi" class="col-form-label">Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi" value="<?= $barang['deskripsi'] ?>" placeholder="Deskripsi" autocomplete="off">
                            </div>
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