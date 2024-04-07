<?php
// edit_profile.php
session_start(); // Start the session if not started

include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$no_telpon = $_POST['nomer_telpon'];
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

if ($username) {
    $updateStmt = $koneksi->prepare("UPDATE users SET nama = :nama, email = :email, no_telpon = :no_telpon WHERE username = :username");

    // Bind parameters
    $updateStmt->bindParam(':nama', $nama);
    $updateStmt->bindParam(':email', $email);
    $updateStmt->bindParam(':no_telpon', $no_telpon);
    $updateStmt->bindParam(':username', $username);

    // Execute the update
    if ($updateStmt->execute()) {
        // Success message
        $response = array('status' => 'success', 'message' => 'Perubahan berhasil disimpan.');
        header('Location: ../profile&ubahpassword.php?notif=' . urlencode($response['message']));
        exit();
    } else {
        // Handle update failure
        echo json_encode(['error' => 'Failed to update profile']);
    }
} else {
    // Handle the case when the username is not set in the session
    // You can redirect the user or show an error message
    echo json_encode(['error' => 'Username not found in session']);
}
?>
