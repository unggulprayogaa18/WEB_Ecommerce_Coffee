<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $rating = $_POST['rating'];
    $hargasaatini = $_POST['hargasaatini'];
    $hargadiskon = $_POST['hargadiskon'];
    $status = $_POST['status'];

    // Handle file upload
    $upload_dir = "uploads/";
    $target_file = $upload_dir . basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

    try {
        // Menggunakan koneksi yang sudah dibuat di file koneksi.php
        $stmt = $koneksi->prepare("INSERT INTO datacofe (nama, rating, hargasaatini, hargadiskon, status, foto) VALUES (?, ?, ?, ?, ?, ?)");

        // Bind parameter ke prepared statement
        $stmt->bindParam(1, $nama);
        $stmt->bindParam(2, $rating);
        $stmt->bindParam(3, $hargasaatini);
        $stmt->bindParam(4, $hargadiskon);
        $stmt->bindParam(5, $status);
        $stmt->bindParam(6, $target_file);

        // Jalankan prepared statement
        $stmt->execute();

        $success = "Data berhasil disimpan!";
        header("Location: ../mainpage.php?success=" . urlencode($success));
        exit();
    } catch (PDOException $e) {
        die("Error saat mengeksekusi statement: " . $e->getMessage());
    }
}
?>
