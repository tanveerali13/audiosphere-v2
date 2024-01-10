<?php
include_once 'view-header.php';

include_once __DIR__ . '/../controllers/controller-audiolist.php';
?>

<section class="audio_list_container">
<?php

    foreach ($audioList as $list) {
        echo '<article class="card">';
        echo '<figure>';
        echo '<img src="' . $list['audioThumb'] . '" alt="' . $list['audioTitle'] . '">';
        echo '</figure>';
        echo '<div class="card_info">';
        echo '<div class="card_header">';
        echo '<div class="title">';
        echo '<h3>' . $list['audioTitle'] . '</h3>';
        echo '</div>';
        echo '<button class="favorite">favorite</button>';
        echo '</div>';
        echo '<div class="card_desc clamp">';
        echo '<p>' . $list['audioDesc'] . '</p>';
        echo '</div>';
        echo '<div class="card_footer">';
        echo '<p>' . $list['audioCategory'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</article>';
    }
?>

</section>

<?php
include 'view-footer.php';
?>