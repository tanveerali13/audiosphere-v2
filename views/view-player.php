<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>music player</title>

    <!-- styles -->
    <link rel="stylesheet" href="player.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="wrapper">
        <main class="player_container">
            <section class="player_body">
                <div class="body_cover">
                    <nav class="list list--cover">
                        <ul>
                            <li>
                                <a class="list_link" href=""><i class="fa fa-navicon"></i></a>
                            </li>
                            <li>
                                <a class="list_link" href=""><i class="fa fa-search"></i></a>
                            </li>
                        </ul>
                    </nav>

                    <img src="http://ecx.images-amazon.com/images/I/51XSHShbPiL.jpg" alt="Album cover" />

                    <div class="range"></div>
                </div>

                <article class="body_info">
                    <h1 class="info_album">The Hunting Party</h1>
                    <h2 class="info_song">Final Masquerade</h2>
                    <p class="info_artist">Linkin Park</p>
                </article>

                <div class="body_buttons">
                    <nav class="list list--buttons">
                        <ul>
                            <li><a href="#" class="list_link"><i class="fa fa-step-backward"></i></a></li>
                            <li><a href="#" class="list_link"><i class="fa fa-play"></i></a></li>
                            <li><a href="#" class="list_link"><i class="fa fa-step-forward"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </section>

            <footer class="player_footer">
                <nav class="list list--footer">
                    <ul>
                        <li><a href="#" class="list_link"><i class="fa fa-heart-o"></i></a></li>
                        <li><a href="#" class="list_link"><i class="fa fa-random"></i></a></li>
                        <li><a href="#" class="list_link"><i class="fa fa-undo"></i></a></li>
                        <li><a href="#" class="list_link"><i class="fa fa-ellipsis-h"></i></a></li>
                    </ul>
                </nav>
            </footer>
        </main>
    </div>

</body>

</html>