<?php
require_once __DIR__ . "/../../db.php";
require_once __DIR__ . "/../core/database.php";
class timelineModel extends Database{
    private $database;
    public function __construct(){
        $this->database = new Database;
    }

    public function getUserName($user_id){
        $query = 'SELECT user_name FROM user WHERE user_id = ?';
        $mysqli = require  __DIR__ . '/../../db.php';
        $stmt = $mysqli->stmt_init();

        if ($stmt->prepare($query)) {

            $stmt->bind_param('i', $user_id);

            if ($stmt->execute()) {
                $stmt->bind_result($username);
                if ($stmt->fetch()) {
                    return $username;
                }
            } else {
                echo $mysqli->error;
            }
        } else {
            die('Prepare failed: (' . $mysqli->errno . ') ' . $mysqli->error);
        }

        $stmt->close();
        $mysqli->close();
        // return $username;
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

    public function editTimeline($user_id, $timelineID, $timeline_content, $timeline_path){
        $query = 'UPDATE timeline SET timeline_content = ?, timeline_path = ?, WHERE timeline_id = $_GET["timeline_id"]';
        $mysqli = require  __DIR__ . '/../../db.php';
        $stmt = $mysqli->stmt_init();

        if ($stmt->prepare($query)) {

            $stmt->bind_param('iiss', $_SESSION["user_id"], $timeline_content, $timeline_path);

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
        $query = 'DELETE FROM timeline WHERE timeline_id = ?';
        $mysqli = require  __DIR__ . '/../../db.php';
        $stmt = $mysqli->stmt_init();

        if ($stmt->prepare($query)) {

            $stmt->bind_param('i', $timelineID);

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

    public function postTimeline($user_id, $timeline_content, $timeline_date, $timeline_path){
        $query = 'INSERT INTO timeline(user_id, timeline_content, timeline_date, timeline_path) VALUES (?, ?, ?, ?)';
        $mysqli = require  __DIR__ . '/../../db.php';
        $stmt = $mysqli->stmt_init();

        if ($stmt->prepare($query)) {

            $stmt->bind_param('isss', $_SESSION["user_id"], $timeline_content, $timeline_date, $timeline_path);

            if ($stmt->execute()) {
                //direct to home
                // header('Location: /?ruangdiskusi');
                echo "<script>window.location.href='/?ruangdiskusi';</script>";
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