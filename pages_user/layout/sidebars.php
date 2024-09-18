<?php include '../../config/config.php'; ?>
<?php include '../../config/koneksi.php'; ?>

<?php
// Mendapatkan URI saat ini
$current_page = basename($_SERVER['REQUEST_URI'], ".php");
?>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#">
            <img src="../../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">SPK - MAUT</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link text-white <?= ($current_page == 'dashboard' || $current_page == '') ? 'active bg-gradient-primary' : '' ?>" href="../dashboard/">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Beranda</span>
                </a>
            </li>

            <!-- Pengolahan Data -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pengolahan Data</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?= ($current_page == 'penginapan') ? 'active bg-gradient-primary' : '' ?>" href="../penginapan/">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">hotel</i>
                    </div>
                    <span class="nav-link-text ms-1">Data Penginapan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?= ($current_page == 'utilitas') ? 'active bg-gradient-primary' : '' ?>" href="../utilitas/">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">bar_chart</i>
                    </div>
                    <span class="nav-link-text ms-1">Perankingan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?= ($current_page == 'metode') ? 'active bg-gradient-primary' : '' ?>" href="../metode/">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">info</i>
                    </div>
                    <span class="nav-link-text ms-1">Informasi Metode</span>
                </a>
            </li>

            <!-- Authentication -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Auth</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?= ($current_page == 'auth') ?>" href="../auth/index.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>