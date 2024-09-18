<?php
include '../layout/headers.php';
include '../../config/koneksi.php';

$kode_alternatif = $_GET['alternatif'];

// Mengambil semua kriteria yang ada
$kriteria_sql = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria");
$kriteria_arr = [];
while ($kriteria = mysqli_fetch_array($kriteria_sql)) {
    $kriteria_arr[] = $kriteria;
}

// Mengambil nilai kriteria yang sudah ada untuk alternatif ini
$nilai_kriteria = [];
foreach ($kriteria_arr as $kriteria) {
    $kode_kriteria = $kriteria['kode_kriteria'];
    $query = "SELECT nilai FROM tbl_matriks_keputusan WHERE kode_alternatif='$kode_alternatif' AND kode_kriteria='$kode_kriteria'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    // Cek apakah nilai memerlukan trailing zeros dan format sesuai kriteria
    if (isset($data['nilai'])) {
        $nilai = $data['nilai'];
        if ($kode_kriteria == 'C1') {
            // Format untuk C1: 3 angka desimal
            $nilai_kriteria[$kode_kriteria] = number_format($nilai, 3);
        } elseif ($kode_kriteria == 'C3') {
            // Format untuk C3: 1 angka desimal
            $nilai_kriteria[$kode_kriteria] = number_format($nilai, 1);
        } else {
            // Format default
            $nilai_kriteria[$kode_kriteria] = rtrim(rtrim($nilai, '0'), '.');
        }
    } else {
        $nilai_kriteria[$kode_kriteria] = '0';
    }
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($kriteria_arr as $kriteria) {
        $kode_kriteria = $kriteria['kode_kriteria'];
        $nilai = $_POST['nilai_' . $kode_kriteria];

        // Validasi input
        if ($nilai === '' || !is_numeric($nilai)) {
            $errors[] = 'Nilai untuk kriteria ' . htmlspecialchars($kode_kriteria) . ' harus diisi dengan angka yang valid.';
            continue;
        }

        // Simpan nilai tanpa mempengaruhi format
        $query = "SELECT * FROM tbl_matriks_keputusan WHERE kode_alternatif='$kode_alternatif' AND kode_kriteria='$kode_kriteria'";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) > 0) {
            // Update nilai yang sudah ada
            $update_query = "UPDATE tbl_matriks_keputusan SET nilai='$nilai' WHERE kode_alternatif='$kode_alternatif' AND kode_kriteria='$kode_kriteria'";
            mysqli_query($koneksi, $update_query);
        } else {
            // Insert nilai baru
            $insert_query = "INSERT INTO tbl_matriks_keputusan (kode_alternatif, kode_kriteria, nilai) VALUES ('$kode_alternatif', '$kode_kriteria', '$nilai')";
            mysqli_query($koneksi, $insert_query);
        }
    }

    // Redirect kembali ke halaman matriks keputusan
    header("Location: index.php");
    exit();
}
?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-5 text-dark" href="../dashboard/">Dashboard</a>
                </li>
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-5 text-dark" href="index.php">Data Matriks Keputusan</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Nilai Kriteria</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Nilai Kriteria</h6>
        </nav>

        <!-- Form Nilai Kriteria -->
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Input Nilai Kriteria</h4>

                        <!-- Tampilkan pesan error jika ada -->
                        <?php if (!empty($errors)) : ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach ($errors as $error) : ?>
                                        <li><?= $error ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form method="POST">
                            <div class="form-group mb-3">
                                <label>Kode Alternatif</label>
                                <input type="text" class="form-control input-sm border border-secondary" value="<?= htmlspecialchars($kode_alternatif) ?>" disabled style="background-color: #f8f9fa;">
                            </div>

                            <!-- Loop untuk menampilkan semua kriteria dan nilai yang ada -->
                            <?php foreach ($kriteria_arr as $kriteria) : ?>
                                <div class="form-group mb-3">
                                    <label><?= htmlspecialchars($kriteria['kode_kriteria']) ?> - <?= htmlspecialchars($kriteria['nama_kriteria']) ?></label>
                                    <input type="text" class="form-control input-sm border border-secondary" name="nilai_<?= htmlspecialchars($kriteria['kode_kriteria']) ?>" value="<?= htmlspecialchars($nilai_kriteria[$kriteria['kode_kriteria']]) ?>" required>
                                </div>
                            <?php endforeach; ?>

                            <div class="form-group d-flex justify-content-start mt-4">
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <a href="index.php" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div> <!-- End of card-body -->
                </div> <!-- End of card -->
            </div> <!-- End of col-lg-12 -->
        </div> <!-- End of row -->
    </div> <!-- End of container-fluid -->
</main>

<?php include '../layout/footers.php'; ?>

<style>
    .form-control {
        margin-top: 10px;
        padding-left: 10px;
    }

    .btn {
        padding: 10px 20px;
        margin-right: 10px;
    }
</style>