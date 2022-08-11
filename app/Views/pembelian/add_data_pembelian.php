<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>


<div id="wrapper" class="pt-5">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-12">
                <div class="box-content">
                    <h4 class="box-title">Tambah Data Pembelian</h4>
                    <div class="pt-3 col-md-12 text-left">
                        <a href="<?= base_url('pembelian') ?>" type="button" class="btn btn-primary btn-sm"><i class="ti-plus"></i> Kembali</a>
                        <hr>
                    </div>
                    <div class="col-12">
                        <!-- /.box-content -->
                        <div class="box-content">
                            <form action="<?= base_url('pembelian/add') ?>" method="POST" class="no-validated ">
                                <?= csrf_field(); ?>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label">ID Pembelian</label>
                                        <input type="text" class="form-control" value="<?= $id_pembelian; ?>" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tanggal" class="form-label">Tanggal Pembelian</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control choose_date" placeholder="Pilih Tanggal" name="tanggal" autocomplete="off">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="id_supplier" class="form-label">Supplier</label>
                                        <select name="id_supplier" class="form-control" title="- - - Pilih Supplier - - -">
                                            <option value="" selected disabled> Pilih Supplier</option>
                                            <?php foreach ($supplier as $list) {                                    ?>
                                                <option value="<?= $list['id_supplier'] ?>"><?= $list['id_supplier'] . " - " . $list['nama_supplier'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="id_barang" class="form-label">Barang</label>
                                        <select class="form-control select2" name="id_barang" id="id_barang_pembelian">
                                            <optgroup label="List Barang">
                                                <option value="" disabled selected>- - - Pilih Barang - - -</option>
                                                <?php
                                                foreach ($barang as $list) {
                                                ?>
                                                    <option value="<?= $list['id_barang'] ?>"><?= $list['kategori_barang'] . " - " . $list['nama_barang'] ?></option>
                                                <?php } ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="jumlah_beli" class="form-label">Jumlah Beli</label>
                                        <div class="input-group">
                                            <input type="text" name="jumlah_beli" class="form-control" placeholder="Jumlah Beli" autocomplete="off">
                                            <span class="input-group-text"><i class="fa fa-calculator"></i></span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="harga_satuan" class="form-label">Harga Satuan</label>
                                        <div class="input-group">
                                            <input type="text" name="harga_satuan" id="harga_satuan" class="form-control" placeholder="Harga Beli" autocomplete="off" readonly>
                                            <span class="input-group-text"><i class="fa fa-money"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group input-group-btn">
                                    <a href="<?= base_url('pembelian') ?>" class="btn btn-secondary"><i class="mdi mdi-close-thick fa-lg"></i> Batal</a>
                                    <button type="submit" class="btn btn-primary text-white"><i class="mdi mdi-content-save-move fa-lg"></i> Simpan</button>
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