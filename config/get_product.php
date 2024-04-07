<?php
header('Content-Type: application/json');

// Assuming you have a database connection established already
include 'koneksi.php';

// Fetch data based on product names passed from the client-side
if (isset($_POST['productNames'])) {
    $productNames = $_POST['productNames'];

    try {
        // Create a PDO instance
        $placeholders = rtrim(str_repeat('?,', count($productNames)), ',');
        $query = "SELECT nama, hargasaatini, hargadiskon, foto FROM data_cofe WHERE nama IN ({$placeholders})";

        $stmt = $koneksi->prepare($query);
        $stmt->execute($productNames);

        $data = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        // Return the data as JSON to the client-side
        echo json_encode($data);
    } catch (PDOException $e) {
        // Handle database connection errors
        echo json_encode(['error' => $e->getMessage()]);
    }
}
?>
