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
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Data Alternatif</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Data Alternatif</h6>
        </nav>
        <!-- Content -->
        <div class="row mt-4">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered align-middle text-center">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> Kode Alternatif </th>
                                        <th> Nama Alternatif </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../../config/koneksi.php';

                                    // Ambil data dari tbl_penginapan
                                    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_penginapan ORDER BY id ASC");
                                    $no = 1;
                                    while ($row = mysqli_fetch_array($sql)) {
                                        // Cek apakah nama penginapan sudah ada di tbl_alternatif
                                        $nama_penginapan = $row['nama_penginapan'];
                                        $cek_sql = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif WHERE nama_alternatif='$nama_penginapan'");
                                        if (mysqli_num_rows($cek_sql) == 0) {
                                            // Jika belum ada, maka insert data
                                            $kode_alternatif = "A" . $no;
                                            $insert_sql = "INSERT INTO tbl_alternatif (kode_alternatif, nama_alternatif) VALUES ('$kode_alternatif', '$nama_penginapan')";
                                            mysqli_query($koneksi, $insert_sql);
                                        }

                                        // Tampilkan data di tabel
                                        $kode_alternatif = "A" . $no;
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $kode_alternatif ?></td>
                                            <td><?= $nama_penginapan ?></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
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