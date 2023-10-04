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
        <link rel="stylesheet" href="/src/public/css/adminLapor.css">        	
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Navbar -->
        <?php include (dirname(__DIR__)) . "/navbar/index.php" ?>
        
        <section class="container">
            <table class="styletable">
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
                echo "<td><a href='#'>View</a></td>";
                echo "<td>";
                echo "<select name='lapor_status[]'>";
                echo "<option  value='pending'>Pending</option>";
                echo "<option  value='in_progress'>In Progress</option>";
                echo "<option value='completed'>Completed</option>";
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
</html>