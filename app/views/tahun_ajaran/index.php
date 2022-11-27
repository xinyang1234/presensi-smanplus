<div class="page-container">
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h1 class="mb-4 font-weight-bold">Tahun Ajaran</h1>
                                </div>
                            </div>
                            <?php Flasher::flash(); ?>
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
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 10%;">No</th>
                                                <th scope="col" style="width: 10%;">ID</th>
                                                <th scope="col" style="width: 30%;">Tahun Ajaran</th>
                                                <th scope="col">Status</th>
                                                <th scope="col" style="width: 40%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            if (!empty($data['tahun_ajaran'])) {
                                                foreach ($data['tahun_ajaran'] as $ajaran) : ?>
                                                    <tr>

                                                        <th scope="row"><?= $no ?></th>
                                                        <td><?= $ajaran['id_tahun_ajaran']; ?></td>
                                                        <td><?= $ajaran['tahun_ajaran']; ?></td>
                                                        <td><?php
                                                            if ($ajaran['isActive'] != 1) {
                                                                echo '<span class="badge badge-danger">Tidak Aktif</span>';
                                                            } else {
                                                                echo '<span class="badge badge-success">Aktif</span>';
                                                            }

                                                            ?></td>
                                                        <td>
                                                            <?php
                                                            if ($ajaran['isActive'] != 1) {
                                                                echo '<button type="button" data-id="' . $ajaran['id_tahun_ajaran'] . '" data-tahun="' . $ajaran['tahun_ajaran'] . '" class="btn btn-success w-40 btnActive" data-toggle="modal" data-target="#modal_aktif">
                                                                Aktifkan
                                                            </button>';
                                                            } else {
                                                                echo '<button type="disable" class="btn btn-success w-40 disabled text-success" style="cursor: not-allowed;" disabled>
                                                                Sudah Aktif
                                                            </button>';
                                                            }
                                                            ?>
                                                            <button type="button" class="btn btn-warning" id="btn-ubah-siswa" name="active" data-toggle="modal">
                                                                <i class="anticon anticon-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#">
                                                                <i class="anticon anticon-delete"></i>
                                                            </button>
                                                        </td>

                                                    </tr>
                                            <?php $no++;
                                                endforeach;
                                            } else {
                                                echo '<div class="alert alert-warning">
                                                Data Tahun Ajaran <strong>Kosong</strong>! <a href="' . base_url . 'tahun_ajaran">Klik di sini untuk menambahkan</a>
                                            </div>';
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>



                            <!-- Modal -->
                            <div class="modal fade" id="modal_aktif">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tahun Ajaran</h5>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <i class="anticon anticon-close"></i>
                                            </button>
                                        </div>
                                        <form action="<?= base_url; ?>tahun_ajaran/setActive" method="post">
                                            <div class="modal-body">
                                                <p>Aktifkan Tahun Ajaran ini?</p>
                                                <input type="hidden" id="get_id_tahun_modal" name="id_tahun" value="">
                                                <p class="d-inline" id="id_tahun_modal"></p><span> - </span>
                                                <p class="d-inline" id="tahun_ajaran"></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="submit_active" class="btn btn-success">Ya</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Ubah Kelas Modal -->
                            <!-- <div class="modal fade" id="ubah-kelas">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ubah Kelas</h5>
                      <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                      </button>
                    </div>
                    <form action="<?php //base_url; 
                                    ?>/kelas/update" method="POST" enctype="multipart/form-data">
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
                        <button type="submit" class="btn btn-success" name="submit">Simpan</button>
                        <input type="submit" class="btn btn-success" name="submit" value="Simpan">
                      </div>
                    </form>
                  </div>
                </div>
              </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Wrapper END -->
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.btnActive').on('click', function() {
            // console.log('CLICKED 155');
            // $('#id_kelas_modal').data('id')
            console.log($(this).data('id'));
            $('#id_tahun_modal').html($(this).data('id'));
            $('#tahun_ajaran').html($(this).data('tahun'));
            $('#get_id_tahun_modal').val($(this).data('id'));
        });

        //CONETEKAN
        $('.tampilModalTambah').on('click', function() {
            // console.log('CLICKED');
            $('#formModalLabel').html('Tambah Kelas');
            $('#txtNamaKelas').val("");
        });

        $('.tampilModalUbah').on('click', function() {
            // console.log('CLICKED');
            $('#formModalLabel').html('Ubah Kelas');
            $('.modal-body form').attr('action', 'http://localhost/presensi-smanplus/kelas/ubah');
            const id = $(this).data('id');
            // console.log(id);
            $.ajax({
                url: 'http://localhost/presensi-smanplus/kelas/getUbah',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#txtNamaKelas').val(data.nama_kelas);
                    $('#id_kelas').val(data.id_kelas);
                }
            });
        });
    });
</script>