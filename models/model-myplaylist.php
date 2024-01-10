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

                if($this->mysqli->connect_error) {
                    throw new Exception('Could not connect');
                }
                return $this->mysqli;
            } catch(Exception $e) {
                return false;
            }
        }

        public function selectAudios($id) {
            $mysqli = $this->connect();
            if($mysqli) {
                $result = $mysqli->query("SELECT audios.*, audioCategories.audioCategory 
                FROM audios 
                JOIN audioCategories ON audios.audioCategoryID = audioCategories.audioCategoryID 
                WHERE audios.audioUserID = $id 
                ORDER BY audios.ID ASC;
                ");
                while($row = $result->fetch_assoc()) {
                    $results[] = $row;
                }
                $mysqli->close();
                return $results;
            } else {
                return false;
            }
        }

        public function selectUsers() {
            $mysqli = $this->connect();
            if($mysqli) {
                $result = $mysqli->query("SELECT * FROM audioUsers");
                while($row = $result->fetch_assoc()) {
                    $results[] = $row;
                }
                $mysqli->close();
                return $results;
            } else {
                return false;
            }
        }

        public function selectUserByID($id) {
            $mysqli = $this->connect();
            if($mysqli) {
                $query = $mysqli->query("SELECT * FROM audioUsers WHERE audioUserID = $id");
                $result = $query->fetch_assoc();
                $mysqli->close();
                return $result;
            } else {
                return false;
            }
        }

        public function selectAudioCategories() {
            $mysqli = $this->connect();
            if($mysqli) {
                $result = $mysqli->query("SELECT * FROM audioCategories");
                while($row = $result->fetch_assoc()) {
                    $results[] = $row;
                }
                $mysqli->close();
                return $results;
            } else {
                return false;
            }
        }

        public function selectAudioByCategoryID($userId, $categoryID) {
            $mysqli = $this->connect();
            if($mysqli) {
                $result = $mysqli->query("SELECT audios.*, audioCategories.audioCategory 
                FROM audios 
                JOIN audioCategories ON audios.audioCategoryID = audioCategories.audioCategoryID 
                WHERE audios.audioUserID = $userId 
                AND audios.audioCategoryID = $categoryID 
                ORDER BY audios.ID ASC;");
                while($row = $result->fetch_assoc()) {
                    $results[] = $row;
                }
                $mysqli->close();
                return $results;
            } else {
                return false;
            }
        }

        public function selectSongByID($id) {
            $mysqli = $this->connect();
            if($mysqli) {
                $query = $mysqli->query("SELECT * FROM audios WHERE ID = $id");
                $result = $query->fetch_assoc();
                $mysqli->close();
                return $result;
            } else {
                return false;
            }
        }

        public function updateAudio($id, $audioTitle, $audioDesc, $audioFile, $thumbnailFile, $audioCategoryID) {
            $audioFileName = "../audio-uploads/" . basename($audioFile["name"]);
            move_uploaded_file($audioFile["tmp_name"], $audioFileName);

            $thumbnailFileName = "../thumb-uploads/" . basename($thumbnailFile["name"]);
            move_uploaded_file($thumbnailFile["tmp_name"], $thumbnailFileName);

            $queryString = '';
            if (empty($audioFile['tmp_name']) && empty($thumbnailFile['tmp_name'])) {
                $queryString = "UPDATE audios SET audioTitle = '$audioTitle', audioDesc = '$audioDesc', audioCategoryID = '$audioCategoryID' WHERE ID = $id";

            } else if (empty($audioFile['tmp_name'])) {
                $queryString = "UPDATE audios SET audioTitle = '$audioTitle', audioDesc = '$audioDesc', audioThumb = '$thumbnailFileName', audioCategoryID = '$audioCategoryID' WHERE ID = $id";

            } else if (empty($thumbnailFile['tmp_name'])) {
                $queryString = "UPDATE audios SET audioTitle = '$audioTitle', audioDesc = '$audioDesc', audioFile = '$audioFileName', audioCategoryID = '$audioCategoryID' WHERE ID = $id";

            } else {
                $queryString = "UPDATE audios SET audioTitle = '$audioTitle', audioDesc = '$audioDesc', audioFile = '$audioFileName', audioThumb = '$thumbnailFileName', audioCategoryID = '$audioCategoryID' WHERE ID = $id";
            }

            $mysqli = $this->connect();

            if($mysqli) {
                $mysqli->query($queryString);
                $mysqli->close();
                return true;
            } else {
                return false;
            }
        }

        public function deleteAudio($id) {
            $mysqli = $this->connect();
            if($mysqli) {
                $query = $mysqli->query("DELETE FROM audios WHERE ID = $id");
                $mysqli->close();
                return true;
            } else {
                return false;
            }
        }
    }

?>