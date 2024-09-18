<?php
include '../../config/koneksi.php';

$kode_kriteria = $_POST['kode_kriteria'];
$nama_kriteria = $_POST['nama_kriteria'];
$bobot = $_POST['bobot'];

// Mengamankan data dari injeksi SQL
$kode_kriteria = mysqli_real_escape_string($koneksi, $kode_kriteria);
$nama_kriteria = mysqli_real_escape_string($koneksi, $nama_kriteria);
$bobot = mysqli_real_escape_string($koneksi, $bobot);

// Menambahkan data baru ke tabel tbl_kriteria
$query = "INSERT INTO tbl_kriteria (kode_kriteria, nama_kriteria, bobot) VALUES ('$kode_kriteria', '$nama_kriteria', '$bobot')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    // Menghitung total bobot untuk normalisasi
    $total_bobot_query = mysqli_query($koneksi, "SELECT SUM(bobot) as total_bobot FROM tbl_kriteria");
    $total_bobot_result = mysqli_fetch_array($total_bobot_query);
    $total_bobot = $total_bobot_result['total_bobot'];

    // Menghitung nilai normalisasi dan mengupdate untuk kriteria yang baru saja ditambahkan
    $normalisasi = $bobot / $total_bobot;
    $update_normalisasi_query = "UPDATE tbl_kriteria SET normalisasi='$normalisasi' WHERE kode_kriteria='$kode_kriteria'";
    mysqli_query($koneksi, $update_normalisasi_query);

    // Redirect ke halaman index dengan alert tambah
    header("Location: index.php?alert=tambah");
} else {
    // Jika terjadi kesalahan, tampilkan pesan error
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
