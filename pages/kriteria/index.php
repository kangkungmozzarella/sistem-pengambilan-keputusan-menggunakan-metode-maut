<?php include '../layout/headers.php'; ?>
<?php include '../layout/sidebars.php'; ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
        <!-- Breadcrumb -->
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="../dashboard/">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Data Kriteria</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Data Kriteria</h6>
                </nav>
            </div>
        </div>
        <!-- Content -->
        <div class="row mt-4">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="add.php" class="btn btn-primary">Add Kriteria</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered align-middle text-center">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> Kode Kriteria </th>
                                        <th> Nama Kriteria </th>
                                        <th> Bobot </th>
                                        <th> Normalisasi </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $totalBobot = 0;
                                    $totalNormalisasi = 0;

                                    // Hitung total bobot dari database
                                    $sql = mysqli_query($koneksi, "SELECT SUM(bobot) as total_bobot FROM tbl_kriteria");
                                    $result = mysqli_fetch_assoc($sql);
                                    $totalBobot = $result['total_bobot'];

                                    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        // Hitung normalisasi dengan rumus bobot / 10
                                        $normalisasi = $row['bobot'] / 10;

                                        // Tambahkan normalisasi saat ini ke total normalisasi
                                        $totalNormalisasi += $normalisasi;

                                        // Update normalisasi di database menggunakan kode_kriteria
                                        $update = mysqli_query($koneksi, "UPDATE tbl_kriteria SET normalisasi='$normalisasi' WHERE kode_kriteria='{$row['kode_kriteria']}'");
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['kode_kriteria'] ?></td>
                                            <td><?= $row['nama_kriteria'] ?></td>
                                            <td><?= $row['bobot'] ?></td>
                                            <td><?= number_format($normalisasi, 2) ?></td> <!-- Normalisasi diperbaiki ke 2 desimal -->
                                            <td>
                                                <a href="edit.php?kode_kriteria=<?= $row['kode_kriteria'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a onclick="return confirm('Apakah Anda ingin menghapus data ini?')" class="btn btn-danger btn-sm" href="delete.php?kode_kriteria=<?= $row['kode_kriteria'] ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-center">Total Bobot</th>
                                        <th class="text-center"><?= number_format($totalBobot, 1) ?></th>
                                        <th class="text-center"><?= number_format($totalNormalisasi, 2) ?></th> <!-- Normalisasi diperbaiki ke 2 desimal -->
                                        <th></th>
                                    </tr>
                                    <?php
                                    // Kondisi peringatan jika total bobot > 10 atau total normalisasi tidak sama dengan 1
                                    if ($totalBobot > 10 || round($totalNormalisasi, 2) != 1.00) { ?>
                                        <tr>
                                            <td colspan="6" class="text-center text-danger">
                                                <strong>Peringatan: Total Bobot atau Total Normalisasi Melebihi Batas yang Diharapkan!</strong>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include '../layout/footers.php'; ?>