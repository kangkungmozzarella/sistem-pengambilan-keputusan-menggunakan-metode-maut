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
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Peringkat Penginapan Berdasarkan Kriteria</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Peringkat Penginapan Berdasarkan Kriteria</h6>
        </nav>

        <!-- Tabel Hasil Perhitungan Nilai MAUT (Utilitas) -->
        <div class="row mt-4">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php
                        include '../../config/koneksi.php';

                        // Mengambil data kriteria dan bobotnya
                        $kriteria_sql = mysqli_query($koneksi, "SELECT kode_kriteria, normalisasi FROM tbl_kriteria");
                        $kriteria = [];
                        $bobotKriteria = [];
                        while ($row = mysqli_fetch_assoc($kriteria_sql)) {
                            $kriteria[] = $row['kode_kriteria'];
                            $bobotKriteria[$row['kode_kriteria']] = $row['normalisasi']; // Menggunakan nilai normalisasi
                        }

                        // Mengambil data alternatif dan nama alternatif
                        $alternatif_sql = mysqli_query($koneksi, "SELECT kode_alternatif, nama_alternatif FROM tbl_alternatif ORDER BY LENGTH(kode_alternatif), kode_alternatif");
                        $alternatif = [];
                        $namaAlternatif = [];
                        while ($row = mysqli_fetch_assoc($alternatif_sql)) {
                            $alternatif[] = $row['kode_alternatif'];
                            $namaAlternatif[$row['kode_alternatif']] = $row['nama_alternatif'];
                        }

                        // Cek apakah data kriteria dan alternatif ada
                        if (empty($kriteria) || empty($alternatif)) {
                            echo "<p>Tidak ada data kriteria atau alternatif yang ditemukan.</p>";
                        } else {
                            // Mengambil data matriks keputusan dari tabel
                            $data = [];
                            foreach ($alternatif as $alt) {
                                $row = ['kode_alternatif' => $alt, 'nama_alternatif' => $namaAlternatif[$alt]];
                                foreach ($kriteria as $kri) {
                                    $nilai_sql = mysqli_query($koneksi, "SELECT nilai FROM tbl_matriks_keputusan WHERE kode_alternatif='$alt' AND kode_kriteria='$kri'");
                                    $nilai = mysqli_fetch_assoc($nilai_sql);
                                    $row[$kri] = isset($nilai['nilai']) ? $nilai['nilai'] : 0;
                                }
                                $data[] = $row;
                            }

                            // Mencari nilai maksimum dan minimum untuk setiap kriteria
                            $min_values = [];
                            $max_values = [];
                            foreach ($kriteria as $kri) {
                                $min_values[$kri] = min(array_column($data, $kri));
                                $max_values[$kri] = max(array_column($data, $kri));
                            }

                            // Menghitung nilai normalisasi dan nilai MAUT (Utilitas) menggunakan nilai normalisasi
                            $result = [];
                            foreach ($data as $row) {
                                $nilaiMAUT = 0;
                                foreach ($kriteria as $kri) {
                                    // Pastikan nilai pembagi tidak nol untuk menghindari kesalahan
                                    if ($max_values[$kri] - $min_values[$kri] != 0) {
                                        $norm = ($row[$kri] - $min_values[$kri]) / ($max_values[$kri] - $min_values[$kri]);
                                    } else {
                                        $norm = 0; // Atur normalisasi ke 0 jika pembagi adalah 0
                                    }

                                    $utilitas = $bobotKriteria[$kri] * $norm;
                                    $row[$kri] = number_format($utilitas, 3);
                                    $nilaiMAUT += $utilitas;
                                }
                                $row['nilai_maut'] = number_format($nilaiMAUT, 3);
                                $result[] = $row;
                            }

                            // Tabel Hasil Perhitungan Nilai MAUT (Utilitas)
                            echo "<h4 class='card-title mb-4' style='margin-top: 20px;'>Hasil Perhitungan Nilai MAUT (Utilitas)</h4>";
                            echo "<table class='table table-striped table-hover table-bordered align-middle text-center'>";
                            echo "<thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Alternatif</th>
                                        <th>Nama Alternatif</th>"; // Tambahkan Nama Alternatif di sini
                            foreach ($kriteria as $kri) {
                                echo "<th>$kri</th>";
                            }
                            echo "<th>Nilai MAUT</th></tr></thead><tbody>";

                            $no = 1;
                            foreach ($result as $row) {
                                echo "<tr>
                                        <td>$no</td>
                                        <td>{$row['kode_alternatif']}</td>
                                        <td>{$row['nama_alternatif']}</td>"; // Tampilkan Nama Alternatif di sini
                                foreach ($kriteria as $kri) {
                                    echo "<td>{$row[$kri]}</td>";
                                }
                                echo "<td>{$row['nilai_maut']}</td></tr>";
                                $no++;
                            }

                            echo "</tbody></table>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Peringkat Berdasarkan Nilai MAUT -->
        <?php if (!empty($result)) : ?>
            <div class="row mt-4">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            // Mengurutkan hasil berdasarkan nilai MAUT dari yang terbesar ke yang terkecil
                            usort($result, function ($a, $b) {
                                return $b['nilai_maut'] <=> $a['nilai_maut'];
                            });

                            // Tabel Peringkat Berdasarkan Nilai MAUT
                            echo "<h4 class='card-title mb-4' style='margin-top: 20px;'>Peringkat Berdasarkan Nilai MAUT</h4>";
                            echo "<table class='table table-striped table-hover table-bordered align-middle text-center'>";
                            echo "<thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Alternatif</th>
                                    <th>Nama Alternatif</th> <!-- Tambahkan kolom Nama Alternatif di sini -->
                                    <th>Nilai MAUT</th>
                                    <th>Peringkat</th>
                                </tr>
                              </thead>
                              <tbody>";

                            $no = 1;
                            foreach ($result as $row) {
                                echo "<tr>
                                    <td>$no</td>
                                    <td>{$row['kode_alternatif']}</td>
                                    <td>{$row['nama_alternatif']}</td> <!-- Tampilkan Nama Alternatif di sini -->
                                    <td>{$row['nilai_maut']}</td>
                                    <td>$no</td></tr>";
                                $no++;
                            }

                            echo "</tbody></table>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php include '../layout/footers.php'; ?>