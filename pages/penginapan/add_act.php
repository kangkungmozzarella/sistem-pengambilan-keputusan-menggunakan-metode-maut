<?php
include '../../config/koneksi.php';

$nama_penginapan = $_POST['nama_penginapan'];
$harga_kamar = $_POST['harga_kamar'];
$fasilitas = $_POST['fasilitas'];
$rating = $_POST['rating'];
$jarak_lokasi = $_POST['jarak_lokasi'];
$jenis_penginapan = $_POST['jenis_penginapan'];
$latitude = $_POST['latitude']; // Menambahkan latitude
$longitude = $_POST['longitude']; // Menambahkan longitude
$link_penginapan = $_POST['link_penginapan']; // Menambahkan link_penginapan

// Menggunakan prepared statement untuk mencegah SQL injection
$stmt = $koneksi->prepare("INSERT INTO tbl_penginapan (nama_penginapan, harga_kamar, fasilitas, rating, jarak_lokasi, jenis_penginapan, latitude, longitude, link_penginapan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $nama_penginapan, $harga_kamar, $fasilitas, $rating, $jarak_lokasi, $jenis_penginapan, $latitude, $longitude, $link_penginapan);

if ($stmt->execute()) {
    // Redirect ke index.php setelah berhasil menambah data
    header("Location:index.php");
} else {
    // Tangani error jika diperlukan
    echo "Error: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
