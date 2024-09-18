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
                    <a class="opacity-5 text-dark" href="../penginapan/">Data Penginapan</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tambah Penginapan</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Tambah Penginapan</h6>
        </nav>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data</h4>
                    <p class="card-description">Silahkan Masukkan Data Penginapan</p>
                    <form action="add_act.php" method="POST">
                        <!-- Input Nama Penginapan -->
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="nama_penginapan" class="form-control" id="nama_penginapan" placeholder="Nama Penginapan" required>
                        </div>

                        <!-- Input Harga Kamar -->
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="harga_kamar" class="form-control" id="harga_kamar" placeholder="Harga Kamar" required>
                        </div>

                        <!-- Input Fasilitas -->
                        <div class="input-group input-group-outline my-3">
                            <textarea name="fasilitas" class="form-control" id="fasilitas" placeholder="Fasilitas" required></textarea>
                        </div>

                        <!-- Input Rating -->
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="rating" class="form-control" id="rating" placeholder="Rating" required>
                        </div>

                        <!-- Input Jarak Lokasi -->
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="jarak_lokasi" class="form-control" id="jarak_lokasi" placeholder="Jarak Lokasi" required>
                        </div>

                        <!-- Input Jenis Penginapan -->
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="jenis_penginapan" class="form-control" id="jenis_penginapan" placeholder="Jenis Penginapan" required>
                        </div>

                        <!-- Input Latitude -->
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="latitude" class="form-control" id="latitude" placeholder="Latitude" required>
                        </div>

                        <!-- Input Longitude -->
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="longitude" class="form-control" id="longitude" placeholder="Longitude" required>
                        </div>

                        <!-- Input Link Penginapan -->
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="link_penginapan" class="form-control" id="link_penginapan" placeholder="Link Penginapan" required>
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