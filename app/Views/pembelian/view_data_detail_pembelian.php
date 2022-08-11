<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>


<div id="wrapper" class="pt-5">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-12">
                <div class="box-content">
                    <h4 class="box-title">Data Detail Pembelian</h4>
                    <div class="pt-3 col-md-12 text-left">
                        <a href="<?= base_url('pembelian') ?>" type="button" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <hr>
                    </div>
                    <table id="datatable" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Supplier</th>
                                <th>Nama Produk</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah Beli</th>
                                <th>Total Pembelian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($detail_pembelian as $pmb) :
                                $total += ($pmb['harga_satuan'] *  $pmb['jumlah_beli']);
                            ?>
                                <tr>
                                    <td> <?= $pmb['nama_supplier'] ?> </td>
                                    <td> <?= $pmb['nama_barang'] . '-' . $pmb['kategori_barang'] ?> </td>
                                    <td class="text-right"> <?= nominal($pmb['harga_satuan']) ?> </td>
                                    <td class="text-center"> <?= $pmb['jumlah_beli'] ?> </td>
                                    <td class="text-right"> <?= nominal($pmb['harga_satuan'] *  $pmb['jumlah_beli']) ?> </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-right"><?= nominal($total) ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-content -->
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content-admin'); ?>