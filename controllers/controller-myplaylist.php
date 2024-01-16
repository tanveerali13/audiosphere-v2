<?php

    ini_set('display_errors', 1);

    include __DIR__ . '/../models/model-myplaylist.php';
    

    class Controller {
        private $model;
        public function __construct(AudioModel $model) {
            $this->model = $model;
        }

        public function showAudios($id) {
            $audios = $this->model->selectAudios($id);

            if(!empty($audios)) {
                include '../views/display-myplaylist.php';
            } else {
                echo '<h3 id="error-msg" style="text-align: center;">No audio found</h3>';
                echo '<a href="../views/view-upload.php" id="error-msg" class="arrow-btn upload-btn"><i class="fa-solid fa-circle-arrow-right"></i>&nbsp;Upload an audio</a>';
            }
        }

        public function showUserByID($id) {
            $user = $this->model->selectUserByID($id);
            if(!empty($user)) {
                include '../views/display-user.php';
            } else {
                echo '<h3 id="error-msg" style="text-align: center;">No user found</h3>';
            }
        }

        public function getAudioCategories() {
            $audioCategories = $this->model->selectAudioCategories();
            return $audioCategories;
        }

        public function getSongByID($id) {
            $song = $this->model->selectSongByID($id);
            $audioCategories = $this->getAudioCategories();
            if(!empty($song)) {
                include '../views/update-myplaylist.php';
            } else {
                echo '<h3 id="error-msg" style="text-align: center;">No song found</h3>';
            }
        }

        public function getAudioByCategoryID($userId, $categoryID) {
            $audios = $this->model->selectAudioByCategoryID($userId, $categoryID);
            if(!empty($audios)) {
                $this->showUserByID($userId);
                include '../views/display-myplaylist.php';
                
            } else {
                echo '<h3 id="error-msg" style="text-align: center;">No audio found</h3>';
                echo '<a href="../views/view-upload.php" id="error-msg" class="arrow-btn upload-btn"><i class="fa-solid fa-circle-arrow-right"></i>&nbsp;Upload an audio</a>';
            }
        }

        public function updateSong($id, $audioTitle, $audioDesc, $audioFile, $audioThumb, $audioCategoryID) {
            $updateSong = $this->model->updateAudio($id, $audioTitle, $audioDesc, $audioFile, $audioThumb, $audioCategoryID);
            if ($updateSong) {
                header('Location: ../views/view-myplaylist.php');
                exit;
            } else {
                echo '<h3 id="error-msg" style="text-align: center;">Didn\'t update</h3>';
            }
        }

        public function deleteSong($id) {
            $deleteSong = $this->model->deleteAudio($id);
            if ($deleteSong) {
                header('Location: ../views/view-myplaylist.php');
                exit;
            } else {
                echo '<h3 id="error-msg" style="text-align: center;">Delete failed</h3>';
            }
        }

        // Signup
        public function signup($userid, $username, $password, $email, $image) {
            // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $hashedPassword = $password;
            $signup = $this->model->insertUser($userid, $username, $hashedPassword, $email, $image);
            if ($signup) {
                return true;
            } else {
                echo '<h3 id="error-msg" style="text-align: center;">Signup failed</h3>';
            }
        }

        // Login
        public function login($username, $password) {
            $hashedPassword = $password; // password_hash($password, PASSWORD_DEFAULT);
            $userid = $this->model->findUser($username, $hashedPassword);
            if ($userid) {
                $_SESSION['loggedin'] = true;
                $_SESSION['userID'] = $userid;
                header('Location: ../views/view-myplaylist.php');
                exit;
            } else {
                $_SESSION['loggedin'] = false;
                echo '<article style="text-align: center;">';
                echo '<h3 id="error-msg" style="margin-top: 10em; text-align: center;">Login failed</h3>';
                echo '<p id="error-msg" style="text-align: center;">Username or password is incorrect</p>';
                echo '<a href="../views/login.php" id="error-msg" class="arrow-btn login-btn" style="text-align: center;"><i class="fa-solid fa-circle-arrow-right"></i>&nbsp;Try again</a>';
                echo '</article>';
            }
        }
    }

?>