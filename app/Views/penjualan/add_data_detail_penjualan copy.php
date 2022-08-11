<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>


<div id="wrapper" class="pt-5">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-12">
                <div class="box-content">
                    <h4 class="box-title">Tambah Data Penjualan</h4>
                    <div class="pt-3 col-md-12 text-left">
                        <a href="<?= base_url('penjualan') ?>" type="button" class="btn btn-primary btn-sm"><i class="ti-plus"></i> Kembali</a>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="box-content">
                            <form action="<?= base_url('penjualan/addDetail') ?>" method="POST" class="no-validated">
                                <?= csrf_field(); ?>
                                <table class="table table-bordered repeater" id="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">Pilih Barang</th>
                                            <th style="text-align:center;">Jumlah Jual</th>
                                            <th style="text-align:center;">Harga Satuan</th>
                                            <th class="hide"></th>
                                            <th class="hide"></th>
                                            <th style="text-align:center;">Total</th>
                                            <th style="text-align:center;"> <button data-repeater-create type="button" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i></button></th>
                                        </tr>
                                    </thead>
                                    <tbody data-repeater-list="list">
                                        <tr data-repeater-item class="line">
                                            <td>
                                                <select class="form-control select2 id_barang_penjualan" name="id_barang" id="id_barang_penjualan">
                                                    <optgroup label="List Barang">
                                                        <option value="" disabled selected>- - - Pilih Barang - - -</option>
                                                        <?php foreach ($barang as $list) { ?>
                                                            <option value="<?= $list['id_barang'] ?>"><?= $list['id_barang'] . " - " . $list['nama_barang'] ?></option>
                                                        <?php } ?>
                                                    </optgroup>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="jumlah_beli" class="form-control jumlah_beli" placeholder="Jumlah Beli" autocomplete="off">
                                            </td>
                                            <td class="hide">
                                                <input type="hidden" class="form-control harga_hpp_hide" id="harga_hpp_hide" name="hpp">
                                            </td>
                                            <td class="hide">
                                                <input type="hidden" class="form-control harga_beli_hide" id="harga_beli_hide" name="harga_satuan">
                                            </td>
                                            <td style="width:15%">
                                                <input type="text" name="harga_satuan" id="harga_hpp" class="form-control harga_hpp" readonly>
                                            </td>
                                            <td style="width:15%"><input name="jumlah" class="form-control jumlah" id="jumlah" readonly data-action="sumJumlah"></td>
                                            <td class="text-center"><button data-repeater-delete type="button" class="btn btn-sm btn-danger "><i class="fa fa-trash text-white"></i></input></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td style="text-align:right;" colspan="3">Total Awal :</td>
                                            <td style="text-align:right;"><input type='number' class="form-control total" id="total" name="total" readonly></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:right;" colspan="3">Diskon (%)</td>
                                            <td>
                                                <div class="col">
                                                    <input type="number" class="form-control" id="pengali" name="pengali" min="0" max="100" required oninvalid="this.setCustomValidity('Please Input Diskon')" onchange="this.setCustomValidity('')">
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:right;" colspan="3">Total Akhir :</td>
                                            <td style="text-align:right;"><input type='number' class="form-control total_akhir" id="total_akhir" name="total_akhir" readonly></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:right;" colspan="4">
                                                <a href="<?= base_url('penjualan') ?>" class="btn btn-secondary pl-2 btn-sm"><i class="bi bi-backspace text-white"></i> Kembali</a>
                                                <button type="submit" name="insert" class="btn btn-success btn-sm"><i class="bi bi-save text-white"></i> Simpan</button>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content-admin'); ?>

<?= $this->section('content-script'); ?>
<script>
    // $(".select2").select2({
    //     theme: "bootstrap-5",
    //     containerCssClass: "select2--small",
    // });
    $(".hide").hide();
    $(document).ready(function() {
        $("body").on("keyup", "input", function(event) {
            var harga_hpp = $(this).closest(".line").find(".harga_hpp").val();
            var jumlah_beli = $(this).closest(".line").find(".jumlah_beli").val();
            var harga = $(this).closest(".line").find(".harga").val();
            var jumlah = jumlah_beli * harga_hpp;
            var sum = 0;
            $(this).closest(".line").find(".jumlah").val(jumlah);
            $('.jumlah').each(function() {
                sum += Number($(this).val());
            });
            $(".total").val(sum);
            // call_total_akhir(sum);
            // call_grand_total(sum);
        });

        $("body").on('change', 'select[id="id_barang_penjualan"]', function() {
            var id_barang_penjualan = $(this).closest(".line").find(".id_barang_penjualan").val();
            var harga_hpp = $(this).closest(".line").find(".harga_hpp");
            var harga_hpp_hide = $(this).closest(".line").find(".harga_hpp_hide");
            var harga_beli_hide = $(this).closest(".line").find(".harga_beli_hide");
            if (id_barang_penjualan != '') {
                $.ajax({
                    url: "<?= base_url('penjualan/fetch_harga') ?>",
                    method: "POST",
                    data: {
                        id_barang_penjualan: id_barang_penjualan,
                    },
                    dataType: 'json',
                    success: function(data) {
                        nilai_hpp = 10 / 100 * data;
                        nilai_akhir_hpp = parseInt(nilai_hpp) + parseInt(data);
                        harga_hpp.val(nilai_akhir_hpp);
                        harga_hpp_hide.val(nilai_akhir_hpp);
                        harga_beli_hide.val(data);
                    }
                });
            } else {
                $(this).closest(".line").find(".harga_hpp").val();
                $(this).closest(".line").find(".nilai_akhir_hpp").val();
                $(this).closest(".line").find(".harga_beli_hide").val();
            }
        });

        $(document).on('keyup', 'input[name=pengali]', function() {
            var _this = $(this);
            var min = parseInt(_this.attr('min')) || 0;
            var max = parseInt(_this.attr('max')) || 100;
            var val = parseInt(_this.val()) || (min - 1);
            if (val > max)
                _this.val(max);

            var pengali = $(this).val();
            var total = parseInt($("#total").val());
            var totalAmount = (pengali / 100) * total;
            var totalAkhir = parseInt(totalAmount) - +parseInt(total);
            let final = -totalAkhir;
            console.log(total);
            console.log(totalAmount);
            console.log(totalAkhir);
            console.log(final);
            $("#total_akhir").val(final);
        });

    });

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