<?php
require_once __DIR__ . "/../../db.php";
require_once __DIR__ . "/../core/database.php";
class laporModel extends Database{
    private $database;
    public function __construct(){
        $this->database = new Database;
    }

    public function checkStatus($status){
        $query = 'SELECT lapor_status FROM lapor WHERE lapor_status = :status';
        $this->database->query($query);
        $this->database->bind('s', $status);

        $status = $this->database->fetch();

        return $status;
    }

    public function getLaporByID($laporID){
        $query = 'SELECT lapor_id, user_id FROM lapor WHERE lapor_id = :id';
        $this->database->query($query);
        $this->database->bind('i', $laporID);

        $lapor_id = $this->database->fetch();

        return $lapor_id;
    }

    public function addLaporan($user_id, $lapor_jenis, $lapor_nama, $lapor_lokasi, $lapor_tanggal, $lapor_waktu, $lapor_kronologi, $lapor_bukti, $lapor_status){
        $query = 'INSERT INTO lapor(user_id, lapor_jenis, lapor_nama, lapor_lokasi, lapor_tanggal, lapor_waktu, lapor_kronologi, lapor_bukti, lapor_status)
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $mysqli = require  __DIR__ . '/../../db.php';

        $stmt = $mysqli->stmt_init();

        if ($stmt->prepare($query)) {

            $stmt->bind_param('issssssss', $_SESSION["user_id"], $lapor_jenis, $lapor_nama, $lapor_lokasi, $lapor_tanggal, $lapor_waktu, $lapor_kronologi, $lapor_bukti, $lapor_status);

            if ($stmt->execute()) {
                //direct to home
                header('Location: /?home');
            } else {
                echo $mysqli->error;
            }
        } else {
            die('Prepare failed: (' . $mysqli->errno . ') ' . $mysqli->error);
        }

        $stmt->close();
        $mysqli->close();
        // $this->database->bind('user_id', $_SESSION['user_id']);
        // $this->database->bind('lapor_jenis', $lapor_jenis);
        // $this->database->bind('lapor_nama', $lapor_nama);
        // $this->database->bind('lapor_lokasi', $lapor_lokasi);
        // $this->database->bind('lapor_tanggal', $lapor_tanggal);
        // $this->database->bind('lapor_waktu', $lapor_waktu);
        // $this->database->bind('lapor_kronologi', $lapor_kronologi);
        // $this->database->bind('lapor_bukti', $lapor_bukti);
        // $this->database->bind('lapor_status', $lapor_status);
        // $this->database->execute();
    }

    public function changeStatus($lapor_status){
        $query = 'UPDATE lapor SET lapor_status = :lapor_status WHERE lapor_id = :lapor_id';

        $this->database->query($query);
        $this->database->bind('lapor_status', $lapor_status);
        $this->database->execute();
    }

    public function deleteLapor($laporID){
        $query = 'DELETE FROM lapor WHERE lapor_id = :lapor_id';

        $this->database->query($query);
        $this->database->bind('lapor_id', $laporID);
        $this->database->execute();
    }
}