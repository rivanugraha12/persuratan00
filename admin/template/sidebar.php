<div id="layoutSidenav">
    <div id="layoutSidenav_nav" class="shadow">
        <nav class="sb-sidenav accordion" style="background-color: #1560BD; color: white;" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Home</div>
                    <a class="nav-link" href="<?= $main_url ?>admin.php">
                        <div class="sb-nav-link-icon text-white"><i class="fa-solid fa-house-chimney"></i></div>
                        <label class="mb-0 text-white"> Dashboard</label>
                    </a>
                    <hr class="mb-0 mt-0">
                    <div class="sb-sidenav-menu-heading">Data</div>
                    <a class="nav-link" href="<?= $main_url ?>admin/s_masuk/s_masuk.php">
                        <div class="sb-nav-link-icon text-white"><i class="fa-solid fa-file-arrow-down"></i></div>
                        <label class="mb-0 text-white"> Surat Masuk</label>
                    </a>
                    <hr class="mb-0 mt-0">
                    <a class="nav-link" href="<?= $main_url ?>admin/s_keluar/s_keluar.php">
                        <div class="sb-nav-link-icon text-white"><i class="fa-solid fa-file-arrow-up"></i></div>
                        <label class="mb-0 text-white"> Surat Keluar</label>
                    </a>
                    <hr class="mb-0 mt-0">
                    <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseRekap" aria-expanded="false" aria-controls="collapseRekap">
                        <div class="sb-nav-link-icon text-white"><i class="fa-solid fa-folder-tree"></i></div>
                        <label class="mb-0 text-white"> Rekap Surat</label>
                    </a>
                    <div class="collapse" id="collapseRekap" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <a class="nav-link" href="<?= $main_url ?>admin/rekap/rekap.php">
                            <div class="sb-nav-link-icon text-white"><i class="fa-regular fa-circle-down"></i></div>
                            <label class="mb-0 text-white"> Download Surat Masuk</label>
                        </a>
                        <a class="nav-link" href="<?= $main_url ?>admin/rekapkeluar/rekap.php">
                            <div class="sb-nav-link-icon text-white"><i class="fa-regular fa-circle-up"></i></div>
                            <label class="mb-0 text-white"> Download Surat Keluar</label>
                        </a>
                    </div>
                    <hr class="mb-0 mt-0">
                    <a class="nav-link" href="<?= $main_url ?>admin/user/user.php">
                        <div class="sb-nav-link-icon text-white"><i class="fa-solid fa-user"></i></div>
                        <label class="mb-0 text-white"> User</label>
                    </a>
                    <hr class="mb-0 mt-0">
                </div>
            </div>
            <div class="sb-sidenav-footer border">
                <div class="small">Logged in as:</div>
                <?= "Admin" ?>
            </div>
        </nav>
    </div>
