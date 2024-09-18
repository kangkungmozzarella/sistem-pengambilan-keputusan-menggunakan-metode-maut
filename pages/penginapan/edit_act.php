<?php
include '../../config/koneksi.php';

$id = $_POST['id'];
$nama_penginapan = $_POST['nama_penginapan'];
$harga_kamar = $_POST['harga_kamar'];
$fasilitas = $_POST['fasilitas'];
$rating = $_POST['rating'];
$jarak_lokasi = $_POST['jarak_lokasi'];
$jenis_penginapan = $_POST['jenis_penginapan'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$link_penginapan = $_POST['link_penginapan']; // Menambahkan link_penginapan

// Prepare the SQL statement to prevent SQL injection
$stmt = $koneksi->prepare("UPDATE tbl_penginapan SET nama_penginapan=?, harga_kamar=?, fasilitas=?, rating=?, jarak_lokasi=?, jenis_penginapan=?, latitude=?, longitude=?, link_penginapan=? WHERE id=?");
$stmt->bind_param("sssssssdsi", $nama_penginapan, $harga_kamar, $fasilitas, $rating, $jarak_lokasi, $jenis_penginapan, $latitude, $longitude, $link_penginapan, $id);

if ($stmt->execute()) {
    // Redirect to index.php with a success alert
    header("location:index.php?alert=edit");
} else {
    // Handle the error if needed
    echo "Error: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
