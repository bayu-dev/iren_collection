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
                    <h4 class="box-title">Data Pembelian</h4>
                    <div class="pt-3 col-md-12 text-left">
                        <a href="<?= base_url('pembelian/add') ?>" type="button" class="btn btn-primary btn-sm"><i class="ti-plus"></i> Tambah</a>
                        <hr>
                    </div>
                    <table id="datatable" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID Pembelian</th>
                                <th>ID Supplier</th>
                                <th>Tanggal</th>
                                <!-- <th>Print</th> -->
                                <th class="text-center"><i class="fa fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pembelian as $pmb) : ?>
                                <tr>
                                    <td> <?= $pmb['id_pembelian'] ?> </td>
                                    <td> <?= $pmb['id_supplier'] . ' - ' . $pmb['nama_supplier'] ?> </td>
                                    <td> <?= format_indo($pmb['tanggal_pembelian']) ?> </td>
                                    <td class=" d-print-none text-center">
                                        <a href="<?= base_url('pembelian/detail/' . $pmb['id_pembelian']); ?>"><i class="fa fa-eye fa-lg text-info"></i></a>
                                        <!-- <a type="button" data-bs-toggle="modal" data-bs-target="#delete<?= $pmb['id_pembelian']; ?>">
                                                    <i class="mdi mdi-trash-can fa-lg text-danger"></i>
                                                </a> -->
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