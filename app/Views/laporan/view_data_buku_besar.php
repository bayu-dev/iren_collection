<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>


<div id="wrapper" class="pt-5">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-12">
                <div class="box-content">
                    <form action="<?= site_url('bukuBesar/filter') ?>" method="post">
                        <div class="row">
                            <div class="col-md-5">
                                <input type="text" class="form-control choose_month" name="start_date" autocomplete="off" placeholder="Pilih Bulan" required>
                            </div>
                            <div class="col-md-5">
                                <select name="id_akun" class="form-control" required>
                                    <option value="" disabled selected>- - - Pilih Akun - - -</option>
                                    <?php foreach ($list_akun as $list) { ?>
                                        <option value="<?= $list['id_akun'] ?>"><?= $list['id_akun'] . " - " . $list['nama_akun'] ?></option>
                                    <?php } ?>
                                </select>
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
                                    <b>BUKU BESAR</b>
                                </div>
                                <div class="col-sm-12" style="background-color:white;" align="center">
                                    <b>Periode <?= bulan($date)  ?> <?= $year ?></b>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <table class="table table-striped table-bordered display" style="width:100%">
                        <p style="text-align:left;">
                            Nomor Akun : <?= $id_akun ?>
                            <span class="pr-3" style="float:right;">
                                Nama Akun : <?= $nama_akun ?>
                            </span>
                        </p>
                        <thead>
                            <tr class="bg-dark-light">
                                <th rowspan="2">Tanggal</th>
                                <th rowspan="2">Nama Akun</th>
                                <th rowspan="2">No Akun</th>
                                <th rowspan="2" class="text-center">Debet</th>
                                <th rowspan="2" class="text-center">Kredit</th>
                                <th colspan="2" class="text-center">Saldo </th>
                            </tr>
                            <tr class="bg-dark-light">
                                <th class="text-center">Debet</th>
                                <th class="text-center">Kredit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>-</td>
                                <td style="background-color: #eee">Saldo Awal</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <?php
                                $db = 0;
                                $kr = 0;
                                if ($posisi_saldo_normal == 'd') {
                                    echo "<td class='text-right'>" . nominal((float)$saldo_awal) . "</td>";
                                    echo "<td>-</td>";
                                    $saldo_debet = $saldo_awal;
                                    $saldo_kredit = 0;
                                } else {
                                    echo "<td>-</td>";
                                    echo "<td style='background-color: #eee' class='text-right'>" . nominal((float)$saldo_awal) . "</td>";
                                    $saldo_debet = 0;
                                    $saldo_kredit = $saldo_awal;
                                }
                                ?>
                            </tr>
                            <?php
                            //echo $saldo_debet."-".$saldo_kredit."<br>";
                            if (!empty($buku_besar)) :
                                foreach ($buku_besar as $cacah) :
                                    echo "<tr>";
                                    echo "<td>" . $cacah['tanggal'] . "</td>";
                                    echo "<td>" . $cacah['transaksi'] . "</td>";
                                    echo "<td>" . $cacah['id_jurnal'] . "</td>";
                                    $db = $db + $cacah['nominal'];

                                    //untuk posisi d c dari jurnal adalah debet / d
                                    if (strcmp($cacah['posisi'], 'd') == 0) {
                                        // if ($saldo_debet >= $cacah['nominal']) {
                                        echo "<td class='text-right'>" . nominal((float)$cacah['nominal']) . "</td>";
                                        echo "<td>-</td>";

                                        //jika posisi saldo normal ada di debet, maka di tambah dan ditampilkan ke posisi debet
                                        if (strcmp($posisi_saldo_normal, 'd') == 0) {
                                            $saldo_debet = $saldo_debet  + $cacah['nominal'];
                                            echo "<td class='text-right'>" . nominal((float)$saldo_debet) . "</td>";
                                            if ($saldo_kredit == 0) {
                                                echo "<td class='text-right'>" . '-' . "</td>";
                                            } else {
                                                echo "<td class='text-right'>" . nominal((float)$saldo_kredit) . "</td>";
                                            }
                                        } else {
                                            $saldo_kredit = $saldo_kredit  - $cacah['nominal'];
                                            if ($saldo_debet == 0) {
                                                echo "<td class='text-right'>" . '-' . "</td>";
                                            } else {
                                                echo "<td class='text-right'>" . ((float)$saldo_debet) . "</td>";
                                            }
                                            echo "<td class='text-right'>" . nominal((float)$saldo_kredit) . "</td>";
                                        }
                                    } else {
                                        $kr = $kr + $cacah['nominal'];

                                        //jika posisi d c dari jurnal adalah kredit / c
                                        echo "<td>-</td>";
                                        echo "<td class='text-right'>" . nominal((float)$cacah['nominal']) . "</td>";

                                        if (strcmp($posisi_saldo_normal, 'd') == 0) {
                                            $saldo_debet = $saldo_debet  - $cacah['nominal'];
                                            echo "<td class='text-right'>" . nominal((float)$saldo_debet) . "</td>";
                                            if ($saldo_kredit == 0) {
                                                echo "<td class='text-right'>" . '-' . "</td>";
                                            } else {
                                                echo "<td class='text-right'>" . nominal((float)$saldo_kredit) . "</td>";
                                            }
                                        } else {
                                            $saldo_kredit = $saldo_kredit  + $cacah['nominal'];
                                            if ($saldo_debet == 0) {
                                                echo "<td class='text-right'>" . '-' . "</td>";
                                            } else {
                                                echo "<td class='text-right'>" . ((float)$saldo_debet) . "</td>";
                                            }
                                            echo "<td class='text-right'>" . nominal((float)$saldo_kredit) . "</td>";
                                        }
                                    }
                                    echo "</tr>";
                                endforeach;
                                if (strcmp($posisi_saldo_normal, 'd') == 0) {
                                    $saldo_akhir = $saldo_debet - $saldo_kredit;
                                } else {
                                    $saldo_akhir = $saldo_kredit - $saldo_debet;
                                }
                            ?>
                        </tbody>
                        <tfoot>

                            <tr>
                                <td>-</td>
                                <td style="background-color: #eee">Saldo Akhir</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <?php
                                $db = 0;
                                $kr = 0;
                                if ($posisi_saldo_normal == 'd') {
                                    echo "<td class='text-right'>" . nominal((float)$saldo_akhir) . "</td>";
                                    echo "<td>-</td>";
                                } else {
                                    echo "<td>-</td>";
                                    echo "<td style='background-color: #eee' class='text-right'>" . nominal((float)$saldo_akhir) . "</td>";
                                }
                                ?>
                            </tr>
                        <?php endif; ?>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-content -->
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content-admin'); ?>