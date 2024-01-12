<?php
session_start();

include 'view-header.php';

include __DIR__ . '/../controllers/controller-search.php';

?>

<section class="main">
    <!-- SEARCH BAR -->
    <form id="search-form">
        <div class="search-box">
            <div class="row">
                <input type="text" class="input-box" id="input-box" placeholder="Search" autocomplete="off">
                <!-- <button type="submit" class="search-button">
                        <div>SEARCH</div>
                    </button>   -->
            </div>
            <div class="result-box">
            </div>
        </div>
    </form>

    <article class="category_list">
        <h3>Categories</h3>
        <div class="category_list_grid">


        <?php
           
            foreach ($categories as $category) {
                echo '<div class="category_card">';
                echo '<h4><a href="../controllers/controller-audiolist.php?category=' . $category['audioCategoryID'] . '">' . $category['audioCategory'] . '</a></h4>';
                echo '</div>';
            }
            ?>

        </div>
    </article>
</section>

<?php
include 'view-footer.php';
?>