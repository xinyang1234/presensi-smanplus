<div class="page-container">
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h1 class="mb-4 font-weight-bold">Daftar Mata Pelajaran</h1>
                                </div>
                            </div>
                            <?php Flasher::flash(); ?>
                            <div class="row">

                                <div class="col-lg-1 col-md-12 my-2">
                                    <button type="button" class="btn btn-success tampilModalTambah" style="width: 100%;" data-toggle="modal" data-target="#modal-tambah-kelas">
                                        <i class=" anticon anticon-plus" style="width: 100%;"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="m-t-10">
                                <div class="row">
                                    <?php foreach ($data['mapel'] as $mapel) : ?>
                                        <div class="col-md-6 col-lg-4">

                                            <div class="card" style="border: 1px solid #E1E1E1;">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <?php
                                                        $id = $mapel['id_mapel'];
                                                        $nama = $mapel['nama_mapel'];
                                                        ?>
                                                        <h3 class="mt-2 font-weight-bold"><?= $nama ?></h3>
                                                        <a href="" class="tampilModalUbah" data-toggle="modal" title="Ubah Nama" data-target="#modal-tambah-kelas" id="btn-ubah-kelas" data-id="<?= $mapel['id_mapel']; ?>">
                                                            <i class="anticon anticon-edit" style="font-size: 20px;"></i>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Tambah Kelas Modal -->
                            <div class="modal fade" id="modal-tambah-kelas">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="formModalLabel">Tambah Mata Pelajaran</h5>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <i class="anticon anticon-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url; ?>mapel/tambah_mapel" method="post">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="material-icons">book</i></span>
                                                    </div>
                                                    <input type="hidden" name="id_kelas" id="id_kelas">
                                                    <input type="text" class="form-control" id="txtNamaKelas" name="mapel" placeholder="Nama Mata Pelajaran" aria-label="Nama Kelas" aria-describedby="basic-addon1" required>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                            <button type="submit" name="tambah_mapel" class="btn btn-success">Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Wrapper END -->
    </div>
</div>