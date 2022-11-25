<div class="page-container">
  <div class="main-content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h1 class="mb-5 font-weight-bold">Daftar Kelas</h1>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-10 col-md-12 my-2">
                  <div class="form-group">
                    <input type="text" style="width: 100%;" class="form-control" id="formGroupExampleInput" placeholder="Cari Kelas">
                  </div>
                </div>
                <div class="col-lg-1 col-md-12 my-2">
                  <button class="btn btn-success" style="width: 100%;">
                    <i class="anticon anticon-search" style="width: 100%;"></i>
                  </button>
                </div>
                <div class="col-lg-1 col-md-12 my-2">
                  <button type="button" class="btn btn-primary" style="width: 100%;" data-toggle="modal" data-target="#btn-tambah-kelas">
                    <i class=" anticon anticon-plus" style="width: 100%;"></i>
                  </button>
                </div>
              </div>

              <!-- <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                <span>Tahun Ajaran</span>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">2020/2021</a>
                                                <a class="dropdown-item" href="#">2021/2022</a>
                                                <a class="dropdown-item" href="#">2022/2023</a>
                                            </div>
                                        </div> -->
              <div class="m-t-10">
                <div class="row">
                  <?php foreach ($data['jadwal'] as $kelas) : ?>
                    <div class="col-md-6 col-lg-4">

                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <?php
                              $id = $kelas['id_kelas'];
                              $nama = $kelas['nama_kelas'];
                              ?>
                              <p class="mb-3"><?= $kelas['nama_kelas'] ?><span><a href="" data-toggle="modal" data-name="<?= $kelas['nama_kelas'] ?>" data-id="<?= $kelas['id_kelas'] ?>" id="btn-ubah-kelas"><i class="anticon anticon-edit"></i></a></span></p>
                              <h2 class="m-b-0">
                                <span><?php
                                      // foreach ($data['jumlah_siswa'] as $isi) {
                                      //   for ($i = 0; $i < count($data['jumlah_siswa']); $i++) {
                                      //     if ($kelas->id_kelas === $isi[0]->id_kelas) {
                                      //       if (count($isi) > 0) {
                                      //         echo count($isi);
                                      //       } else if (count($isi) === 0) {
                                      //         echo 0;
                                      //         echo $isi[0]->id_kelas;
                                      //       } else if (count($isi) === null) {
                                      //         echo 0;
                                      //       }
                                      //       break;
                                      //     }
                                      //   }
                                      // }
                                      ?></span>
                              </h2>
                              <p>Siswa</p>

                            </div>
                            <a href="<?= base_url; ?>/kelas/detail/<?= $kelas['id_kelas'] ?>">
                              <div class="avatar avatar-icon avatar-lg avatar-white">
                                <i class="anticon anticon-form text-success"></i>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>

              <!-- Tambah Kelas Modal -->
              <div class="modal fade" id="btn-tambah-kelas">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                      <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="material-icons">groups</i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Nama Kelas" aria-label="Nama Kelas" aria-describedby="basic-addon1">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                      <button type="button" class="btn btn-success">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Ubah Kelas Modal -->
              <div class="modal fade" id="ubah-kelas">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ubah Kelas</h5>
                      <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                      </button>
                    </div>
                    <form action="<?= base_url; ?>/kelas/update" method="POST" enctype="multipart/form-data">
                      <div class="modal-body">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="material-icons">groups</i></span>
                          </div>
                          <input type="hidden" class="form-control" id="id_kelas" name="id_kelas" value="">
                          <input type="text" class="form-control" placeholder="Nama Kelas" aria-label="Nama Kelas" aria-describedby="basic-addon1" id="nama_kelas" name="nama_kelas" value="">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <!-- <button type="submit" class="btn btn-success" name="submit">Simpan</button> -->
                        <input type="submit" class="btn btn-success" name="submit" value="Simpan">
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