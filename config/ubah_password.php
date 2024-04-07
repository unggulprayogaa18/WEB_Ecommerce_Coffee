<?php
// edit_profile.php
session_start(); // Start the session if not started

include 'koneksi.php';

// Assuming that you are using the POST method to send the plain password
$plainPassword = $_POST['password'];
$hashedPassword = sha1($plainPassword); // Using SHA-1 for hashing (Note: SHA-1 is not recommended for security reasons, consider using a stronger hashing algorithm)

$username = $_POST['username'];

$updateStmt = $koneksi->prepare("UPDATE users SET password = :password WHERE username = :username");

// Bind parameters
$updateStmt->bindParam(':password', $hashedPassword);
$updateStmt->bindParam(':username', $username);

// Execute the update
if ($updateStmt->execute()) {
    // Success message
    $response = array('status' => 'success', 'message' => 'Perubahan berhasil disimpan.');
    header('Location: ../profile&ubahpassword.php?notif=' . urlencode($response['message']));
    exit();
} else {
    // Handle update failure
    echo json_encode(['error' => 'Failed to update password']);
}
// Handle the case when the username is not set in the session
// You can redirect the user or show an error message
?>
