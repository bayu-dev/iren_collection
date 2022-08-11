<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>


<div id="wrapper" class="pt-5">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-12">
                <div class="box-content">
                    <form action="<?= site_url('jurnal/filter') ?>" method="post">
                        <div class="row">
                            <div class="col-md-7">
                                <input type="text" class="form-control choose_month" name="start_date" autocomplete="off" placeholder="Pilih Bulan">
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
                                    <b>JURNAL UMUM</b>
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
                                <th>ID Jurnal</th>
                                <th>Tanggal</th>
                                <th>Akun</th>
                                <th class=" text-center">Reff</th>
                                <th class="text-center">Debet</th>
                                <th class="text-center">Kredit</th>
                            </tr>
                        </thead>
                        <?php
                        $total_debit = 0;
                        $total_kredit = 0;
                        ?>
                        <tbody>
                            <?php foreach ($data_jurnals as $data_jurnal) :
                                $total_debit += $data_jurnal->debet;
                                $total_kredit += $data_jurnal->kredit;
                            ?>
                                <tr>
                                    <td width="100">
                                        <?= $data_jurnal->id_jurnal ?>
                                    </td>
                                    <td width="100">
                                        <?= format_indo($data_jurnal->tanggal) ?>
                                    </td>
                                    <?php if ($data_jurnal->posisi == 'd') : ?>
                                        <td class="text" width="250">
                                            <?= $data_jurnal->nama_akun ?>
                                        </td>
                                    <?php else : ?>
                                        <td class="text pl-5" width="250">
                                            <?= $data_jurnal->nama_akun ?>
                                        </td>
                                    <?php endif; ?>
                                    <td width="100" class="text-center">
                                        <?= $data_jurnal->id_akun ?>
                                    </td>
                                    <td width="100" class="text-right">
                                        <?= nominal($data_jurnal->debet) ?>
                                    </td>
                                    <td width="100" class="text-right">
                                        <?= nominal($data_jurnal->kredit) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th class="text-right"><?= nominal($total_debit) ?></th>
                                <th class="text-right"><?= nominal($total_kredit) ?></th>
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