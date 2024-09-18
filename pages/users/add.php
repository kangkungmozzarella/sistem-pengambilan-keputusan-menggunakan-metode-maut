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
                    <a class="opacity-5 text-dark" href="../users/">Data Users</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tambah User</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Tambah User</h6>
        </nav>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data</h4>
                    <p class="card-description">Silahkan Masukan Data</p>
                    <form action="add_act.php" method="POST">
                        <!-- Input Username -->
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                        </div>

                        <!-- Input Password -->
                        <div class="input-group input-group-outline my-3">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        </div>

                        <!-- Dropdown Role -->
                        <div class="input-group input-group-outline my-3">
                            <select name="role" class="form-control" id="role" required>
                                <option value="" disabled selected>Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
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