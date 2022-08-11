<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>


<div id="wrapper" class="pt-5">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-12">
                <div class="box-content">
                    <form action="<?= site_url('laporan/laporanPenjualan/show_data_lap_penjualan') ?>" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control choose_month" name="start_date" autocomplete="off" placeholder="Pilih Bulan" required>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Filter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-content -->
            </div>
            <div class="col-12">
                <div class="box-content">
                    <div class="pt-3 col-md-12 text-center">
                        <div class="pb-2">
                            <div class="row">
                                <div class="col-sm-12" style="background-color:white;" align="center">
                                    <b>IREN COLLECTION</b>
                                </div>
                                <div class="col-sm-12" style="background-color:white;" align="center">
                                    <b>LAPORAN PENJUALAN</b>
                                </div>
                                <div class="col-sm-12" style="background-color:white;" align="center">
                                    <b>Periode <?= bulan($date)  ?> <?= $year ?></b>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <table id="datatable" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px;">No</th>
                                <th class="text-center">ID Transaksi</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Jumlah Barang</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center"><i class="fa fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $gtotal = 0;
                            foreach ($lap_penjualan as $penjualan) :
                                $gtotal += $penjualan->jumlah_jual * $penjualan->harga_satuan;
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no = $no + 1 ?></td>
                                    <td class="text-center"><?= $penjualan->id_penjualan ?></td>
                                    <td class="text-center"><?= format_indo($penjualan->tanggal_penjualan) ?></td>
                                    <td class="text-center"><?= ($penjualan->nama_barang) ?></td>
                                    <td class="text-center"><?= $penjualan->jumlah_jual ?></td>
                                    <td class="text-right">Rp <?= number_format($penjualan->harga_satuan) ?></td>
                                    <td class="text-right">Rp <?= number_format($penjualan->jumlah_jual * $penjualan->harga_satuan) ?></td>
                                    <td class="d-print-none text-center">
                                        <a href="<?= base_url('laporan/laporanpenjualan/detail/' . $penjualan->id_penjualan); ?>"><i class="fa fa-eye fa-lg text-info"></i></a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center">Total</td>
                                <td class="text-right">Rp <?= number_format($gtotal) ?></td>
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