<div class="container my-4">
    <div class="row">
        <div class="col">
            <div class="alert alert-primary font-weight-bold">
                <i class="fa fa-angle-right"></i> Data Bagian
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 my-auto">
                            Total : <?= count($list) ?>
                        </div>
                        <div class="col-6 text-right my-auto">
                            <a href="#modalTambah" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> Tambah Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-light">
                            <tr>
                                <td class="text-center" width="10%%">Id Bagian</td>
                                <td>Nama Bagian</td>
                                <td class="text-center" width="20%">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $l) : ?>
                                <tr>
                                    <td class="text-center"><?= $l['id_bagian'] ?></td>
                                    <td class="text-capitalize"><?= $l['nama_bagian'] ?></td>
                                    <td class="text-center">
                                        <a href="#modalEdit<?= $l['id_bagian'] ?>" data-toggle="modal" class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="#modalHapus<?= $l['id_bagian'] ?>" data-toggle="modal" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahTitle"><i class="fa fa-plus-circle"></i> Tambah Data Bagian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('index.php/bagian/tambah') ?>" method="POST">
                    <div class="form-group">
                        <label for="nama_bagian">Nama Bagian</label>
                        <input type="text" class="form-control" id="nama_bagian" name="nama_bagian" aria-describedby="namaBagianHelp" required>
                        <small id="namaBagianHelp" class="form-text text-muted">Masukkan nama bagian.</small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<?php foreach ($list as $l) : ?>
    <div class="modal fade" id="modalEdit<?= $l['id_bagian'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalEdit<?= $l['id_bagian'] ?>Title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEdit<?= $l['id_bagian'] ?>Title"><i class="fa fa-plus-circle"></i> Tambah Data Bagian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('index.php/bagian/edit') ?>" method="POST">
                        <input type="hidden" name="field_name" value="id_bagian">
                        <input type="hidden" name="id" value="<?= $l['id_bagian'] ?>">
                        <div class="form-group">
                            <label for="nama_bagian">Nama Bagian</label>
                            <input type="text" class="form-control" id="nama_bagian" name="nama_bagian" value="<?= $l['nama_bagian'] ?>" aria-describedby="namaBagianHelp" required>
                            <small id="namaBagianHelp" class="form-text text-muted">Masukkan nama bagian.</small>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Hapus -->
<?php foreach ($list as $l) : ?>
    <div class="modal fade" id="modalHapus<?= $l['id_bagian'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapus<?= $l['id_bagian'] ?>Title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapus<?= $l['id_bagian'] ?>Title"><i class="fa fa-trash-alt"></i> Hapus Data Bagian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="<?= base_url('assets/gambar/delete_logo.svg') ?>" alt="img" width="250px"> <br><br>
                    Apakah anda yakin akan menghapus data ini?
                    <form action="<?= base_url('index.php/bagian/hapus') ?>" method="POST">
                        <input type="hidden" name="field_name" value="id_bagian">
                        <input type="hidden" name="id" value="<?= $l['id_bagian'] ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>