<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #fff; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 text-primary" href="<?= $main_url ?>admin.php">ADMINISTRASI SURAT</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-dark" id="sidebarToggle" href="#!">
            <i id="sidebarToggleIcon" class="fa-solid fa-angles-left"></i>
        </button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <span class="text-dark text-capitalize"><?= "Admin" ?></span>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?= $main_url?>logout.php">Logout <i class="fa-solid fa-right-from-bracket"></i></a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Skrip JavaScript untuk mengubah ikon -->
    <script>
        $(document).ready(function () {
            // Menanggapi kejadian klik pada tombol sidebarToggle
            $("#sidebarToggle").click(function () {
                // Mengganti ikon pada saat klik
                $("#sidebarToggleIcon").toggleClass("fa-angles-left fa-angles-right");
            });
        });
    </script>