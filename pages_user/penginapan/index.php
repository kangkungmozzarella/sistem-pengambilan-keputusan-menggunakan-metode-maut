<?php include '../layout/headers.php'; ?>
<?php include '../layout/sidebars.php'; ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4">
        <!-- Breadcrumb -->
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-5 text-dark" href="../dashboard/">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Data Penginapan</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Data Penginapan</h6>
                </nav>
            </div>
        </div>
        <!-- Content -->
        <div class="row mt-4">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div id="map" class="mb-3" style="height: 500px;"></div>
                        <p>Catatan! Data penginapan diambil dari <a href="https://www.tiket.com" target="_blank">tiket.com</a></p>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered align-middle text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penginapan</th>
                                        <th>Harga Kamar</th>
                                        <th style="white-space: normal; word-wrap: break-word; overflow-wrap: break-word; max-width: 200px;">Fasilitas</th>
                                        <th>Rating</th>
                                        <th>Jarak Lokasi</th>
                                        <th>Jenis Penginapan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_penginapan");
                                    $penginapan_data = [];
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $penginapan_data[] = [
                                            'nama_penginapan' => $row['nama_penginapan'],
                                            'latitude' => $row['latitude'],
                                            'longitude' => $row['longitude'],
                                            'harga_kamar' => $row['harga_kamar'],
                                            'fasilitas' => $row['fasilitas'],
                                            'rating' => $row['rating'],
                                            'jarak_lokasi' => $row['jarak_lokasi'],
                                            'jenis_penginapan' => $row['jenis_penginapan'],
                                            'link_penginapan' => $row['link_penginapan'] // Mendapatkan link penginapan
                                        ];
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['nama_penginapan'] ?></td>
                                            <td>Rp <?= number_format($row['harga_kamar'], 3, ',', '.') ?></td>
                                            <td style="white-space: normal; word-wrap: break-word; overflow-wrap: break-word; max-width: 200px;"><?= $row['fasilitas'] ?></td>
                                            <td><?= $row['rating'] ?>/5</td>
                                            <td><?= $row['jarak_lokasi'] ?></td>
                                            <td><?= $row['jenis_penginapan'] ?></td>
                                            <td>
                                                <a href="<?= $row['link_penginapan'] ?>" target="_blank" class="btn btn-info btn-sm">Lihat Detail</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    var map = L.map('map').setView([4.62348, 96.84877], 10);

    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    <?php
    foreach ($penginapan_data as $penginapan) {
        echo "L.marker([" . $penginapan['latitude'] . ", " . $penginapan['longitude'] . "]).addTo(map)
              .bindPopup('<b>" . $penginapan['nama_penginapan'] . "</b><br>Harga: Rp " . number_format($penginapan['harga_kamar'], 0, ',', '.') . "<br>Fasilitas: " . $penginapan['fasilitas'] . "<br>Rating: " . $penginapan['rating'] . "/5<br>Jarak: " . $penginapan['jarak_lokasi'] . " km<br>Jenis: " . $penginapan['jenis_penginapan'] . "');";
    }
    ?>
</script>

<?php include '../layout/footers.php'; ?>