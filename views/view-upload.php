<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include 'view-header.php';
include __DIR__ . '/../controllers/controller-upload.php';

?>

        <h1>Let's Share Your Creation</h1>

        
        <form action="../controllers/controller-upload.php" method="post" enctype="multipart/form-data">
            <div class="form-flex">
                <div class="left">
                    <!-- Title Input -->
                    <h2>Details</h2>
                    <label for="title">Title(Required)</label></br>
                    <input type="text" id="audioTitle" name="audioTitle" required>
                    <br>

                    <!-- Description Input -->
                    <label for="description">Description(Required)</label><br>
                    <textarea id="audioDesc" name="audioDesc" rows="4" required></textarea>
                    <br></div>

                <div class="right">
                    <!-- MP3 Audio File Input -->
                    <label for="audioFile">MP3 Audio File:</label><br>
                    <input type="file" id="audio" name="audio" accept="audio/mp3" required>
                    <br>
                </div>
            </div>
            

            <!-- Thumbnail Drop Area -->
            <h2>Thumbnail</h2>
            <p>Upload a picture that shows what’s your content is about. A good thumbnail stands out and draws listeners’ attention.</p>
            <div id="thumbnailDropArea" onclick="document.getElementById('thumbnailInput').click()">
                <input type="file" id="thumbnailInput" name="audioThumb" accept="image/*" style="display: none;" onchange="displayThumbnail()">
                <img id="thumbnailPreview" src="../assets/images/upload.png" alt="Thumbnail Preview">
            </div>
            <br>

            <!-- Category Drop Down Button -->
            <select id="categoryDropdown" name="audioCategoryID" required>
                <option value="">Select Category</option>
            <?php
                if($categories){
                    foreach($categories as $category){
                        echo '<option value="'. $category['audioCategoryID'] . '">' . $category['audioCategory'] . '</option>';
                    }
                }

            ?>
            </select>
            <br>

            <!-- Submit Button -->
            <input type="submit" value="UPLOAD">
        </form>

        <h3>Check full audio list</h3>
        <a href="../views/view-allAudios.php">CHECK LIST</a>

        <br>
        <br>
        <br>
    

<?php
include 'view-footer.php';
?>