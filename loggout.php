<?php
// logout.php
include 'config/koneksi.php';

session_start();

// Periksa apakah pengguna sudah login (sesi username sudah ada)
if (isset($_SESSION['session_token'])) {
    // Hapus nilai session token
    $username = $_SESSION['username'];

    // Update session_token to null in the database for the specified username
    $updateStmt = $koneksi->prepare("UPDATE users SET session_token = null WHERE username = :username");
    $updateStmt->bindParam(':username', $username); // Use only :username for binding

    // Execute the update query
    $updateStmt->execute();

    unset($_SESSION['session_token']);

    // Hapus semua sesi
    session_unset();

    // Hancurkan sesi
    session_destroy();

    // Reset the keranjangcount to 0 in local storage
    echo '<script>localStorage.setItem("keranjangcount", 0);</script>';

    // Redirect ke halaman login setelah logout
    header("Location: login.php");
    exit();
} else {
    // Jika tidak ada sesi username, mungkin pengguna belum login
    // Redirect ke halaman login
    header("Location: login.php");
    exit();
}
?>
