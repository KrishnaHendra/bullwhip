<div class="container my-4">
    <div class="row">
        <div class="col">
            <div class="alert alert-primary font-weight-bold">
                <i class="fa fa-angle-right"></i> Data Pesanan
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
                                <td class="text-center">No</td>
                                <td>Nama Pemesan</td>
                                <td>Nama Barang</td>
                                <td class="text-center">Jumlah Pesanan</td>
                                <td class="text-center">Status</td>
                                <td class="text-center" width="20%">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($list as $l) : ?>
                                <tr>
                                    <td class="text-center font-weight-bold"><?= $no++; ?></td>
                                    <td class="text-capitalize"><?= $l['nama_pemesan'] ?></td>
                                    <td class="text-capitalize"><?= $l['nama_barang'] ?></td>
                                    <td class="font-weight-bold text-center"><?= $l['jumlah_pesanan'] ?></td>
                                    <td class="text-center">
                                        <?php if ($l['proses'] == 0) { ?>
                                            <span class="btn btn-sm btn-warning">Pending</span>
                                        <?php } else { ?>
                                            <span class="btn btn-sm btn-primary">Process</span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="#modalEdit<?= $l['id_pesanan'] ?>" data-toggle="modal" class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="#modalHapus<?= $l['id_pesanan'] ?>" data-toggle="modal" class="btn btn-sm btn-danger">
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
                <h5 class="modal-title" id="modalTambahTitle"><i class="fa fa-plus-circle"></i> Tambah Data Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('index.php/pemesanan/tambah') ?>" method="POST">
                    <div class="form-group">
                        <label for="nama_pemesan">Nama Pemesan</label>
                        <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <select name="id_barang" id="nama_barang" class="form-control" required>
                            <option value="">-- Pilih Barang --</option>
                            <?php foreach ($listBarang as $b) : ?>
                                <option value="<?= $b['id_barang'] ?>"><?= $b['nama_barang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_pesanan">Jumlah Pesanan</label>
                        <input type="text" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" required>
                    </div>
                    <input type="hidden" name="proses" value="0">
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
    <div class="modal fade" id="modalEdit<?= $l['id_pesanan'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalEdit<?= $l['id_pesanan'] ?>Title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEdit<?= $l['id_pesanan'] ?>Title"><i class="fa fa-plus-circle"></i> Tambah Data Bagian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('index.php/pemesanan/edit') ?>" method="POST">
                        <input type="hidden" name="field_name" value="id_pesanan">
                        <input type="hidden" name="id" value="<?= $l['id_pesanan'] ?>">
                        <div class="form-group">
                            <label for="nama_pemesan">Nama Pemesan</label>
                            <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" value="<?= $l['nama_pemesan'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <select name="id_barang" id="nama_barang" class="form-control" required>
                                <option value="">-- Pilih Barang --</option>
                                <?php foreach ($listBarang as $b) : ?>
                                    <option value="<?= $b['id_barang'] ?>" <?php if ($b['id_barang'] == $l['id_barang']) echo "selected"; ?>><?= $b['nama_barang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_pesanan">Jumlah Pesanan</label>
                            <input type="text" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" value="<?= $l['jumlah_pesanan'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="proses">Status Pesanan</label>
                            <select name="proses" id="proses" class="form-control" required>
                                <?php if ($l['proses'] == 0) { ?>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="0" selected>Pending</option>
                                    <option value="1">Proses</option>
                                <?php } else if ($l['proses'] == 1) { ?>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="0">Pending</option>
                                    <option value="1" selected>Proses</option>
                                <?php } else { ?>
                                    <option value="" selected>-- Pilih Status --</option>
                                    <option value="0">Pending</option>
                                    <option value="1">Proses</option>
                                <?php } ?>
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
    <div class="modal fade" id="modalHapus<?= $l['id_pesanan'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapus<?= $l['id_pesanan'] ?>Title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapus<?= $l['id_pesanan'] ?>Title"><i class="fa fa-trash-alt"></i> Hapus Data Bagian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="<?= base_url('assets/gambar/delete_logo.svg') ?>" alt="img" width="250px"> <br><br>
                    Apakah anda yakin akan menghapus data ini?
                    <form action="<?= base_url('index.php/pemesanan/hapus') ?>" method="POST">
                        <input type="hidden" name="field_name" value="id_pesanan">
                        <input type="hidden" name="id" value="<?= $l['id_pesanan'] ?>">
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