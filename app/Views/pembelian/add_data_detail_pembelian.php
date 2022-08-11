<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>


<div id="wrapper" class="pt-5">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-3">
                <div class="box-content">
                    <h4 class="box-title">Tambah Data Pembelian</h4>
                    <div class="pt-3 col-md-12 text-left">
                        <a href="<?= base_url('pembelian') ?>" type="button" class="btn btn-primary btn-sm"><i class="ti-plus"></i> Kembali</a>
                        <hr>
                    </div>
                    <div class="col-12">
                        <!-- /.box-content -->
                        <div class="box-content">
                            <form action="<?= base_url('pembelian/addDetail') ?>" method="POST" class="no-validated">
                                <?= csrf_field(); ?>
                                <div class="form-group">
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
                                <div class="form-group">
                                    <label for="jumlah_beli" class="form-label">Jumlah Beli</label>
                                    <div class="input-group">
                                        <input type="text" name="jumlah_beli" class="form-control" placeholder="Jumlah Beli" autocomplete="off">
                                        <span class="input-group-text"><i class="fa fa-calculator"></i></span>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="harga_satuan" class="form-label">Harga Satuan</label>
                                    <div class="input-group">
                                        <input type="text" name="harga_satuan" id="harga_satuan" class="form-control" placeholder="Harga Beli" autocomplete="off" readonly>
                                        <span class="input-group-text"><i class="fa fa-money"></i></span>
                                    </div>
                                </div>

                                <div class="form-group pt-4 mt-1">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>
            <div class="col-9">
                <div class="box-content">
                    <h4 class="box-title">Detail Data Pembelian</h4>
                    <div class="pt-3 col-md-12 text-left">
                        <?php if ($detail_pembelian) : ?>
                            <a href="<?php echo site_url('pembelian/selesai') ?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</a>
                        <?php endif ?>
                        <hr>
                    </div>
                    <div class="col-12">
                        <!-- /.box-content -->
                        <table id="datatable" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Supplier</th>
                                    <th>Nama Produk</th>
                                    <th>Harga Satuan</th>
                                    <th>Jumlah Beli</th>
                                    <th>Total Pembelian</th>
                                    <!-- <th class="text-center"><i class="fa fa-cog"></i></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                foreach ($detail_pembelian as $pmb) :
                                    $total += ($pmb['harga_satuan'] *  $pmb['jumlah_beli']);
                                ?>
                                    <tr>
                                        <td>
                                            <?= $pmb['nama_supplier'] ?>
                                        </td>
                                        <td>
                                            <?= $pmb['nama_barang'] . '-' . $pmb['kategori_barang'] ?>
                                        </td>
                                        <td>
                                            <?= nominal($pmb['harga_satuan']) ?>
                                        </td>
                                        <td>
                                            <?= $pmb['jumlah_beli'] ?>
                                        </td>
                                        <td>
                                            <?= nominal($pmb['harga_satuan'] *  $pmb['jumlah_beli']) ?>
                                        </td>
                                        <!-- <td class="d-print-none text-center">
                                            <div class="btn-container">
                                                <button class="btn btn-danger btn-icon-only rounded-circle" type="button" data-toggle="modal" data-target="#delete<?= $pmb['id_detail_pembelian']; ?>">
                                                    <span class="btn-inner--icon"><i class="fa fa-trash-o"></i></span>
                                                </button>
                                            </div>
                                        </td> -->
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right">Total</td>
                                    <td colspan="2" class="text-left"><?= nominal($total) ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content-admin'); ?>