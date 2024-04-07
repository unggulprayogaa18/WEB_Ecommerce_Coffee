<?php
// Sertakan file koneksi di sini
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['nama'])) {
    $nama_to_delete = $_GET['nama'];

    try {
        // Query untuk menghapus data dari tabel datacofe berdasarkan nama
        $query = "DELETE FROM datacofe WHERE nama = ?";
        
        // Buat prepared statement
        $stmt = $koneksi->prepare($query);

        // Bind parameter ke statement
        $stmt->bindParam(1, $nama_to_delete);

        // Eksekusi statement
        if ($stmt->execute()) {
            $success = "Data berhasil dihapus!";
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
