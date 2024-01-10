<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include 'view-header.php';

    include __DIR__ . '/../controllers/controller-myplaylist.php';
    include __DIR__ . '/../_includes/config.php';

    $connection = new ConnectionObject($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['database']);
    
    $model = new AudioModel($connection);
    $controller = new Controller($model);

    if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['songID'])) {
        $controller->getSongByID($_GET['songID']);

    } else if (isset($_GET['action']) && $_GET['action'] == 'category' && isset($_GET['categoryID'])) {
        $controller->getAudioByCategoryID(1, $_GET['categoryID']);

    } else {
        if (isset($_POST['update'])) {
            $controller->updateSong($_POST['ID'], $_POST['audioTitle'], $_POST['audioDesc'], $_FILES['audio'], $_FILES['audioThumb'], $_POST['audioCategoryID']);
        }

        if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['songID'])) {
            $controller->deleteSong($_GET['songID']);
        }
        
    $controller->showUserByID(1);
    $controller->showAudios(1);

    }

?>

<?php
include 'view-footer.php';
?>