<?php include '../layout/headers.php'; ?>
<?php include '../layout/sidebars.php'; ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="../dashboard/">Dashboard</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>

        <div class="row mb-4">
            <!-- Card Jumlah Penginapan -->
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">hotel</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Jumlah Penginapan</p>
                            <h4 class="mb-0">
                                <?php
                                $result = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tbl_penginapan");
                                $data = mysqli_fetch_assoc($result);
                                echo $data['total'];
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Jumlah Data Kriteria -->
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">rule</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Jumlah Kriteria</p>
                            <h4 class="mb-0">
                                <?php
                                $result = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tbl_kriteria");
                                $data = mysqli_fetch_assoc($result);
                                echo $data['total'];
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Jumlah Data Alternatif -->
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">view_list</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Jumlah Alternatif</p>
                            <h4 class="mb-0">
                                <?php
                                $result = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tbl_alternatif");
                                $data = mysqli_fetch_assoc($result);
                                echo $data['total'];
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Jumlah Data Matriks Keputusan -->
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Matriks Keputusan</p>
                            <h4 class="mb-0">
                                <?php
                                $result = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tbl_matriks_keputusan");
                                $data = mysqli_fetch_assoc($result);
                                echo $data['total'];
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- GIS Map Section -->
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Peta Penginapan</h4>
                        <div id="map" style="height: 500px;"></div>
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
    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_penginapan");
    while ($row = mysqli_fetch_array($sql)) {
        $latitude = $row['latitude'];
        $longitude = $row['longitude'];
        $nama_penginapan = $row['nama_penginapan'];
        $harga_kamar = number_format($row['harga_kamar'], 3, ',', '.');
        $fasilitas = $row['fasilitas'];
        $rating = $row['rating'];
        $jarak_lokasi = $row['jarak_lokasi'];
        $jenis_penginapan = $row['jenis_penginapan'];

        echo "L.marker([$latitude, $longitude]).addTo(map)
              .bindPopup('<b>$nama_penginapan</b><br>Harga: Rp $harga_kamar<br>Fasilitas: $fasilitas<br>Rating: $rating/5<br>Jarak: $jarak_lokasi km<br>Jenis: $jenis_penginapan');";
    }
    ?>
</script>

<?php include '../layout/footers.php'; ?>