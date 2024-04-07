<?php
// Sertakan file koneksi di sini
include 'koneksi.php';

try {
    // Query untuk mengambil semua data dari tabel datacofe
    $query = "SELECT * FROM datacofe";

    // Eksekusi query
    $result = $koneksi->query($query);

    // Periksa apakah query berhasil dijalankan
    if ($result) {
        // Cek apakah ada data yang ditemukan
        if ($result->rowCount() > 0) {
            // Tampilkan data
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // Output data sesuai kebutuhan 
                echo "no: " . $row['no'] . "<br>";
                echo "Nama: " . $row['nama'] . "<br>";
                echo "Rating: " . $row['rating'] . "<br>";
                echo "Harga Saat Ini: " . $row['hargasaatini'] . "<br>";
                echo "Harga Diskon: " . $row['hargadiskon'] . "<br>";
                echo "Status: " . $row['status'] . "<br>";
                // Tambahkan kode untuk menampilkan gambar jika perlu
                echo "<hr>";
            }
        } else {
            echo "Tidak ada data yang ditemukan";
        }
    } else {
        // Tampilkan pesan error jika query tidak berhasil dijalankan
        echo "Error: " . $koneksi->errorInfo()[2];
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
} finally {
    // Tutup koneksi PDO
    $koneksi = null;
}
?>
