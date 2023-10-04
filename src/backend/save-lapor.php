<?php
// Assuming you have established a database connection
$mysqli = require __DIR__ . "/../db.php";
$stmt = $mysqli->stmt_init();

if (isset($_POST["save"])) {
    echo "disini";
    // Prepare the SQL query outside the loop
    $sql = "UPDATE lapor SET lapor_status = ? WHERE lapor_id = ?";
    $stmt->prepare($sql);
    
    // Check if the prepare statement was successful
    if (!$stmt) {
        echo "Prepare failed: " . $mysqli->error;
        exit;
    }

    // Loop through the posted status data and update the database
    // echo $_POST["lapor_status"];
    if (isset($_POST["lapor_status"]) && is_array($_POST["lapor_status"])) {
        foreach ($_POST["lapor_status"] as $key => $status) {
            echo "haha";
            // Get the corresponding lapor_id for each status
            $lapor_id = $key + 1; // Add appropriate logic to get the correct lapor_id
            
            // Bind parameters and execute the SQL query to update the status
            $stmt->bind_param("si", $status, $lapor_id);
            $stmt->execute();
        }
    }
    echo "close";
    // Close the statement
    $stmt->close();

    // Close the database connection
    $mysqli->close();

    // Redirect or provide a success response
    exit;
}
?>
