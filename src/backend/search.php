<?php
$mysqli = require __DIR__ . "/../db.php";

// Get the search query from the AJAX request
$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

// Check if the search query is empty
if (empty($searchQuery)) {
    die("Search query is empty");
}

// Prepare a SQL query to search for results based on the query
$sql = "SELECT * FROM lapor WHERE lapor_nama LIKE ? OR lapor_lokasi LIKE ?";
$stmt = $mysqli->prepare($sql);

if ($stmt === false) {
    die("Preparation failed: " . $mysqli->error);
}

// Bind the parameters and execute the query
$searchParam = "%$searchQuery%"; // Add wildcard '%' to the search query
$stmt->bind_param('ss', $searchParam, $searchParam);
$stmt->execute();

// Get the result set
$result = $stmt->get_result();

$results = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $results[] = array(
            'lapor_jenis' => $row['lapor_jenis'],
            'lapor_nama' => $row['lapor_nama'],
            'lapor_lokasi' => $row['lapor_lokasi'],
            'lapor_tanggal' => $row['lapor_tanggal'],
            'lapor_waktu' => $row['lapor_waktu'],
            'lapor_kronologi' => $row['lapor_kronologi'],
            'lapor_bukti' => $row['lapor_bukti'],
            'lapor_status' => $row['lapor_status']
        );
    }
}

$stmt->close();

// Set the content type header to JSON
header('Content-Type: application/json');

// Return the results as JSON
echo json_encode($results);
exit; // Make sure to exit the script after outputting JSON data
?>