<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>


<div id="wrapper" class="pt-5">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-12">
                <div class="box-content">
                    <h4 class="box-title">Data Detail Penjualan</h4>
                    <div class="pt-3 col-md-12 text-left">
                        <a href="<?= base_url('penjualan') ?>" type="button" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <hr>
                    </div>
                    <table id="datatable" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah Jual</th>
                                <th>Total Penjualan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            $diskon = 0;
                            $total_akhir = 0;
                            foreach ($detail_penjualan as $pnj) :
                                $total += ($pnj['harga_satuan'] *  $pnj['jumlah_jual']);
                            ?>
                                <tr>
                                    <td> <?= $pnj['id_barang'] . '-' . $pnj['nama_barang'] ?> </td>
                                    <td class="text-right"> <?= nominal($pnj['harga_satuan']) ?> </td>
                                    <td class="text-center"> <?= $pnj['jumlah_jual'] ?> </td>
                                    <td class="text-right"> <?= nominal($pnj['harga_satuan'] *  $pnj['jumlah_jual']) ?> </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <input type="hidden" id="total" value="<?= ($total) ?>">
                            <tr>
                                <td colspan="3" class="text-right">Total</td>
                                <td class="text-right"><?= nominal($total) ?></td>
                            </tr>
                            <tr class="hide">
                                <td colspan="3" class="text-right">Diskon (%)</td>
                                <td colspan="2" class="text-right"><?= nominal($diskon = $total * 0.05) ?></td>
                            </tr>
                            <tr class="hide">
                                <td colspan="3" class="text-right">Total Akhir</td>
                                <td colspan="2" class="text-right"><?= nominal($total_akhir = $total - $diskon) ?></td>
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

<?= $this->section('content-script') ?>
<script>
    $(document).ready(function() {
        var total = $('#total').val();
        console.log(total);
        if (total >= 1000000) {
            $('.hide').show();
        } else {
            $('.hide').hide();
        }
    });
</script>

<?= $this->endSection('content-script') ?>