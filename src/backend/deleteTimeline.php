<?php
if (isset($_POST['delete'])) {
    $timelineID = $_POST['timeline_id']; // Use uppercase "ID" to match the variable name
    $query = 'DELETE FROM timeline WHERE timeline_id = ?';
    $mysqli = require __DIR__ . '/../db.php';
    $stmt = $mysqli->stmt_init();

    if ($stmt->prepare($query)) {
        $stmt->bind_param('i', $timelineID); // Use uppercase "ID" to match the variable name

        if ($stmt->execute()) {
            //direct to home
            // echo "berhasil";
            // header('Location: /?ruangdiskusi');
            echo "<script>window.location.href='/?ruangdiskusi';</script>";
            exit; // Add this line to stop script execution after redirection
        } else {
            echo $mysqli->error;
        }
    } else {
        die('Prepare failed: (' . $mysqli->errno . ') ' . $mysqli->error);
    }

    $stmt->close();
    $mysqli->close();
}
