<?php
$title = "SayIt";
$page = "adminLapor";

$servername = "db";
$username = "php_docker";
$password = "password";
$dbname = "php_docker";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// $conn = mysqli_connect(
//     $hostname = ini_get("mysqli.default_host"),
//     $username = ini_get("mysqli.default_user"),
//     $password = ini_get("mysqli.default_pw"),
//     $database = "",
//     $port = ini_get("mysqli.default_port"),
//     $socket = ini_get("mysqli.default_socket")
// );
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM lapor";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SayIt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/src/public/img/gimmick.png" type="image/x-icon">
    <link rel="stylesheet" href="/src/public/css/adminLapor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- Navbar -->
    <?php include(dirname(__DIR__)) . "/navbar/index.php" ?>

    <section class="container">
    <div class="search-container">
            <input type="text" id="search" placeholder="Search...">
            <button id="sort-date" name="sortBy">Sort by Date</button>
            <button id="sort-alphabet" name="sortBy">Sort Alphabetically</button>
            <select id="filter-category" name="category">
                <option value="">Filter by Category</option>
                <option value="Saksi">Saksi</option>
                <option value="Korban">Korban</option>
                <!-- Add more categories as needed -->
            </select>
            <select id="filter-status" name="status">
                <option value="">Filter by Status</option>
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>
        <div id="search-results"></div>


        <table class="styletable" id="tableBody">
            <thead>
                <tr>
                    <th>Nama Pengguna</th>
                    <th>Peran</th>
                    <th>Lokasi Kejadian</th>
                    <th>Tanggal Kejadian</th>
                    <th>Waktu Kejadian</th>
                    <th>Kronologi</th>
                    <th>Bukti</th>
                    <th>Status</th>
                </tr>
                <form for="save" action="/src/backend/save-lapor.php" method="post">

            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["lapor_nama"] . "</td>";
                        echo "<td>" . $row["lapor_jenis"] . "</td>";
                        echo "<td>" . $row["lapor_lokasi"] . "</td>";
                        echo "<td>" . $row["lapor_tanggal"] . "</td>";
                        echo "<td>" . $row["lapor_waktu"] . "</td>";
                        echo "<td>" . $row["lapor_kronologi"] . "</td>";
                        echo "<td>" ;
                        if ($row["lapor_bukti"]) {
                            $bukti_path = "/src/public/bukti/" . $row['lapor_bukti'];
                            $file_extension = pathinfo($bukti_path, PATHINFO_EXTENSION);
                        
                            if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                // Tampilkan gambar jika ekstensi file adalah gambar
                                echo '<img src="' . $bukti_path . '">';
                            } elseif ($file_extension == 'mp4') {
                                // Tampilkan video jika ekstensi file adalah mp4
                                echo '<video width="320" height="240" controls>';
                                echo '<source src="' . $bukti_path . '" type="video/mp4">';
                                echo '</video>';
                            }
                        }"</td>";
                        echo "<td>";
                        echo "<select name='lapor_status[]'>";
                        echo "<option value='pending' " . ($row["lapor_status"] == 'pending' ? 'selected' : '') . ">Pending</option>";
                        echo "<option value='in_progress' " . ($row["lapor_status"] == 'in_progress' ? 'selected' : '') . ">In Progress</option>";
                        echo "<option value='completed' " . ($row["lapor_status"] == 'completed' ? 'selected' : '') . ">Completed</option>";
                        echo "</select>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='notfound'>No records found</td></tr>";
                }
                ?>

                </tbdody>

        </table>
        <button type="submit" class="savebtn" name="save">Save</button>
        </form>
    </section>

</body>
<script src="src/public/js/admin.js"></script>

</html>