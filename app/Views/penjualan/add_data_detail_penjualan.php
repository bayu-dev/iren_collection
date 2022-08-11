<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>


<div id="wrapper" class="pt-5">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-3">
                <div class="box-content">
                    <h4 class="box-title">Tambah Data Penjualan</h4>
                    <div class="pt-3 col-md-12 text-left">
                        <a href="<?= base_url('penjualan') ?>" type="button" class="btn btn-primary btn-sm"><i class="ti-plus"></i> Kembali</a>
                        <hr>
                    </div>
                    <div class="col-12">
                        <!-- /.box-content -->
                        <div class="box-content">
                            <form action="<?= base_url('penjualan/addDetail') ?>" method="POST" class="no-validated">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="id_barang" class="form-label">Barang</label>
                                    <select class="form-control select2" name="id_barang" id="id_barang_penjualan">
                                        <optgroup label="List Barang">
                                            <option value="" disabled selected>- - - Pilih Barang - - -</option>
                                            <?php foreach ($barang as $list) { ?>
                                                <option value="<?= $list['id_barang'] ?>"><?= $list['id_barang'] . " - " . $list['nama_barang'] ?></option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah_jual" class="form-label">Jumlah Jual</label>
                                    <div class="input-group">
                                        <input id="jumlah_jual" type="text" value="0" name="jumlah_jual" class="form-control">
                                        <span class="input-group-text">Pcs</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="harga_satuan" class="form-label">Harga Satuan</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="harga_hpp" disabled>
                                        <input type="hidden" class="form-control" id="harga_hpp_hide" name="hpp">
                                        <input type="hidden" class="form-control" id="harga_beli_hide" name="harga_satuan">
                                        <span class="input-group-text"><i class="fa fa-calculator"></i></span>
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
                    <h4 class="box-title">Detail Data Penjualan</h4>
                    <div class="col-12">
                        <!-- /.box-content -->
                        <form action="<?= base_url('penjualan/selesai') ?>" method="POST">
                            <table id="datatable" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah Jual</th>
                                        <th>Total Penjualan</th>
                                        <!-- <th class="text-center"><i class="fa fa-cog"></i></th> -->
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
                                            <td> <?= nominal($pnj['harga_satuan']) ?> </td>
                                            <td> <?= $pnj['jumlah_jual'] ?> </td>
                                            <td style="text-align:right;"> <?= nominal($pnj['harga_satuan'] *  $pnj['jumlah_jual']) ?> </td>
                                            <!-- <td class="d-print-none text-center">
                                            <div class="btn-container">
                                                <button class="btn btn-danger btn-icon-only rounded-circle" type="button" data-toggle="modal" data-target="#delete<?= $pnj['id_detail_penjualan']; ?>">
                                                    <span class="btn-inner--icon"><i class="fa fa-trash-o"></i></span>
                                                </button>
                                            </div>
                                        </td> -->
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <?php if ($detail_penjualan) : ?>
                                    <tfoot>
                                        <tr>
                                            <td style="text-align:right;" colspan="3">Total Awal :</td>
                                            <td style="text-align:right;"><input type="number" style="text-align:right;" class="form-control total" id="total" name="total" value="<?= $total ?>" readonly></td>
                                        </tr>
                                        <tr class="hide">
                                            <td style="text-align:right;" colspan="3">Diskon (%)</td>
                                            <td style="text-align:right;">
                                                <input type="number" class="form-control" style="text-align:right;" id="pengali" name="pengali" value="5" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:right;" colspan="3">Total Akhir :</td>
                                            <td style="text-align:right;"><input type="number" style="text-align:right;" class="form-control total_akhir" id="total_akhir" name="total_akhir" readonly></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:right;" colspan="4">
                                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                <?php endif ?>
                            </table>
                        </form>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content-admin'); ?>

<?= $this->section('content-script'); ?>
<script>
    $(document).ready(function() {
        // showText(1, $('input[name=total]'));
        var total = $('#total').val();
        var diskon = 5 / 100 * total;
        var total_akhir = total - diskon;
        if (total >= 1000000) {
            $('.hide').show();
            $('#total_akhir').val(total_akhir);
        } else {
            $('.hide').hide();
            $('#total_akhir').val(total);
        }
    });

    // function showText(idx, obj) {
    //     if (idx == 1) {
    //         if (obj.value >= 1000000) {
    //             $('.hide').show();
    //         } else {
    //             $('.hide').hide();
    //         }
    //     }

    // }

    // $(document).ready(function() {
    //     $(document).on('keyup', 'input[name=pengali]', function() {
    //         var _this = $(this);
    //         var min = parseInt(_this.attr('min')) || 0;
    //         var max = parseInt(_this.attr('max')) || 100;
    //         var val = parseInt(_this.val()) || (min - 1);
    //         if (val > max)
    //             _this.val(max);

    //         var pengali = $(this).val();
    //         var total = parseInt($("#total").val());
    //         var totalAmount = (pengali / 100) * total;
    //         var totalAkhir = parseInt(totalAmount) - +parseInt(total);
    //         let final = -totalAkhir;

    //         $("#total_akhir").val(final);
    //     });

    // });

    function check_nama(input) {
        if (input.value == "") {
            $('#nm_rab_paket').addClass('is-invalid');
        } else {
            $('#nm_rab_paket').removeClass('is-invalid');
        }
    }

    function check_kategori(input) {
        if (input.value == "") {
            $('#kategori').addClass('is-invalid');
        } else {
            $('#kategori').removeClass('is-invalid');
        }
    }
</script>

<?= $this->endSection('content-script'); ?>