<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include_once 'view-header.php';

?>
    <section class="upload-form">
        <div class="container">
            <h1>Edit Your Creation</h1>

            <form method="POST" action="view-myplaylist.php" enctype="multipart/form-data">
                
                <input type="hidden" name="ID" value="<?php echo $song['ID']; ?>">

                <div class="form-grid">
                    <div class="left">
                        <!-- Title Input -->
                        <h2>Details</h2>
                        <label for="title">Title</label></br>
                        <input type="text" id="audioTitle" name="audioTitle" value="<?php echo $song['audioTitle']; ?>">
                        <br>

                        <!-- Description Input -->
                        <label for="description">Description</label><br>
                        <textarea id="audioDesc" name="audioDesc" rows="4"><?php echo $song['audioDesc']; ?></textarea>
                    </div>
                    

                    <div class="right">
                        <!-- MP3 Audio File Input -->
                        <div class="audio-block">
                            <label class="audio-drop-label" for="audioFile">MP3 Audio File:</label><br>
                            <div class="audio-drop-area"> 
                                <input class= "audio-drop" type="file" id="audio" name="audio" accept="audio/mp3" value="<?php echo $song['audioFile']; ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Thumbnail Drop Area -->
                <div class="thumbnail">
                    <h2>Thumbnail</h2>
                    <div id="thumbnailDropArea" onclick="document.getElementById('thumbnailInput').click()">
                        <input type="file" id="thumbnailInput" name="audioThumb" accept="image/*" style="display: none;" onchange="displayThumbnail()">
                        <img id="thumbnailPreview" src="<?php echo $song['audioThumb']; ?>" alt="Thumbnail Preview">
                    </div>
                </div>

                <!-- Category Drop Down Button -->
                <div class="category">
                    <h2>Category</h2>
                    <select id="categoryDropdown" name="audioCategoryID">
                        <?php
                        foreach ($audioCategories as $audioCategory) {
                            echo "<option value=\"" . $audioCategory['audioCategoryID'] . "\"";
                            echo $audioCategory['audioCategoryID'] == $song['audioCategoryID'] ? "selected" : "";
                            echo ">" . $audioCategory['audioCategory'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Submit Button -->
                <input id="upload-btn" type="submit" name="update" value="UPDATE">
                <input id="upload-btn" class="cancel-btn" type="button" onclick="window.location.href='../views/view-myplaylist.php';" value="CANCEL">
                <br>

                <a href="../views/view-myplaylist.php" class="arrow-btn"><i class="fa-solid fa-circle-arrow-right"></i>&nbsp;Check your playlist</a>
            </form>

        </div>
    </section>

<?php
include 'view-footer.php';
?>