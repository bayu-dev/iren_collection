<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>


<!-- <div class="page">
    <ul class="navbar-nav mr-auto hidden-xs">
        <li class="nav-item page-header">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active">COA</li>
            </ul>
        </li>
    </ul>
</div> -->


<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-12">
                <div class="box-content">
                    <h4 class="box-title">Data Penjualan</h4>
                    <div class="pt-3 col-md-12 text-left">
                        <a href="<?= base_url('penjualan/add') ?>" type="button" class="btn btn-primary btn-sm"><i class="ti-plus"></i> Tambah</a>
                        <hr>
                    </div>
                    <table id="datatable" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID Penjualan</th>
                                <th>Tanggal</th>
                                <th class="text-center"><i class="fa fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($penjualan as $pnj) : ?>
                                <tr>
                                    <td> <?= $pnj['id_penjualan'] ?> </td>
                                    <td> <?= format_indo($pnj['tanggal_penjualan']) ?> </td>
                                    <td class="d-print-none text-center">
                                        <a href="<?= base_url('penjualan/detail/' . $pnj['id_penjualan']); ?>"><i class="fa fa-eye fa-lg text-info"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-content -->
            </div>
        </div>
    </div>
</div>



<?= $this->endSection('content-admin'); ?>