<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include 'view-header.php';
include __DIR__ . '/../controllers/controller-upload.php';

?>
    <section>
        <h1>Let's Share Your Creation</h1>

        <form action="../controllers/controller-upload.php" method="post" enctype="multipart/form-data">
            <div class="form-grid">
                <div class="left">
                    <!-- MP3 Audio File Input -->
                    <div class="audio-block">
                        <label class="audio-drop-label" for="audioFile">Drag and Drop or Click to Upload</label><br>
                        <div class="audio-drop-area"> 
                            <input class= "audio-drop"type="file" id="audio" name="audio" accept="audio/mp3" required>
                        </div>
                    </div>
                    
                </div><!-- left ends-->

                <div class="right">
                    <!-- Title Input -->
                    <h2>Details</h2>
                    <label for="title">Title(Required)</label></br>
                    <input type="text" id="audioTitle" name="audioTitle" required></br>
                    

                    <!-- Description Input -->
                    <label for="description">Description(Required)</label></br>
                    <textarea id="audioDesc" name="audioDesc" rows="4" required></textarea>
                    
                </div><!-- right ends-->
            </div>
            

            <!-- Thumbnail Drop Area -->
            <div class="thumbnail">
                <h2>Thumbnail</h2>
                <p>Upload a picture that shows what’s your content is about. A good thumbnail stands out and draws listeners’ attention.</p>
                <div id="thumbnailDropArea" onclick="document.getElementById('thumbnailInput').click()">
                    <input type="file" id="thumbnailInput" name="audioThumb" accept="image/*" style="display: none;" onchange="displayThumbnail()" required>
                    <img id="thumbnailPreview" src="../assets/images/upload.png" alt="Thumbnail Preview">
                </div>
            </div>
            

            <!-- Category Drop Down Button -->
            <div class="category">
                <h2>Category</h2>
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
            </div>
           

            <!-- Submit Button -->
            <button id="upload-btn" type="submit" value="submit">UPLOAD</button>
        </form>

        
        <a href="../views/view-myplaylist.php">Go to My Playlist</a>
    </section>

<?php
include 'view-footer.php';
?>