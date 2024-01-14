<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

class ConnectionObject {
    public function __construct(public $host, public $username, public $password, public $database) {
    }
}

class HomeSliders {
    private $conn;
    private $connectionObject;

    public function __construct(ConnectionObject $connectionObject) {
        $this->connectionObject = $connectionObject;
    }

    public function connect() {
        try {
            $this->conn = new mysqli(
                $this->connectionObject->host,
                $this->connectionObject->username,
                $this->connectionObject->password,
                $this->connectionObject->database
            );

            if ($this->conn->connect_error) {
                throw new Exception('Could not connect');
            }
            return $this->conn;
        } catch (Exception $e) {
            return false;
        }
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
