<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable" id="ulNav">
            <li id="liNav" class="nav-item dropdown <?= strtolower($data['title']) === "dashboard" ? 'active' : '' ?>">
                <a class="dropdown-toggle d-flex pt-3" href="<?= base_url ?>">
                    <span class="icon-holder">
                        <i class="material-icons" style="font-size: 18px;">speed</i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item dropdown <?= strtolower($data['title']) === "tahun ajaran" ? 'active' : '' ?>" id="liNav">
                <a class="dropdown-toggle d-flex pt-3" href="<?= base_url ?>tahun_ajaran">
                    <span class="icon-holder">
                        <i class="material-icons" style="font-size: 18px;">event</i>
                    </span>
                    <span class="title">Tahun Ajaran</span>
                </a>
            </li>
            <li class="nav-item dropdown <?= (strtolower($data['title']) === "kelas" ? 'active' : (strtolower($data['title'])=== "detail kelas" ? 'active' : ''))?>" id="liNav">
                <a class="dropdown-toggle d-flex pt-3" href="<?= base_url ?>kelas">
                    <span class="icon-holder">
                        <i class="material-icons" style="font-size: 18px;">groups</i>
                    </span>
                    <span class="title">Kelas</span>
                </a>
            </li>
            <li class="nav-item dropdown <?= strtolower($data['title']) === "guru" ? 'active' : '' ?>" id="liNav">
                <a class="dropdown-toggle d-flex pt-3" href="<?= base_url ?>guru">
                    <span class="icon-holder">
                        <i class="material-icons" style="font-size: 18px;">supervised_user_circle</i>
                    </span>
                    <span class="title">Guru</span>
                </a>
            </li>
            <li class="nav-item dropdown <?= strtolower($data['title']) === "mata pelajaran" ? 'active' : '' ?>" id="liNav">
                <a class="dropdown-toggle d-flex pt-3" href="<?= base_url ?>pelajaran">
                    <span class="icon-holder">
                        <i class="material-icons" style="font-size: 18px;">book</i>
                    </span>
                    <span class="title">Mata Pelajaran</span>
                </a>
            </li>
            <li class="nav-item dropdown <?= strtolower($data['title']) === "jadwal" ? 'active' : '' ?>" id="liNav">
                <a class="dropdown-toggle d-flex pt-3" href="<?= base_url ?>jadwal">
                    <span class="icon-holder">
                        <i class="material-icons" style="font-size: 18px;">calendar_month</i>
                    </span>
                    <span class="title">Jadwal</span>
                </a>
            </li>
            <li class="nav-item dropdown <?= strtolower($data['title']) === "presensi" ? 'active' : '' ?>" id="liNav">
                <a class="dropdown-toggle d-flex pt-3" href="<?= base_url ?>presensi">
                    <span class="icon-holder">
                        <i class="material-icons" style="font-size: 18px;">checklist_rtl</i>
                    </span>
                    <span class="title">Daftar Presensi</span>
                </a>
            </li>

        </ul>
    </div>
</div>