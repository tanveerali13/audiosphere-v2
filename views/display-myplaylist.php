<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AudioSphere</title>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/myplaylist.css">

    <!-- JS -->
    <script src="../js/myplaylist.js" defer></script>
</head>

<body>
    <main>
        <!-- MY PLAYLIST -->
        <section class="playlist">
            <div class="container">
                <div class="playlist-wrapper">
                    <article>
                        <h3>My playlist</h3>
                        <div class="btn-wrapper">
                            <a href="../views/view-upload.php" class="btn">Upload</a>
                        </div>
                    </article>
                    <?php foreach ($audios as $audio): ?>
                        <article class="playlist-box">
                            <figure>
                                <a title="<?php echo $audio['audioTitle']; ?>" audioSrc="<?php echo $audio['audioFile']; ?>" class="play-btn" tabindex="0">
                                    <img src="<?php echo $audio['audioThumb'] ?>" alt="playlist image">
                                </a>
                            </figure>
                            <figcaption>
                                <h4><?php echo $audio['audioTitle'] ?></h4>
                                <a class="link">Details&nbsp;<i class="fa-solid fa-chevron-right"></i></a>
                            </figcaption>
                            <article class="genre">
                                <h5>Genre</h5>
                                <a href="?action=category&categoryID=<?php echo $audio['audioCategoryID']; ?>" class="btn genre-link"><?php echo $audio['audioCategory'] ?></a>
                            </article>
                            <article class="icons">
                                <a href="?action=edit&songID=<?php echo $audio['ID']; ?>" class="btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="?action=delete&songID=<?php echo $audio['ID']; ?>" class="btn delete-btn"><i class="fa-solid fa-trash-can"></i></a>
                            </article>
                            <p><?php echo $audio['audioDesc'] ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- SONG DISPLAY -->
        <section class="display">
            <div class="container">
                <div class="display-wrapper">
                    <article id="close-btn"><i class="fa-solid fa-xmark"></i></article>
                    <article class="display-box">
                        <audio>
                            <source src="" type="audio/mpeg">
                        </audio>
                        <div class="audio-panel">
                            <a id="play-icon"><i class="fa-solid fa-circle-play"></i></a>
                            <h4></h4>
                            <div class="wave">
                                <?php 
                                    for ($i = 0; $i < 10; $i++) {
                                        echo '<span></span>';
                                    }
                                ?>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </main>
</body>
</html>