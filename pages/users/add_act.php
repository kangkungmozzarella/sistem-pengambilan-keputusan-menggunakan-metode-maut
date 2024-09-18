<?php
include '../../config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role']; // Menambahkan input role

// Menyimpan data ke dalam tabel tbl_user termasuk kolom role
mysqli_query($koneksi, "INSERT INTO tbl_user (username, password, role) VALUES ('$username', '$password', '$role')");

header("Location:index.php");
