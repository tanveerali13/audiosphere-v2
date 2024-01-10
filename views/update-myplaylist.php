<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include 'view-header.php';

?>

        <h1>Edit Your Creation</h1>

        
        <form method="POST" action="view-myplaylist.php" enctype="multipart/form-data">
            <input type="hidden" name="ID" value="<?php echo $song['ID']; ?>">
            <div class="form-flex">
                <div class="left">
                    <!-- Title Input -->
                    <h2>Details</h2>
                    <label for="title">Title</label></br>
                    <input type="text" id="audioTitle" name="audioTitle" value="<?php echo $song['audioTitle']; ?>">
                    <br>

                    <!-- Description Input -->
                    <label for="description">Description</label><br>
                    <textarea id="audioDesc" name="audioDesc" rows="4"><?php echo $song['audioDesc']; ?></textarea>
                    <br></div>

                <div class="right">
                    <!-- MP3 Audio File Input -->
                    <label for="audioFile">MP3 Audio File:</label><br>
                    <input type="file" id="audio" name="audio" accept="audio/mp3" value="<?php echo $song['audioFile']; ?>">
                    <br>
                </div>
            </div>
            

            <!-- Thumbnail Drop Area -->
            <h2>Thumbnail</h2>
            <div id="thumbnailDropArea" onclick="document.getElementById('thumbnailInput').click()">
                <input type="file" id="thumbnailInput" name="audioThumb" accept="image/*" style="display: none;" onchange="displayThumbnail()">
                <img id="thumbnailPreview" src="<?php echo $song['audioThumb']; ?>" alt="Thumbnail Preview">
            </div>
            <br>

            <!-- Category Drop Down Button -->
            <select id="categoryDropdown" name="audioCategoryID">
                <?php
                foreach ($audioCategories as $audioCategory) {
                    echo "<option value=\"" . $audioCategory['audioCategoryID'] . "\"";
                    echo $audioCategory['audioCategoryID'] == $song['audioCategoryID'] ? "selected" : "";
                    echo ">" . $audioCategory['audioCategory'] . "</option>";
                }
                ?>
            </select>
            <br>

            <!-- Submit Button -->
            <input type="submit" name="update" value="UPDATE">
            <input type="button" onclick="window.location.href='../views/view-myplaylist.php';" value="CANCEL">
        </form>

        <a href="../views/view-myplaylist.php">CHECK YOUR PLAYLIST</a>

        <br>
        <br>
        <br>
    

<?php
include 'view-footer.php';
?>