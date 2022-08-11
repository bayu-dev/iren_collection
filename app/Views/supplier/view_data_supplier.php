<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>


<div id="wrapper" class="pt-5">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-12">
                <div class="box-content">
                    <h4 class="box-title">Data Supplier</h4>
                    <div class="pt-3 col-md-12 text-left">
                        <a href="<?= base_url('supplier/add') ?>" type="button" class="btn btn-primary btn-sm"><i class="ti-plus"></i> Tambah</a>
                        <hr>
                    </div>
                    <table id="datatable" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                            <tr>
                                <th>ID Supplier</th>
                                <th>Nama Supplier</th>
                                <th>Alamat</th>
                                <th>No telp</th>
                                <th class="text-center"><i class="fa fa-cog fa-spin"></i></th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($supplier as $supp) : ?>
                                <tr>
                                    <td>
                                        <?= $supp['id_supplier'] ?>
                                    </td>
                                    <td>
                                        <?= $supp['nama_supplier'] ?>
                                    </td>
                                    <td>
                                        <?= $supp['alamat'] ?>
                                    </td>
                                    <td>
                                        <?= $supp['no_telp'] ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('supplier/edit/' . $supp['id_supplier']) ?>" type="button"><i class="fa fa-edit fa-lg text-warning"></i></a>
                                        <a href="#" type="button" data-toggle="modal" data-target="#delete<?php echo $supp['id_supplier']; ?>">
                                            <i class="fa fa-trash fa-lg text-danger"></i>
                                        </a>
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