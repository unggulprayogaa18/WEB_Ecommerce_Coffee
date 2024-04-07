<?php
header('Content-Type: application/json');

include 'koneksi.php';

// Mulai sesi PHP
session_start();

// Inisialisasi langsung username dan password
$username = $_POST['username'];
$password = $_POST['password'];

if (isset($username) && isset($password)) {
    // Mengambil data pengguna dari database berdasarkan username
    $statement = $koneksi->prepare("SELECT * FROM users WHERE username = ?");
    $statement->execute([$username]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user && sha1($password) === $user['password']) {
        // Verifikasi password menggunakan sha1 (sesuai dengan metode Anda)
        $session_token = bin2hex(random_bytes(16));

        $updateStatement = $koneksi->prepare("UPDATE users SET session_token = ? WHERE username = ?");
        $updateStatement->execute([$session_token, $username]);

        // Mengembalikan respons JSON sukses dengan token sesi
        $_SESSION['session_token'] = $session_token;
        $_SESSION['username'] = $username;
        $_SESSION['foto'] = $session_token;


        $status_user = $user['status_user'];

        // Menyusun respons JSON dengan informasi status user
        $response = ['status' => 'success', 'session_token' => $session_token, 'status_user' => $status_user];
        echo json_encode($response);
    } else {
        // Jika verifikasi gagal, kirim pesan kesalahan
        $response = ['status' => 'error', 'message' => 'Kredensial tidak valid'];
        echo json_encode($response);
    }
} else {
    // Jika permintaan tidak valid, kirim pesan kesalahan
    $response = ['status' => 'error', 'message' => 'Permintaan tidak valid'];
    echo json_encode($response);
}
?>
