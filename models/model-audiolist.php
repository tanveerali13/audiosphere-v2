<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

class ConnectionObject {
    public function __construct(public $host, public $username, public $password, public $database) {
    }
}

class AudioListModel {
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

    public function selectAudios($categoryID) {
        $this->connect();
        if ($this->conn) {
            $results = [];
            $result = $this->conn->query("SELECT audios.*, audioCategories.audioCategory
                              FROM audios
                              NATURAL JOIN audioCategories 
                              WHERE audios.audioCategoryID = '$categoryID'");
                                          
            while ($row = $result->fetch_assoc()) {
                $results[] = $row;
            }
            $this->conn->close();
            return $results;
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
