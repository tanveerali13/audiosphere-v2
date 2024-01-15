<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    session_start();
    include 'view-header.php';
    
    include __DIR__ . '/../controllers/controller-myplaylist.php';
    include __DIR__ . '/../_includes/config.php';

    $connection = new ConnectionObject($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['database']);
    
    $model = new AudioModel($connection);
    $controller = new Controller($model);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $image = $_FILES["image"];
        $controller->signup($userid, $username, $password, $email, $image);
    } else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
        $controller->login($_POST['username'], $_POST['password']);
    }

    if (isset($_SESSION['loggedin'])) {
        if ($_SESSION['loggedin'] == true) {
            $userid = $_SESSION['userID'];
    
            if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['songID'])) {
                $controller->getSongByID($_GET['songID']);
        
            } else if (isset($_GET['action']) && $_GET['action'] == 'category' && isset($_GET['categoryID'])) {
                $controller->getAudioByCategoryID($userid, $_GET['categoryID']);
        
            } else {
                if (isset($_POST['update'])) {
                    $controller->updateSong($_POST['ID'], $_POST['audioTitle'], $_POST['audioDesc'], $_FILES['audio'], $_FILES['audioThumb'], $_POST['audioCategoryID']);
                }
        
                if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['songID'])) {
                    $controller->deleteSong($_GET['songID']);
                }
                
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $email = $_POST["email"];
                    $image = $_FILES["image"];
            
                    $controller->signup($userid, $username, $password, $email, $image);
                } else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
                    $controller->login($_POST['username'], $_POST['password']);
                }
    
                $controller->showUserByID($userid);
                $controller->showAudios($userid);
            }
        } else {
            unset($_SESSION['loggedin']);
        }
    } else {
        header('Location: login.php');
        exit;
    }

?>

<?php
include 'view-footer.php';
?>