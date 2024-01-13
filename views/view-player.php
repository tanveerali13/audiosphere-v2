<?php
    include_once 'view-header.php';

    include_once __DIR__ . '/../controllers/controller-audiolist.php';
?>

<div class="audio-container">
        <?php
            // Ensure that $audio is set and not empty
            if (isset($audio) && !empty($audio)) {
                $audioThumb = $audio[0]['audioThumb'];
                $audioTitle = $audio[0]['audioTitle'];
                $audioDesc = $audio[0]['audioDesc'];
                $audioFile = $audio[0]['audioFile'];
        ?>
            <img class="thumbnail" src="<?php echo $audioThumb; ?>" alt="Thumbnail">
            <div class="audio-details">
                <h2><?php echo $audioTitle; ?></h2>
                <p><?php echo $audioDesc; ?></p>
            </div>
            <audio controls>
                <source src="<?php echo $audioFile; ?>" type="audio/mp3"> <!-- Replace with the actual field name in your database -->
                Your browser does not support the audio tag.
            </audio>
        <?php
            } else {
                // Handle case when $audio is not set or empty
                echo "Error: Unable to display audio information.";
            }
        ?>
    </div>

<?php
    include 'view-footer.php';
?>