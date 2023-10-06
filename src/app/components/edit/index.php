<?php
$title = "SayIt";
$page = "Edit";

// Include your database connection logic here

// Check if a timeline ID is provided for editing (you can obtain this from the URL or session)
$timelineID = isset($_GET['timeline_id']) ? intval($_GET['timeline_id']) : null;

// Initialize the variable to store the timeline content
$timeline_content = '';

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
                // Set the timeline_content variable with the previous content
                $timeline_content = $timelineData['timeline_content'];
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SayIt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/src/public/img/gimmick.png" type="image/x-icon">
    <link rel="stylesheet" href="/src/public/css/edit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Navbar -->
    <?php include(dirname(__DIR__)) . "/navbar/index.php" ?>

    <section class="container">
        <form action="/src/backend/editTimeline.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="timeline_id" value="<?php echo $timelineID; ?>">

            <!-- Input field for editing timeline content -->
            <div class="input-box">
                <textarea id="timeline_content" name="timeline_content" rows="4" cols="50" placeholder="Edit timeline content" required><?php echo htmlspecialchars($timeline_content); ?></textarea>
            </div>

            <!-- Input field for editing timeline image (if applicable) -->
            <!-- <div class="input-box">
                <label for="timeline_path">Edit Image</label>
                <input type="file" name="timeline_path" accept="image/*">
            </div> -->

            <!-- Display the existing image -->
            <?php if (!empty($timelineData['timeline_path'])): ?>
                <div class="existing-image">
                    <p>Existing Image:</p>
                    <img src="/src/public/media/<?php echo $timelineData['timeline_path']; ?>" alt="Existing Image">
                </div>
            <?php endif; ?>

            <!-- Submit button for editing the timeline -->
            <div class="submit-button">
                <button class="btn" type="submit">Save Changes</button>
            </div>
        </form>
    </section>
</body>
</html>
