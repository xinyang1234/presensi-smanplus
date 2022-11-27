            <div class="page-container">
            	<!-- Content Wrapper START -->
            	<div class="main-content">
            		<div class="container">
            			<div class="row">
            				<div class="col-md-12">
            					<div class="card">
            						<div class="card-body">
            							<div class="d-flex justify-content-between align-items-center">
            								<div>
            									<h1 class="mb-5 font-weight-bold">Daftar Siswa</h1>
            								</div>
            								<div>
            									<h1 class="mb-5 font-weight-bold">
            										<?php
													if (!empty($data['kelas']['nama_kelas'])) {
														echo $data['kelas']['nama_kelas'];
													} else {
														echo '';
													}
													?></h1>
            								</div>
            							</div>
            							<div class="row">
            								<div class="col-lg-10 col-md-12 my-1">
            									<div class="form-group">
            										<input type="text" style="width: 100%;" class="form-control" id="formGroupExampleInput" placeholder="Cari Siswa">
            									</div>
            								</div>
            								<div class="col-lg-1 col-md-12 my-2">
            									<button class="btn btn-success" style="width: 100%;">
            										<i class="anticon anticon-search" style="width: 100%;"></i>
            									</button>
            								</div>
            								<div class="col-lg-1 col-md-12 my-2">
            									<button type="button" class="btn btn-primary tampilModalTambah" data-toggle="modal" style="width: 100%;" data-target="#exampleModal">
            										<i class="anticon anticon-plus" style="width: 100%;"></i>
            									</button>
            								</div>
            							</div>
            							<?php Flasher::flash() ?>
            							<div class="">
            								<div class="table-responsive">
            									<table class="table">
            										<thead>
            											<tr>
            												<th scope="col" style="width: 20px;">No</th>
            												<th scope="col" style="width: 120px;">NIS</th>
            												<th scope="col">Nama</th>
            												<th scope="col" style="width: 80px;">Jenis Kelamin</th>
            												<th scope="col" style="width: 150px; text-align: center;">Tahun Masuk</th>
            												<th scope="col" style="width: 150px; text-align: center;">Ubah / Hapus</th>
            											</tr>
            										</thead>
            										<tbody>
            											<?php
														$no = 1;
														if (!empty($data['detail_kelas'])) {
															foreach ($data['detail_kelas'] as $siswa) : ?>
            													<tr>
            														<th scope="row"><?= $no ?></th>
            														<td><?= $siswa['nis']; ?></td>
            														<td><?= $siswa['nama_siswa']; ?></td>
            														<td><?= $siswa['jenis_kelamin']; ?></td>
            														<td><?= $siswa['tahun_masuk']; ?></td>
            														<td>
            															<button type="button" data-id="<?= $siswa['nis'] ?>" class="btn btn-warning tampilModalUbah" id="btn-ubah-siswa" data-toggle="modal" data-target="#exampleModal">
            																<i class="anticon anticon-edit"></i>
            															</button>
            															<button type="button" data-id="<?= $siswa['nis'] ?>" data-nama="<?= $siswa['nama_siswa'] ?>" class="btn btn-danger tampilModalHapus" data-toggle="modal" data-target="#model_hapus_siswa">
            																<i class="anticon anticon-delete"></i>
            															</button>
            														</td>
            													</tr>
            											<?php $no++;
															endforeach;
														} else {
															echo '';
														} ?>
            										</tbody>
            									</table>
            								</div>
            							</div>
            							<!-- Tambah Siswa Modal -->
            							<div class="modal fade" id="exampleModal">
            								<div class="modal-dialog">
            									<div class="modal-content">
            										<form action="<?= base_url; ?>kelas/tambah_siswa" method="POST">
            											<div class="modal-header">
            												<h5 class="modal-title" id="formModalLabel">Tambah Siswa</h5>
            												<button type="button" class="close" data-dismiss="modal">
            													<i class="anticon anticon-close"></i>
            												</button>
            											</div>
            											<div class="modal-body">
            												<!-- NIS -->
            												<div class="input-group mb-4">
            													<div class="input-group-prepend">
            														<span class="input-group-text" id="basic-addon1"><i class="anticon anticon-idcard" style="font-size: 20px;"></i></span>
            													</div>
            													<input type="text" id="txt_nis" name="nis" class="form-control" placeholder="Nomor Induk Siswa" aria-label="NIS" aria-describedby="basic-addon1">
            													<input type="hidden" name="id_kelas" class="form-control" value="<?= $data['kelas']['id_kelas'] ?>">
            												</div>
            												<!-- NAMA -->
            												<div class="input-group mb-4">
            													<div class="input-group-prepend">
            														<span class="input-group-text" id="basic-addon1"><i class="anticon anticon-user" style="font-size: 20px;"></i></span>
            													</div>
            													<input type="text" id="txt_nama" name="nama" class="form-control" placeholder="Nama Siswa" aria-label="Nama Siswa" aria-describedby="basic-addon1">
            												</div>
            												<!-- ALAMAT -->
            												<div class="input-group mb-4">
            													<div class="input-group-prepend">
            														<span class="input-group-text" id="basic-addon1"><i class="anticon anticon-home" style="font-size: 20px;"></i></span>
            													</div>
            													<input type="text" id="txt_alamat" name="alamat" class="form-control" placeholder="Alamat Siswa" aria-label="Alamat Siswa" aria-describedby="basic-addon1">
            												</div>
            												<!-- NO TELPON -->
            												<div class="input-group mb-4">
            													<div class="input-group-prepend">
            														<span class="input-group-text" id="basic-addon1"><i class="anticon anticon-contacts" style="font-size: 20px;"></i></span>
            													</div>
            													<input type="text" id="txt_telepon" name="telepon" class="form-control" placeholder="Telepon/HP Siswa" aria-label="Telepon/HP Siswa" aria-describedby="basic-addon1">
            												</div>
            												<!-- JENIS KELAMIN -->
            												<label for="radio" class="mr-3">Jenis Kelamin</label>
            												<div class="d-flex align-items-center justify-content-center input-group mb-2 mt-2">
            													<!-- <div class="radio mr-3">
            														<input id="radio" name="radio" type="radio" value="L" checked="">
            														<label for="radio1">Laki-Laki</label>
            													</div>
            													<div class="radio">
            														<input id="radio" name="radio" value="P" type="radio" checked="	">
            														<label for="radio2">Perempuan</label>
            													</div> -->
            													<div class="radio mr-3">
            														<input type="radio" name="jk" id="gridRadios1" value="L">
            														<label for="gridRadios1">
            															Laki-Laki
            														</label>
            													</div>
            													<div class="radio">
            														<input type="radio" name="jk" id="gridRadios2" value="P">
            														<label for="gridRadios2">
            															Perempuan
            														</label>
            													</div>
            												</div>
            												<!-- TAHUN AJARAN -->
            												<label for="dropdown" class="mr-3">Tahun Ajaran</label>
            												<div class="form-group">
            													<select class="form-control" id="combo_tahun_ajaran" id="exampleFormControlSelect1" name="tahun_ajaran">
            														<?php if (!empty($data['tahun_ajaran'])) {
																		foreach ($data['tahun_ajaran'] as $tahun_ajaran) : ?>
            																<option value="<?= $tahun_ajaran['id_tahun_ajaran'] ?>"><?= $tahun_ajaran['tahun_ajaran']; ?></option>
            														<?php
																		endforeach;
																	} else {
																		echo '';
																	}
																	?>
            													</select>
            												</div>
            												<!-- TAHUN MASUK -->
            												<div class="input-group mb-4">
            													<div class="input-group-prepend">
            														<span class="input-group-text" id="basic-addon1"><i class="anticon anticon-contacts" style="font-size: 20px;"></i></span>
            													</div>
            													<input type="text" id="txt_tahun_masuk" name="tahun_masuk" class="form-control" placeholder="Tahun Masuk" aria-label="Tahun Masuk" aria-describedby="basic-addon1">
            												</div>
            												<div class="alert alert-primary text-center" id="notifBawah">
            													Setelah berhasil menambahkan siswa, Username dan Password default nya adalah <strong>Nomor Induk Siswa</strong>
            												</div>
            											</div>

            											<div class="modal-footer">
            												<button type="button" class="btn btn-danger text-white mr-2" data-dismiss="modal">Tutup</button>
            												<button type="submit" name="submit" class="btn btn-success">Simpan</button>
            											</div>
            										</form>
            									</div>
            								</div>
            							</div>
            							<!-- Tambah Siswa Modal -->

            							<!-- Hapus Siswa Modal -->
            							<div class="modal fade" id="model_hapus_siswa">
            								<div class="modal-dialog modal-dialog-centered">
            									<div class="modal-content">
            										<form action="<?= base_url; ?>kelas/delete_siswa" method="post">
            											<div class="modal-header">
            												<h5 class="modal-title" id="exampleModalCenterTitle">Hapus Siswa</h5>
            												<button type="button" class="close" data-dismiss="modal">
            													<i class="anticon anticon-close"></i>
            												</button>
            											</div>

            											<div class="modal-body">
            												<h6>Yakin ingin menghapus data siswa ini?</h6>
            												<input type="hidden" name="nis" id="post_nis_siswa" value="">
            												<p class="d-inline" id="nis_siswa_hapus"></p><span> - </span>
            												<p class="d-inline" id="nama_siswa_hapus">Loremipsum</p>
            											</div>
            											<div class="modal-footer">
            												<button type="button" class="btn btn-default text-danger" data-dismiss="modal">Tutup</button>
            												<button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
            											</div>
            										</form>
            									</div>
            								</div>
            							</div>
            							<!-- Hapus Siswa Modal -->
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
            		$('.tampilModalTambah').on('click', function() {
            			// console.log('CLICKED');
            			$('.modal-content form').attr('action', 'http://localhost/presensi-smanplus/kelas/tambah_siswa');
            			$('#formModalLabel').html('Tambah Data Siswa');
            			$('#txt_nis').val("");
            			$('#txt_nama').val("");
            			$('#txt_alamat').val("");
            			// $('#radioL').prop("checked", false);
            			// $('#radioP').prop("checked", false);
            			$('#txt_telepon').val("");
            			$('#txt_tahun_masuk').val("");
            			$('#notifBawah').addClass("alert alert-primary text-center").html("Setelah berhasil menambahkan siswa, Username dan Password default nya adalah <strong>Nomor Induk Siswa</strong>");
            		});

            		$('.tampilModalUbah').on('click', function() {
            			// console.log('CLICKED');
            			$('#formModalLabel').html('Ubah Data Siswa');
            			$('.modal-content form').attr('action', 'http://localhost/presensi-smanplus/kelas/update_siswa');
            			const id = $(this).data('id');
            			// console.log(id);
            			$.ajax({
            				url: 'http://localhost/presensi-smanplus/kelas/getUbahSiswa',
            				data: {
            					id_siswa: id
            				},
            				method: 'post',
            				dataType: 'json',
            				success: function(data) {
            					// console.log(data);
            					$('#txt_nis').val(data.nis);
            					$('#txt_nama').val(data.nama_siswa);
            					$('#txt_alamat').val(data.alamat_siswa);
            					$('#txt_telepon').val(data.notelp_siswa);
            					$('#combo_tahun_ajaran').val(data.id_tahun_ajaran);
            					$('#txt_tahun_masuk').val(data.tahun_masuk);

            					if (data.jenis_kelamin == "L") {
            						$('#gridRadios1').prop('checked', true);
            					} else if (data.jenis_kelamin == "P") {
            						$('#gridRadios2').prop('checked', true);
            					}

            					$('#notifBawah').removeClass().html("");
            				}
            			});
            		});
            		$('.tampilModalHapus').on('click', function() {
            			const nis = $(this).data('id');
            			const nama = $(this).data('nama');
            			$('#nis_siswa_hapus').html(nis);
            			$('#nama_siswa_hapus').html(nama);
            			$('#post_nis_siswa').val(nis);
            		});
            	});
            </script>