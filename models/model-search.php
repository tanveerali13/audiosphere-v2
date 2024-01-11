<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

class SearchModel {
    private $conn;
    public function connect(){
        $this->conn = new mysqli("localhost", "audio_tmt", "772Fky&d7", "audiosphere");
    }

    public function selectAudioTitles() {
        $this->connect();
        if ($this->conn) {
            $result = $this->conn->query("SELECT audioTitle FROM audios");
            if ($result->num_rows > 0) {
                $audioTitles = array();
            
                while ($row = $result->fetch_assoc()) {
                    $audioTitles[] = $row['audioTitle'];
                }
            
                // Convert the array to JSON
                $jsonResult = json_encode($audioTitles);
            
                // Output the JSON to a file
                file_put_contents('audioTitles.json', $jsonResult);
            
                //echo "Audio titles have been exported to audioTitles.json";
                //echo $jsonResult;
            } else {
                echo "No audio titles found.";
            }
            
            $this->conn->close();
        } else {
            return false;
        }
    }

    public function selectCategory()
    {   
        $this->connect();
        if ($this->conn) {
            $results = [];
            $result = $this->conn->query("SELECT * FROM audioCategories");

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


