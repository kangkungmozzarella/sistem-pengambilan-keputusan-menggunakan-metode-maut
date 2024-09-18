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
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Data Matriks Keputusan</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Data Matriks Keputusan</h6>
        </nav>
        <!-- Tabel Data Matriks Keputusan -->
        <div class="row mt-4">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Matriks Keputusan</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered align-middle text-center">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> Kode Alternatif </th>
                                        <?php
                                        // Ambil kriteria dari tbl_kriteria
                                        include '../../config/koneksi.php';
                                        $kriteria_sql = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria");
                                        $kriteria_arr = [];
                                        while ($rowKriteria = mysqli_fetch_array($kriteria_sql)) {
                                            $kriteria_arr[] = $rowKriteria['kode_kriteria'];
                                            echo "<th>" . $rowKriteria['kode_kriteria'] . "</th>";
                                        }
                                        ?>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $alternatif_sql = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif");
                                    $nilai_kriteria = [];

                                    // Array untuk menyimpan nilai min dan max untuk setiap kriteria
                                    $min_values = array_fill_keys($kriteria_arr, PHP_INT_MAX);
                                    $max_values = array_fill_keys($kriteria_arr, PHP_INT_MIN);

                                    while ($rowAlternatif = mysqli_fetch_array($alternatif_sql)) {
                                        $kodeAlternatif = $rowAlternatif['kode_alternatif'];
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $kodeAlternatif ?></td>
                                            <?php
                                            foreach ($kriteria_arr as $kodeKriteria) {
                                                $nilai_sql = mysqli_query($koneksi, "SELECT nilai FROM tbl_matriks_keputusan WHERE kode_alternatif='$kodeAlternatif' AND kode_kriteria='$kodeKriteria'");
                                                $nilai_row = mysqli_fetch_array($nilai_sql);

                                                if (isset($nilai_row['nilai'])) {
                                                    $nilai = $nilai_row['nilai'];

                                                    // Tentukan format berdasarkan kriteria
                                                    if ($kodeKriteria == 'C1') {
                                                        $nilai = number_format($nilai, 3);
                                                    } elseif ($kodeKriteria == 'C3') {
                                                        $nilai = number_format($nilai, 1);
                                                    }

                                                    // Update nilai min dan max
                                                    $min_values[$kodeKriteria] = min($min_values[$kodeKriteria], $nilai_row['nilai']);
                                                    $max_values[$kodeKriteria] = max($max_values[$kodeKriteria], $nilai_row['nilai']);
                                                } else {
                                                    $nilai = 'N/A';
                                                }

                                                echo "<td>$nilai</td>";
                                            }
                                            ?>
                                            <td>
                                                <a href="nilai_kriteria.php?alternatif=<?= $kodeAlternatif ?>" class="btn btn-info btn-sm">Nilai Kriteria</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">MIN</th>
                                        <?php
                                        foreach ($kriteria_arr as $kodeKriteria) {
                                            $min_value = ($kodeKriteria == 'C1') ? number_format($min_values[$kodeKriteria], 3) : (($kodeKriteria == 'C3') ? number_format($min_values[$kodeKriteria], 1) : $min_values[$kodeKriteria]);
                                            echo "<th>$min_value</th>";
                                        }
                                        ?>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">MAX</th>
                                        <?php
                                        foreach ($kriteria_arr as $kodeKriteria) {
                                            $max_value = ($kodeKriteria == 'C1') ? number_format($max_values[$kodeKriteria], 3) : (($kodeKriteria == 'C3') ? number_format($max_values[$kodeKriteria], 1) : $max_values[$kodeKriteria]);
                                            echo "<th>$max_value</th>";
                                        }
                                        ?>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <button id="toggleNormalisasi" class="btn btn-primary mt-3">Tampilkan Normalisasi</button>

                        <!-- Tabel Normalisasi -->
                        <h4 class="card-title mt-5">Data Normalisasi Matriks Keputusan</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered align-middle text-center">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> Kode Alternatif </th>
                                        <?php
                                        foreach ($kriteria_arr as $kodeKriteria) {
                                            echo "<th>" . $kodeKriteria . "</th>";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $alternatif_sql = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif");
                                    while ($rowAlternatif = mysqli_fetch_array($alternatif_sql)) {
                                        $kodeAlternatif = $rowAlternatif['kode_alternatif'];
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $kodeAlternatif ?></td>
                                            <?php
                                            foreach ($kriteria_arr as $kodeKriteria) {
                                                $nilai_sql = mysqli_query($koneksi, "SELECT nilai FROM tbl_matriks_keputusan WHERE kode_alternatif='$kodeAlternatif' AND kode_kriteria='$kodeKriteria'");
                                                $nilai_row = mysqli_fetch_array($nilai_sql);
                                                $nilai = $nilai_row['nilai'];

                                                if ($nilai_row['nilai'] != 0) {
                                                    // Rumus Normalisasi untuk kriteria
                                                    $normalisasi = ($nilai - $min_values[$kodeKriteria]) / ($max_values[$kodeKriteria] - $min_values[$kodeKriteria]);
                                                } else {
                                                    $normalisasi = 0;
                                                }

                                                // Periksa apakah nilai adalah bilangan bulat
                                                if (floor($normalisasi) == $normalisasi) {
                                                    // Jika ya, tampilkan tanpa angka di belakang koma
                                                    echo "<td>" . number_format($normalisasi, 0) . "</td>";
                                                } else {
                                                    // Jika tidak, tampilkan dengan format desimal
                                                    echo "<td>" . number_format($normalisasi, 3) . "</td>";
                                                }
                                            }
                                            ?>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div> <!-- End of card-body -->
                </div> <!-- End of card -->
            </div> <!-- End of col-lg-12 -->
        </div> <!-- End of row -->
    </div> <!-- End of container-fluid -->
</main>

<?php include '../layout/footers.php'; ?>

<script>
    document.getElementById("toggleNormalisasi").addEventListener("click", function() {
        var tabelNormalisasi = document.querySelector(".table-responsive:last-child"); // Pilih tabel normalisasi
        if (tabelNormalisasi.style.display === "none") {
            tabelNormalisasi.style.display = "block";
            this.textContent = "Sembunyikan Normalisasi";
        } else {
            tabelNormalisasi.style.display = "none";
            this.textContent = "Tampilkan Normalisasi";
        }
    });

    // Inisialisasi dengan tabel disembunyikan
    document.querySelector(".table-responsive:last-child").style.display = "none";
</script>