<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

class AudioListModel {
    private $conn;
    public function connect(){
        $this->conn = new mysqli("localhost", "audio_tmt", "772Fky&d7", "audiosphere");
    }

    public function selectAudios($categoryID) {
        $this->connect();
        if ($this->conn) {
            $result = $this->conn->query("SELECT * FROM audios
                                          WHERE audioCategoryID = $categoryID");
            while ($row = $result->fetch_assoc()) {
                $results[] = $row;
            }
            $this->conn->close();
            return $results;
        } else {
            return false;
        }
        
    }
}

?>