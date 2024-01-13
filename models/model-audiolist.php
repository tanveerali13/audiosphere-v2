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
            $results = [];
            $result = $this->conn->query("SELECT audios.*, audioCategories.audioCategory
                              FROM audios
                              NATURAL JOIN audioCategories 
                              WHERE audios.audioCategoryID = '$categoryID'");
                                          
            while ($row = $result->fetch_assoc()) {
                //var_dump($row);
                $results[] = $row;

            }
            $this->conn->close();
            return $results;
            //return true;
        } else {
            return false;
        }
        
    }

    public function selectToPlay($audioID) {
       
        $this->connect();
        if ($this->conn) {
            $results = [];
            $result = $this->conn->query("SELECT * FROM audios WHERE ID = '$audioID'");
                                          
            while ($row = $result->fetch_assoc()) {
                //var_dump($row);
                $results[] = $row;
            }
            $this->conn->close();
            return $results;
            //return true;
        } else {
            return false;
        }
        
    }
}

?>