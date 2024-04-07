<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_nama = $_POST['old_nama'];
    $nama = $_POST['nama'];
    $rating = $_POST['rating'];
    $hargasaatini = $_POST['hargasaatini'];
    $hargadiskon = $_POST['hargadiskon'];
    $status = $_POST['status'];

    // Handle file upload
    $upload_dir = "uploads/";
    $target_file = $upload_dir . basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

    // Jika ada file baru di-upload, gunakan path yang baru. Jika tidak, gunakan path yang lama
    $foto_path = empty($_FILES["foto"]["name"]) ? $_POST['old_foto'] : $target_file;

    try {
        // Lanjutkan dengan mengupdate informasi ke database
        $query = "UPDATE datacofe SET nama=?, rating=?, hargasaatini=?, hargadiskon=?, status=?, foto=? WHERE nama=?";
        $stmt = $koneksi->prepare($query);

        $stmt->bindParam(1, $nama);
        $stmt->bindParam(2, $rating);
        $stmt->bindParam(3, $hargasaatini);
        $stmt->bindParam(4, $hargadiskon);
        $stmt->bindParam(5, $status);
        $stmt->bindParam(6, $foto_path);
        $stmt->bindParam(7, $old_nama);

        if ($stmt->execute()) {
            $success = "Data berhasil diupdate!";
            header("Location: ../mainpage.php?success=" . urlencode($success));
            exit();
        } else {
            die("Error saat mengeksekusi statement: " . $stmt->errorInfo()[2]);
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        // Tutup statement
        $stmt = null;
    }
}

// Tutup koneksi
$koneksi = null;
?>
