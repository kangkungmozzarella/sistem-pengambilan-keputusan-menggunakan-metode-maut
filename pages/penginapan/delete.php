<?php
include '../../config/koneksi.php';

$id = $_GET['id'];

// Menggunakan prepared statement untuk mencegah SQL injection
$stmt = $koneksi->prepare("DELETE FROM tbl_penginapan WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // Redirect ke index.php dengan alert sukses
    header("location:index.php?alert=hapus");
} else {
    // Tangani error jika diperlukan
    echo "Error: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
