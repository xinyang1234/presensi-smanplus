            <div class="page-container">
              <div class="bg-default" style="display: block; height: 250px; background: #68BB61;">
                <div class="main-content">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h1 class="mb-0 font-weight-bold text-white mt-3">Selamat Datang, <?= $_SESSION['session_name'] ?>!</h1>
                          </div>
                        </div>
                        <div style="margin-top: 40px;">
                          <div class="row">
                            <div class="col-md-6 col-lg-3">
                              <div class="card bg-primary" style="border: none;">
                                <div class="card-body">
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                      <p class="m-b-0 text-white">Hadir</p>
                                      <h2 class="m-b-0 text-white">
                                        <span>
                                          <?php
                                          //echo $data['presensi'][0];
                                          echo 20;
                                          ?>
                                        </span>
                                      </h2>
                                    </div>
                                    <div class="avatar avatar-icon avatar-lg avatar-white">
                                      <i class="anticon anticon-user text-primary"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                              <div class="card bg-success" style="border: none;">
                                <div class="card-body">
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                      <p class="m-b-0 text-white">Izin</p>
                                      <h2 class="m-b-0 text-white">
                                        <span>
                                          <?php
                                          //echo $data['presensi'][1];
                                          echo 20;
                                          ?>
                                        </span>
                                      </h2>
                                    </div>
                                    <div class="avatar avatar-icon avatar-lg avatar-white">
                                      <i class="anticon anticon-user text-success"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                              <div class="card bg-warning" style="border: none;">
                                <div class="card-body">
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                      <p class="m-b-0 text-white">Sakit</p>
                                      <h2 class="m-b-0 text-white">
                                        <span>
                                          <?php
                                          //echo $data['presensi'][2];
                                          echo 20
                                          ?>
                                        </span>
                                      </h2>
                                    </div>
                                    <div class="avatar avatar-icon avatar-lg avatar-white">
                                      <i class="anticon anticon-user text-warning"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                              <div class="card bg-danger" style="border: none;">
                                <div class="card-body">
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                      <p class="m-b-0 text-white">Tanpa Ket.</p>
                                      <h2 class="m-b-0 text-white">
                                        <span>
                                          <?php
                                          //echo $data['presensi'][3];
                                          echo 20;
                                          ?>
                                        </span>
                                      </h2>
                                    </div>
                                    <div class="avatar avatar-icon avatar-lg avatar-white">
                                      <i class="anticon anticon-user text-danger"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                              <div>
                                <h4 class="mb-0">Informasi Akademik</h4>
                              </div>
                            </div>
                            <?php //foreach ($data['informasi'] as $informasi) : 
                            ?>
                            <?php echo $page = $_SERVER['SCRIPT_NAME'] ?>
                            <div class="card">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-md-4">
                                    <img class="img-fluid" src="<?php //base_url 
                                                                ?>/assets/img/others/img-2.jpg" alt="">
                                  </div>
                                  <div class="col-md-8">
                                    <h4 class="m-b-10"><?php //$informasi['judul'] 
                                                        ?></h4>

                                    <p class="m-b-20"><?php //$informasi['konten'] 
                                                      ?></p>
                                    <div class="text-right">
                                      <!-- <a class="btn btn-hover font-weight-semibold" href="#">
                                        <span>Lihat Selengkapnya</span>
                                      </a> -->
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php //endforeach; 
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>