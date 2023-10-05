<?php
ob_start();
$mysqli = require __DIR__ . "/../db.php";

// Get the search query from the AJAX request
$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

// Get query parameters for sorting and filtering
$sortBy = isset($_GET['sort']) ? $_GET['sort'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';

try {
    // Prepare a base SQL query
    $sql = "SELECT * FROM lapor WHERE (lapor_nama LIKE ? OR lapor_lokasi LIKE ?)";

    // Add sorting condition to the SQL query
    if ($sortBy === 'date') {
        $sql .= " ORDER BY lapor_tanggal ASC";
    } elseif ($sortBy === 'alphabet') {
        $sql .= " ORDER BY lapor_nama ASC";
    }

    // Add filtering conditions to the SQL query
    if (!empty($category) || !empty($status)) {
        $sql .= " AND (1=1"; // Start the subclause

        if (!empty($category)) {
            $sql .= " AND lapor_jenis = ?";
        }

        if (!empty($status)) {
            $sql .= " AND lapor_status = ?";
        }

        $sql .= ")"; // End the subclause
    }

    $stmt = $mysqli->prepare($sql);

    if ($stmt === false) {
        throw new Exception("Preparation failed: " . $mysqli->error);
    }

    // Bind the parameters based on the conditions
    $searchParam = "%$searchQuery%";
    
    // Create an array to hold the parameters and types
    $params = array('ss', $searchParam, $searchParam);

    // Bind category and status parameters if they are specified
    if (!empty($category)) {
        $params[0] .= 's';
        $params[] = $category;
    }

    if (!empty($status)) {
        $params[0] .= 's';
        $params[] = $status;
    }

    // Use call_user_func_array to bind parameters dynamically
    call_user_func_array(array($stmt, 'bind_param'), $params);

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
    ob_clean(); 
    // Set the content type header to JSON
    header('Content-Type: application/json');

    // Return the results as JSON
    echo json_encode($results);
    exit; // Make sure to exit the script after outputting JSON data
} catch (Exception $e) {
    // Handle the exception gracefully
    // header("HTTP/1.1 500 Internal Server Error");
    echo json_encode(array('error' => $e->getMessage()));
    exit;
}
?>
