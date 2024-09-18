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
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit User</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Edit User</h6>
        </nav>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data</h4>
                    <p class="card-description">Silahkan Edit Data</p>
                    <form action="edit_act.php" method="POST">
                        <?php
                        $id = $_GET['id'];
                        include '../../config/koneksi.php';
                        $sql = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE id = '$id'");
                        $data = mysqli_fetch_array($sql);
                        ?>
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">

                        <!-- Input Username -->
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="username" value="<?= $data['username'] ?>" class="form-control" id="username" placeholder="Username" required>
                        </div>

                        <!-- Input Password -->
                        <div class="input-group input-group-outline my-3">
                            <input type="password" name="password" value="<?= $data['password'] ?>" class="form-control" id="password" placeholder="Password" required>
                        </div>

                        <!-- Dropdown Role -->
                        <div class="input-group input-group-outline my-3">
                            <select name="role" class="form-control" required>
                                <option value="admin" <?= $data['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                <option value="user" <?= $data['role'] == 'user' ? 'selected' : '' ?>>User</option>
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