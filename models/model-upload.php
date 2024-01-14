<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

class ConnectionObject {
    public function __construct(public $host, public $username, public $password, public $database) {
    }
}

class AudioModel {
    private $mysqli;
    private $connectionObject;

    public function __construct(ConnectionObject $connectionObject) {
        $this->connectionObject = $connectionObject;
    }

    public function connect() {
        try {
            $this->mysqli = new mysqli(
                $this->connectionObject->host,
                $this->connectionObject->username,
                $this->connectionObject->password,
                $this->connectionObject->database
            );

            if ($this->mysqli->connect_error) {
                throw new Exception('Could not connect');
            }
            return $this->mysqli;
        } catch (Exception $e) {
            return false;
        }
    }

    public function uploadAudio($audioFile, $title, $description, $thumbnailFile, $userID, $categoryID) {
        $this->connect();

        $audioFileName = "../audio-uploads/" . basename($audioFile["name"]);
        move_uploaded_file($audioFile["tmp_name"], $audioFileName);

        $thumbnailFileName = "";
        if (!empty($thumbnailFile)) {
            $thumbnailFileName = "../thumb-uploads/" . basename($thumbnailFile["name"]);
            move_uploaded_file($thumbnailFile["tmp_name"], $thumbnailFileName);
        }

        $sql = "INSERT INTO audios (audioTitle, audioDesc, audioThumb, audioFile, audioUserID, audioCategoryID) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ssssii", $title, $description, $thumbnailFileName, $audioFileName, $userID, $categoryID);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }

    public function selectCategory() {
        $this->connect();

        $result = $this->mysqli->query("SELECT * FROM audioCategories");
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }

        return $results;
    }

    public function showCategories() {
        // You can return data to the controller and let the controller handle the view.
        $categories = $this->selectCategory();
        return $categories;
    }
}

?>
