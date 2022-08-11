<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>


<div id="wrapper" class="col-8 mx-auto">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-12">
                <div class="box-content">
                    <h4 class="box-title">Data Kategori</h4>
                    <div class="pt-3 col-md-12 text-left">
                        <a type="button" class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#add"><i class="mdi mdi-plus"></i> Tambah</a>
                        <hr>
                    </div>
                    <table id="datatable" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID Kategori</th>
                                <th>Nama Kategori</th>
                                <th class="text-center"><i class="fa fa-cog fa-spin"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kategori as $data) : ?>
                                <tr>
                                    <td>
                                        <?= $data['id_kategori'] ?>
                                    </td>
                                    <td>
                                        <?= $data['nama_kategori'] ?>
                                    </td>
                                    <td class="text-center">
                                        <a type="button" data-toggle="modal" data-target="#edit<?= $data['id_kategori']; ?>"><i class="fa fa-edit fa-lg text-warning"></i></a>
                                        <a type="button" data-toggle="modal" data-target="#delete<?= $data['id_kategori']; ?>">
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

<div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myCenterModalLabel">Tambah <?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('kategori/add') ?>" method="POST" class="no-validated">
                    <?= csrf_field(); ?>
                    <div>
                        <div class="mb-3">
                            <label class="form-label">ID Kategori</label>
                            <input type="text" class="form-control " name="id_kategori" value="<?= $id_kategori ?>" autocomplete="off" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori" autocomplete="off" required>
                        </div>
                        <div class="mb-2 mt-1">
                            <div class="float-right d-none d-sm-block">
                                <button href="#" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Batal</button>
                                <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-move fa-lg"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php foreach ($kategori as $data) : ?>
    <div id="edit<?php echo $data['id_kategori']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myCenterModalLabel">Edit <?= $title ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('kategori/edit') ?>" method="POST" class="no-validated">
                        <div>
                            <div class="mb-3">
                                <label class="form-label">ID Kategori</label>
                                <input type="text" class="form-control" id="nama_kategori<?= $data['id_kategori'] ?>" name="id_kategori" value="<?= $data['id_kategori'] ?>" autocomplete="off" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" id="nama_kategori<?= $data['nama_kategori'] ?>" name="nama_kategori" value="<?= $data['nama_kategori'] ?>" autocomplete="off" required>
                            </div>
                            <div class="mb-2 mt-1">
                                <div class="float-right d-none d-sm-block">
                                    <button href="#" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Batal</button>
                                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-move fa-lg"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach ?>

<?php foreach ($kategori as $data) : ?>
    <form action="<?= base_url('kategori/delete') ?>" method="post">
        <div id="delete<?php echo $data['id_kategori']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0">Apa Kamu Yakin ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                    <div class="modal-body">
                        <div class="mb-2 mt-1">
                            <div class="float-right d-none d-sm-block">
                                <input type="hidden" name="id_kategori" value="<?= $data['id_kategori'] ?>">
                                <button href="#" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Batal</button>
                                <button href="#" class="btn btn-danger" type="submit"><i class="mdi mdi-trash-can fa-lg"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
<?php endforeach ?>



<?= $this->endSection('content-admin'); ?>