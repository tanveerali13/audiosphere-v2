<?php
ini_set('display_errors', 1);
session_start();

include_once __DIR__ . '/../controllers/controller-homesliders.php';

include 'view-header.php';
?>

<section class="podcast">

    <h1>Where every story finds its audience</h1>

    <?php

    ini_set('display_errors', 1);
    include __DIR__ . '/../controllers/controller-homesliders.php';

    foreach ($categories as $category) {
        $categoryId = $category['categoryId'];
        $categoryTitle = $category['categoryTitle'];

        $audioData = $homeSliders->getAudioDataForCategory($categoryId);

        echo '<div class="podcast_container">';
        echo '<div class="discover">';
        echo '<h3>' . $categoryTitle . '</h3>';
        echo '<div class="slider-holder">';

        foreach ($audioData as $audio) {
            $audioId = $audio['audioID'];

            echo '<div class="item image_container">';
            echo '<a href="../controllers/controller-audiolist.php?audioID=' . $audioId . '">';
            echo '<img src="' . $audio['audioThumb'] . '" alt="' . $audio['audioTitle'] . '">';
            echo '<p class="text">' . $audio['audioTitle'] . '</p>';
            echo '</a>';
            echo '</div>';
        }

        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    ?>
</section>

</main>

<?php

include 'view-footer.php';
?>
