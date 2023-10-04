<?php
$mysqli = require __DIR__ . "/../db.php";


$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';


if (empty($searchQuery)) {
    die("Search query is empty");
}

$sql = "SELECT * FROM article WHERE article_judul LIKE ? OR article_content LIKE ?";
$stmt = $mysqli->prepare($sql);

if ($stmt === false) {
    die("Preparation failed: " . $mysqli->error);
}

$searchParam = "%$searchQuery%"; 
$stmt->bind_param('ss', $searchParam, $searchParam);
$stmt->execute();


$result = $stmt->get_result();

$results = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
       
        $results[] = $row;
    }
}

$stmt->close();


header('Content-Type: application/json');


echo json_encode($results);
exit; 
?>
