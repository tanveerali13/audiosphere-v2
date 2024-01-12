<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

class HomeSliders {
    private $conn;

    public function connect() {
        $this->conn = new mysqli("localhost", "audio_tmt", "772Fky&d7", "audiosphere");
    }

    public function getAudioDataForCategory($categoryId) {
        $result = $this->conn->query("SELECT ID, audioTitle, audioThumb FROM audios WHERE audioCategoryId = $categoryId ORDER BY audioCreated DESC LIMIT 10");

        $audioData = array();
        while ($row = $result->fetch_assoc()) {
            $audioData[] = array(
                'audioID' => $row['ID'],
                'audioTitle' => $row['audioTitle'],
                'audioThumb' => $row['audioThumb']
            );
        }

        return $audioData;
    }

    public function getAllCategories() {
        $categories = array();
        $result = $this->conn->query("SELECT audioCategoryID, audioCategory FROM audioCategories");

        while ($row = $result->fetch_assoc()) {
            $categories[] = array(
                'categoryId' => $row['audioCategoryID'],
                'categoryTitle' => $row['audioCategory']
            );
        }

        return $categories;
    }
}
?>
