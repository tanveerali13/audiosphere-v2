<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

class ConnectionObject {
    public function __construct(public $host, public $username, public $password, public $database) {
    }
}

class SearchModel {
    private $conn;
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

    public function selectAudioTitles() {
        $this->connect();
        if ($this->conn) {
            $result = $this->conn->query("SELECT ID, audioTitle FROM audios");
            if ($result->num_rows > 0) {
                $audioData = array();

                while ($row = $result->fetch_assoc()) {
                    $audioData[] = array(
                        'ID' => $row['ID'],
                        'audioTitle' => $row['audioTitle']
                    );
                }

                // Convert the array to JSON
                $jsonResult = json_encode($audioData);

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

    public function selectCategory() {
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
