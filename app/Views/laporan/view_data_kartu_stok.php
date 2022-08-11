<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>


<div id="wrapper" class="pt-5">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-12">
                <div class="box-content">
                    <form action="<?= base_url('kartuStok/filter') ?>" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" class="form-control choose_month" name="start_date" autocomplete="off" placeholder="Pilih Bulan">
                            </div>
                            <div class="form-group col-md-7">
                                <select class="form-control select2" name="id_barang">
                                    <optgroup label="List Barang">
                                        <option value="" disabled selected>- - - Pilih Barang - - -</option>
                                        <?php foreach ($produk as $list) { ?>
                                            <option value="<?= $list['id_barang'] ?>"><?= $list['kategori_barang'] . " - " . $list['nama_barang'] ?></option>
                                        <?php } ?>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-dark waves-effect waves-light">
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
                                    <b>Periode <?= bulan($date)  ?> <?= $year ?></b>
                                </div>
                                <?php if ($barang) : ?>
                                    <div class="col-sm-12" style="background-color:white;" align="center">
                                        <b><?= $barang['nama_barang']  ?></b>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <table id="datatable" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr class="bg-gray-400">
                                <th rowspan="2" cellpadding="0">Tanggal</th>
                                <th colspan="3" class="text-center">Pembelian</th>
                                <th colspan="3" class="text-center">Penjualan</th>
                                <th colspan="3" class="text-center">Sisa</th>

                            </tr>
                            <tr class="bg-gray-400 ">
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($last_stok) : ?>
                                <tr>
                                    <td> 01 <?= bulan($date) . ' ' . $year ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center"><?= $last_stok->unit_akhir ?></td>
                                    <td class="text-center">Rp <?= number_format($last_stok->harga_akhir) ?></td>
                                    <td class="text-center">Rp <?= number_format($last_stok->total_akhir) ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php
                            $pembelian_unit_jumlah = 0;
                            $pembelian_unit_total = 0;
                            $penjualan_unit_jumlah = 0;
                            $penjualan_unit_total = 0;
                            $stok_unit_jumlah = 0;
                            $stok_unit_total = 0;
                            foreach ($kartu_stok as $data_stok) :
                                $pembelian_unit_jumlah += $data_stok->pembelian_unit;
                                $pembelian_unit_total += $data_stok->pembelian_total;
                                $penjualan_unit_jumlah += $data_stok->penjualan_unit;
                                $penjualan_unit_total += $data_stok->penjualan_total;
                                $stok_unit_jumlah += $data_stok->unit_akhir;
                                $stok_unit_total += $data_stok->total_akhir;
                            ?>
                                <tr>
                                    <td width="100">
                                        <?= format_indo($data_stok->tanggal) ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($data_stok->pembelian_unit == 0) : ?>
                                            -
                                        <?php else : ?>
                                            <?= $data_stok->pembelian_unit ?>
                                        <?php endif; ?>
                                    </td>
                                    <td width="100" class="text-center">
                                        <?php if ($data_stok->pembelian_harga == 0) : ?>
                                            -
                                        <?php else : ?>
                                            Rp <?= number_format($data_stok->pembelian_harga) ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($data_stok->pembelian_total == 0) : ?>
                                            -
                                        <?php else : ?>
                                            Rp <?= number_format($data_stok->pembelian_total) ?>
                                        <?php endif; ?>
                                    </td>
                                    <td width="100" class="text-center">
                                        <?php if ($data_stok->penjualan_unit == 0) : ?>
                                            -
                                        <?php else : ?>
                                            <?= $data_stok->penjualan_unit ?>
                                        <?php endif; ?>
                                    </td>
                                    <td width="100" class="text-center">
                                        <?php if ($data_stok->penjualan_harga == 0) : ?>
                                            -
                                        <?php else : ?>
                                            Rp <?= number_format($data_stok->penjualan_harga) ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($data_stok->penjualan_total == 0) : ?>
                                            -
                                        <?php else : ?>
                                            Rp <?= number_format($data_stok->penjualan_total) ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($data_stok->unit_akhir == 0) : ?>
                                            -
                                        <?php else : ?>
                                            <?= $data_stok->unit_akhir ?>
                                        <?php endif; ?>
                                    </td>
                                    <td width="100" class="text-center">
                                        <?php if ($data_stok->harga_akhir == 0) : ?>
                                            -
                                        <?php else : ?>
                                            Rp <?= number_format($data_stok->harga_akhir) ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($data_stok->total_akhir == 0) : ?>
                                            -
                                        <?php else : ?>
                                            Rp <?= number_format($data_stok->total_akhir) ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <!-- <tfoot>
                                        <tr>
                                            <td class="text-center">Total</td>
                                            <td class="text-center"><?= $pembelian_unit_jumlah ?></td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">Rp <?= number_format($pembelian_unit_total) ?></td>
                                            <td class="text-center"><?= $penjualan_unit_jumlah ?></td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">Rp <?= number_format($penjualan_unit_total) ?></td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">Rp <?= number_format($stok_unit_total) ?></td>
                                        </tr>
                                    </tfoot> -->
                    </table>
                </div>
                <!-- /.box-content -->
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content-admin'); ?>