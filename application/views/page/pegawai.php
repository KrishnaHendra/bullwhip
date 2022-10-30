<div class="container my-4">
    <div class="row">
        <div class="col">
            <div class="alert alert-primary font-weight-bold">
                <i class="fa fa-angle-right"></i> Data Pegawai
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
                                <td class="text-center font-weight-bold" width="">No</td>
                                <td>Username</td>
                                <td>Password</td>
                                <td>Nama Pegawai</td>
                                <td>Alamat</td>
                                <td>No.HP</td>
                                <td>Bagian</td>
                                <td class="text-center" width="20%">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($list as $l) : ?>
                                <tr>
                                    <td class="text-center font-weight-bold"><?= $no++ ?></td>
                                    <td><?= $l['username'] ?></td>
                                    <td><?= $l['password'] ?></td>
                                    <td class="text-capitalize"><?= $l['nama_pegawai'] ?></td>
                                    <td class="text-capitalize"><?= $l['alamat_pegawai'] ?></td>
                                    <td><?= $l['hp_pegawai'] ?></td>
                                    <td>
                                        <?php foreach ($listBagian as $b) : ?>
                                            <?php
                                            if ($b['id_bagian'] == $l['id_bagian']) {
                                                echo $b['nama_bagian'];
                                            }
                                            ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="#modalEdit<?= $l['id_pegawai'] ?>" data-toggle="modal" class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="#modalHapus<?= $l['id_pegawai'] ?>" data-toggle="modal" class="btn btn-sm btn-danger">
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
                <h5 class="modal-title" id="modalTambahTitle"><i class="fa fa-plus-circle"></i> Tambah Data Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('index.php/pegawai/tambah') ?>" method="POST">
                    <div class="form-group">
                        <label for="nama_pegawai">Nama Pegawai</label>
                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_pegawai">Alamat Pegawai</label>
                        <input type="text" class="form-control" id="alamat_pegawai" name="alamat_pegawai" required>
                    </div>
                    <div class="form-group">
                        <label for="hp_pegawai">Nomor HP</label>
                        <input type="number" class="form-control" id="hp_pegawai" name="hp_pegawai" required>
                    </div>
                    <div class="form-group">
                        <label for="hp_pegawai">Bagian Pegawai</label>
                        <select name="id_bagian" class="form-control">
                            <option value="">-- Pilih Bagian --</option>
                            <?php foreach ($listBagian as $b) : ?>
                                <option value="<?= $b['id_bagian'] ?>"><?= $b['nama_bagian'] ?></option>
                            <?php endforeach; ?>
                        </select>
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
    <div class="modal fade" id="modalEdit<?= $l['id_pegawai'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalEdit<?= $l['id_pegawai'] ?>Title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEdit<?= $l['id_pegawai'] ?>Title"><i class="fa fa-plus-circle"></i> Tambah Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('index.php/pegawai/edit') ?>" method="POST">
                        <input type="hidden" name="field_name" value="id_pegawai">
                        <input type="hidden" name="id" value="<?= $l['id_pegawai'] ?>">
                        <div class="form-group">
                            <label for="nama_pegawai">Nama Pegawai</label>
                            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?= $l['nama_pegawai'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $l['username'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password" value="<?= $l['password'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat_pegawai">Alamat Pegawai</label>
                            <input type="text" class="form-control" id="alamat_pegawai" name="alamat_pegawai" value="<?= $l['alamat_pegawai'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="hp_pegawai">Nomor HP</label>
                            <input type="number" class="form-control" id="hp_pegawai" name="hp_pegawai" value="<?= $l['hp_pegawai'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="hp_pegawai">Bagian Pegawai</label>
                            <select name="id_bagian" class="form-control">
                                <option value="">-- Pilih Bagian --</option>
                                <?php foreach ($listBagian as $b) : ?>
                                    <option value="<?= $b['id_bagian'] ?>" <?php if ($b['id_bagian'] == $l['id_bagian']) {
                                                                                echo "selected";
                                                                            } ?>><?= $b['nama_bagian'] ?></option>
                                <?php endforeach; ?>
                            </select>
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
    <div class="modal fade" id="modalHapus<?= $l['id_pegawai'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapus<?= $l['id_pegawai'] ?>Title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapus<?= $l['id_pegawai'] ?>Title"><i class="fa fa-trash-alt"></i> Hapus Data Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="<?= base_url('assets/gambar/delete_logo.svg') ?>" alt="img" width="250px"> <br><br>
                    Apakah anda yakin akan menghapus data ini?
                    <form action="<?= base_url('index.php/pegawai/hapus') ?>" method="POST">
                        <input type="hidden" name="field_name" value="id_pegawai">
                        <input type="hidden" name="id" value="<?= $l['id_pegawai'] ?>">
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