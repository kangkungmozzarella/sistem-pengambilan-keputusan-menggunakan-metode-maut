<?php
include '../../config/koneksi.php';

$kode_kriteria = $_POST['kode_kriteria'];
$nama_kriteria = $_POST['nama_kriteria'];
$bobot = $_POST['bobot'];

// Mengamankan data dari injeksi SQL
$kode_kriteria = mysqli_real_escape_string($koneksi, $kode_kriteria);
$nama_kriteria = mysqli_real_escape_string($koneksi, $nama_kriteria);
$bobot = mysqli_real_escape_string($koneksi, $bobot);

// Melakukan update pada tabel tbl_kriteria berdasarkan kode_kriteria
$query = "UPDATE tbl_kriteria SET nama_kriteria='$nama_kriteria', bobot='$bobot' WHERE kode_kriteria='$kode_kriteria'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    // Menghitung ulang nilai normalisasi setelah update bobot
    $total_bobot_query = mysqli_query($koneksi, "SELECT SUM(bobot) as total_bobot FROM tbl_kriteria");
    $total_bobot_result = mysqli_fetch_array($total_bobot_query);
    $total_bobot = $total_bobot_result['total_bobot'];

    // Update nilai normalisasi
    $normalisasi = $bobot / $total_bobot;
    $update_normalisasi_query = "UPDATE tbl_kriteria SET normalisasi='$normalisasi' WHERE kode_kriteria='$kode_kriteria'";
    mysqli_query($koneksi, $update_normalisasi_query);

    // Redirect ke halaman index dengan alert edit
    header("Location: index.php?alert=edit");
} else {
    // Jika terjadi kesalahan, tampilkan pesan error
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
