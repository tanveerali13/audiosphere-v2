<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

class AudioModel {
    private $conn;

    public function connect(){
        $this->conn = new mysqli("localhost", "audio_tmt", "772Fky&d7", "audiosphere");
    }
    

    public function uploadAudio($audioFile, $title, $description, $thumbnailFile, $userID, $categoryID) {
        //hardcoded userID
        
        $this->connect();
        // Upload audio file in separate directory and get file directory to store in table
        $audioFileName = "../audio-uploads/" . basename($audioFile["name"]);
        move_uploaded_file($audioFile["tmp_name"], $audioFileName);

        $thumbnailFileName = "";
        if (!empty($thumbnailFile)) {
            $thumbnailFileName = "../thumb-uploads/" . basename($thumbnailFile["name"]);
            move_uploaded_file($thumbnailFile["tmp_name"], $thumbnailFileName);
        }

        $sql = "INSERT INTO audios (audioTitle, audioDesc, audioThumb, audioFile, audioUserID, audioCategoryID) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssii", $title, $description, $thumbnailFileName, $audioFileName, $userID, $categoryID);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }

    public function selectCategory()
    {   
        $this->connect();
        if ($this->conn) {
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


    public function showCategories(){
        include __DIR__ . '/../views/view-upload.php';
        $categories = $this->selectCategory();
        
    }
}
?>
