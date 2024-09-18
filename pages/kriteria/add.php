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
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tambah Kriteria</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Tambah Kriteria</h6>
        </nav>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data Kriteria</h4>
                    <p class="card-description">Silahkan Masukkan Data Kriteria</p>
                    <form action="add_act.php" method="POST">
                        <!-- Input Kode Kriteria -->
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="kode_kriteria" class="form-control" id="kode_kriteria" placeholder="Kode Kriteria" required>
                        </div>

                        <!-- Input Nama Kriteria -->
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="nama_kriteria" class="form-control" id="nama_kriteria" placeholder="Nama Kriteria" required>
                        </div>

                        <!-- Input Bobot -->
                        <div class="input-group input-group-outline my-3">
                            <input type="number" step="0.01" name="bobot" class="form-control" id="bobot" placeholder="Bobot" required>
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