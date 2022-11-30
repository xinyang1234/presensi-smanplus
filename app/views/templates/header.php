<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url ?>assets/img/logo/new_logo/logo-login.png">
    <link href="<?= base_url ?>assets/css/app.min.css" rel="stylesheet">
    <link href="<?= base_url ?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



    <!-- page js -->
    <script src="<?= base_url ?>assets/js/vendors.min.js"></script>
    <script src="<?= base_url ?>assets/js/app.min.js"></script>
    <script src="<?= base_url ?>assets/js/main.js"></script>
    <script src="<?= base_url ?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <title>E Presensi | <?= $data['title'] ?></title>
</head>

<body>
    <div class="app">
        <div class="layout">
            <div class="header">
                <div class="logo logo-dark">
                    <a href="<?= base_url ?>">
                        <img src="<?= base_url ?>assets/img/logo/new_logo/logo.png" width="150px" class="mt-3" alt="Logo">
                        <img class="logo-fold mt-2 ml-3" src="<?= base_url ?>assets/img/logo/new_logo/logo-fold.png" width="40px" alt="Logo">
                    </a>
                </div>
                <div class="nav-wrap">
                    <ul class="nav-left">
                        <li class="desktop-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                    <img src="<?= base_url ?>assets/img/avatars/thumb-3.jpg" alt="">
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex m-r-50">
                                        <div class="avatar avatar-lg avatar-image">
                                            <img src="<?= base_url ?>assets/img/avatars/thumb-3.jpg" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold"><?= $_SESSION['session_name'] ?></p>
                                            <p class="m-b-0 opacity-07"><?= strtoupper($_SESSION['session_type']) ?></p>
                                        </div>
                                    </div>
                                </div>
                                <a href="user/edit" data-edit="<?= base_url ?>/user/edit" id="header-edit" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                            <span class="m-l-10">Profil Saya</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="auth/logout" id="header-logout" data-logout="<?= base_url ?>auth/logout" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                            <span class="m-l-10">Logout</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>