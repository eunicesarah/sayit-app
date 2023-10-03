<?php

class timelineMode extends Database{
    private $database;
    public function __construct(){
        $this->database = new Database;
    }

    public function getTimeline(){
        $query = 'SELECT * FROM timeline';
        $this->database->query($query);
        $timeline = $this->database->fetch();
        return $timeline;
    }
    public function getTimelineByID($timelineID){
        $query = 'SELECT * FROM timeline WHERE timeline_id = :id';
        $mysqli = require  __DIR__ . '/../../db.php';
        $stmt = $mysqli->stmt_init();

        if ($stmt->prepare($query)) {

            $this->stmt->bind_param('i', $timelineID);

            if ($stmt->execute()) {
                //direct to home
                // header('Location: /?ruangdiskusi');
            } else {
                echo $mysqli->error;
            }
        } else {
            die('Prepare failed: (' . $mysqli->errno . ') ' . $mysqli->error);
        }

        $stmt->close();
        $mysqli->close();
        return $timeline_id;
    }

    public function editTimeline($user_id, $timelineID, $timeline_content, $timeline_berkas){
        $query = 'UPDATE timeline SET timeline_content = ?, timeline_berkas = ?, WHERE timeline_id = $_GET["timeline_id"]';
        $mysqli = require  __DIR__ . '/../../db.php';
        $stmt = $mysqli->stmt_init();

        if ($stmt->prepare($query)) {

            $this->stmt->bind_param('iiss', $_SESSION["user_id"], $timeline_content, $timeline_berkas);

            if ($stmt->execute()) {
                //direct to home
                header('Location: /?ruangdiskusi');
            } else {
                echo $mysqli->error;
            }
        } else {
            die('Prepare failed: (' . $mysqli->errno . ') ' . $mysqli->error);
        }

        $stmt->close();
        $mysqli->close();
    }

    public function deleteTimeline($timelineID){
        $query = 'DELETE FROM timeline WHERE timeline_id = $_GET["timeline_id"]';
        $mysqli = require  __DIR__ . '/../../db.php';
        $stmt = $mysqli->stmt_init();

        if ($stmt->prepare($query)) {

            $this->stmt->bind_param('i', $timelineID);

            if ($stmt->execute()) {
                //direct to home
                header('Location: /?ruangdiskusi');
            } else {
                echo $mysqli->error;
            }
        } else {
            die('Prepare failed: (' . $mysqli->errno . ') ' . $mysqli->error);
        }

        $stmt->close();
        $mysqli->close();
    }

    public function postTimeline($user_id, $timeline_content, $timeline_berkas){
        $query = 'INSERT INTO timeline(user_id, timeline_content, timeline_tanggal, timeline_waktu, timeline_berkas) VALUES (?, ?, ?, ?, ?)';
        $mysqli = require  __DIR__ . '/../../db.php';
        $stmt = $mysqli->stmt_init();

        if ($stmt->prepare($query)) {

            $stmt->bind_param('issss', $_SESSION["user_id"], $timeline_content, $timeline_berkas);

            if ($stmt->execute()) {
                //direct to home
                header('Location: /?ruangdiskusi');
            } else {
                echo $mysqli->error;
            }
        } else {
            die('Prepare failed: (' . $mysqli->errno . ') ' . $mysqli->error);
        }

        $stmt->close();
        $mysqli->close();
    }
}