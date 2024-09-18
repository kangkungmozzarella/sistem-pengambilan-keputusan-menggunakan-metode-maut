<?php
include '../../config/koneksi.php';

$id  = $_POST['id'];
$username = $_POST['username'];
$pwd = $_POST['password'];
$role = $_POST['role'];

// Prepare the SQL statement to prevent SQL injection
$stmt = $koneksi->prepare("UPDATE tbl_user SET username=?, password=?, role=? WHERE id=?");
$stmt->bind_param("sssi", $username, $pwd, $role, $id);

if ($stmt->execute()) {
    // Redirect to index.php with a success alert
    header("location:index.php?alert=edit");
} else {
    // Handle the error if needed
    echo "Error: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
