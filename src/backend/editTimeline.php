<?php

// Include your database connection logic here

// Check if a timeline ID is provided for editing (you can obtain this from the URL or session)
$timelineID = isset($_GET['timeline_id']) ? intval($_GET['timeline_id']) : null;

// Initialize variables to hold form data
$timeline_content = '';
$timeline_path = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the "timeline_id" key exists in the $_POST array
    if (isset($_POST['timeline_id'])) {
        // Get the timeline ID from the $_POST array
        $timelineId = $_POST['timeline_id'];

        // Check if the "timeline_content" key exists in the $_POST array
        if (isset($_POST['timeline_content'])) {
            // Get the edited timeline content from the $_POST array
            $timeline_content = $_POST['timeline_content'];
        }

        // Check if a file was uploaded
        if (isset($_FILES['timeline_path']) && $_FILES['timeline_path']['error'] === UPLOAD_ERR_OK) {
            // Process the uploaded file, save it to a directory, and set $timeline_path
            $uploadedFileName = $_FILES['timeline_path']['name'];
            // Save the uploaded file and set $timeline_path
            $timeline_path = $uploadedFileName;
        }

        // Your query to update the timeline
        $query = 'UPDATE timeline SET timeline_content = ?, timeline_path = ? WHERE timeline_id = ?';

        // Include your database connection logic here
        $mysqli = require __DIR__ . '/../db.php';
        $stmt = $mysqli->stmt_init();

        if ($stmt->prepare($query)) {
            // Bind parameters
            $stmt->bind_param('ssi', $timeline_content, $timeline_path, $timelineId);

            if ($stmt->execute()) {
                // Direct to the appropriate page after successful update
                header('Location: /?ruangdiskusi');
                exit; // Make sure to exit after redirecting
            } else {
                echo $mysqli->error;
            }
        } else {
            die('Prepare failed: (' . $mysqli->errno . ') ' . $mysqli->error);
        }

        $stmt->close();
        $mysqli->close();
    } else {
        // Handle the case where "timeline_id" is not provided in $_POST
        echo "Timeline ID not provided.";
    }
}

// Query to fetch the timeline data based on timeline_id
if ($timelineID) {
    $query = "SELECT * FROM timeline WHERE timeline_id = ?";
    $mysqli = require __DIR__ . '/../../../db.php';
    $stmt = $mysqli->stmt_init();

    if ($stmt->prepare($query)) {
        $stmt->bind_param('i', $timelineID);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result && $result->num_rows > 0) {
                $timelineData = $result->fetch_assoc();
                // Debugging: Output the fetched data
                // var_dump($timelineData);

                // Assign values to timeline_content and timeline_path for pre-filling the form
                $timeline_content = $timelineData['timeline_content'];
                $timeline_path = $timelineData['timeline_path'];
            } else {
                // Handle the case where the timeline post with the provided ID does not exist.
                echo "Timeline post not found.";
                exit;
            }
        } else {
            echo $mysqli->error;
        }
    } else {
        die('Prepare failed: (' . $mysqli->errno . ') ' . $mysqli->error);
    }
    $stmt->close();
    $mysqli->close();
} else {
    // Handle the case where no timeline ID is provided. You can redirect or display an error.
    echo "Timeline ID not provided.";
    exit;
}