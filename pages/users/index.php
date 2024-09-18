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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Data Users</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Data Users</h6>
                </nav>
            </div>
        </div>
        <!-- Content -->
        <div class="row mt-4">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="add.php" class="btn btn-primary">Add User</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered align-middle text-center">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> Username </th>
                                        <th> Password </th>
                                        <th> Role </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_user");
                                    while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['username'] ?></td>
                                            <td><?= $row['password'] ?></td>
                                            <td><?= $row['role'] ?></td>
                                            <td>
                                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a onclick="return confirm('Apakah Anda ingin menghapus data ini?')" class="btn btn-danger btn-sm" href="delete.php?id=<?= $row['id'] ?>">Delete</a>
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
<?php include '../layout/footers.php'; ?>