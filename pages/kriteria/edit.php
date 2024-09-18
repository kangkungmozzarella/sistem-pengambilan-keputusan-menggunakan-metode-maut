<?php include '../layout/headers.php'; ?>
<?php include '../layout/sidebars.php'; ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-5 text-dark" href="../dashboard/">Dashboard</a>
                </li>
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-5 text-dark" href="../kriteria/">Data Kriteria</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Kriteria</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Edit Kriteria</h6>
        </nav>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Kriteria</h4>
                    <p class="card-description">Silahkan Edit Data Kriteria</p>
                    <form action="edit_act.php" method="POST">
                        <?php
                        include '../../config/koneksi.php';
                        $kode_kriteria = $_GET['kode_kriteria'];

                        // Query berdasarkan kode_kriteria karena kolom id sudah dihapus
                        $sql = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria WHERE kode_kriteria = '$kode_kriteria'");
                        $data = mysqli_fetch_array($sql);

                        // Mengambil total bobot untuk normalisasi
                        $total_bobot = mysqli_query($koneksi, "SELECT SUM(bobot) as total_bobot FROM tbl_kriteria");
                        $result_total_bobot = mysqli_fetch_array($total_bobot);
                        $normalisasi = $data['bobot'] / $result_total_bobot['total_bobot'];
                        ?>

                        <!-- Input Kode Kriteria -->
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="kode_kriteria" value="<?= $data['kode_kriteria'] ?>" class="form-control" id="kode_kriteria" placeholder="Kode Kriteria" readonly style="background-color: #e9ecef; opacity: 0.8;">
                        </div>

                        <!-- Input Nama Kriteria -->
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="nama_kriteria" value="<?= $data['nama_kriteria'] ?>" class="form-control" id="nama_kriteria" placeholder="Nama Kriteria" required>
                        </div>

                        <!-- Input Bobot -->
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="bobot" value="<?= $data['bobot'] ?>" class="form-control" id="bobot" placeholder="Bobot" required>
                        </div>

                        <!-- Input Normalisasi (auto-calculate) -->
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="normalisasi" value="<?= round($normalisasi, 1) ?>" class="form-control" id="normalisasi" placeholder="Normalisasi" readonly style="background-color: #e9ecef; opacity: 0.8;">
                        </div>

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="index.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div> <!-- End of card-body -->
            </div> <!-- End of card -->
        </div> <!-- End of col-lg-12 -->
    </div> <!-- End of container-fluid -->
</main>
<?php include '../layout/footers.php'; ?>