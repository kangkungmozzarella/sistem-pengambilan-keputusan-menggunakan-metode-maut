<?php
session_start();  // Memulai session

include 'config_user/koneksi.php';  // Menghubungkan ke database

$action = $_POST['action'];  // Mengambil aksi dari form (login atau register)

if ($action == 'login') {
    // Proses Login
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Mencari pengguna dengan username dan password yang sesuai
    $login = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'");
    $cek = mysqli_num_rows($login);

    if ($cek > 0) {
        // Jika login berhasil
        $data = mysqli_fetch_assoc($login);
        $_SESSION['id'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['status'] = "login";
        header("location:pages_user/dashboard/");  // Arahkan ke dashboard
    } else {
        // Jika login gagal, kembali ke halaman login dengan pesan error
        header("location:index.php?error=invalid_credentials");
    }
} elseif ($action == 'register') {
    // Proses Registrasi
    $name = mysqli_real_escape_string($koneksi, $_POST['name']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Periksa apakah username sudah ada
    $check_user = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$username'");
    if (mysqli_num_rows($check_user) > 0) {
        // Jika username sudah digunakan
        header("location:register.php?error=username_taken");
    } else {
        // Menyimpan pengguna baru ke database
        $register = mysqli_query($koneksi, "INSERT INTO tbl_user (nama, username, password) VALUES ('$name', '$username', '$password')");

        if ($register) {
            // Jika registrasi berhasil, arahkan ke halaman login
            header("location:index.php?success=registered");
        } else {
            // Jika terjadi kesalahan saat registrasi
            header("location:register.php?error=registration_failed");
        }
    }
}
