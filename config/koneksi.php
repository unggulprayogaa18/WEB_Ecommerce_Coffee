<?php
/** @var \PDO|null $koneksi */

try {
    $koneksi = new PDO("mysql:host=localhost;dbname=uts_abdulahsidik", "root", "");

    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>
