<?php
header('Content-Type: application/json');

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if username and password are not empty
    if (empty($username) || empty($password) || empty($confirmPassword)) {
        echo json_encode(['status' => 'failed', 'message' => 'Username and password cannot be empty']);
        exit;
    }

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo json_encode(['status' => 'failed', 'message' => 'Passwords do not match']);
        exit;
    }

    try {
        // Insert the new user into the database
        $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $koneksi->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password); // Note: No password hashing
        $stmt->execute();

        echo json_encode(['status' => 'success']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    } finally {
        $stmt = null;
    }

    $koneksi = null;
}
?>
