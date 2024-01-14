<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio sphere</title>

    <!-- css -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/upload-form.css">
    <link rel="stylesheet" href="../css/search.css"> 
    <link rel="stylesheet" href="../css/audio-list.css">


    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/2f6fae777f.js" crossorigin="anonymous"></script>

    <!-- slick slider css cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <main>
        <header class="hero_header">
            <figure><img id="logo" src="../assets/images/audioSphere_logo_light_mode.png" alt="logo"></figure>
            <div class="buttons">
                <?php if (isset($_SESSION['userID'])) { ?>
                    <a href="../views/logout.php" class="btn">log out</a>
                <?php } else { ?>
                    <a href="../views/login.php" class="btn">log in</a>
                    <a href="../views/signup.php" class="btn">sign up</a>
                <?php } ?>
            </div>
        </header>
        <div class="home_menu">
            <input type="checkbox" id="menu_toggle" />
            <label for="menu_toggle" class="menu_icon">
                <span class="navicon"><i class="fas fa-home"></i></span>
                <a href="../views/view-search.php"><i class="fas fa-search"></i></a>
                <a href="../views/view-myplaylist.php"><i class="fa-solid fa-list-ul"></i></a>
                <a href="../views/view-myplaylist.php"><i class="fa-solid fa-user-gear"></i></a>
                <label class="switch">
                    <input type="checkbox" id="modeToggle">
                    <span class="slider"></span>
                </label>
            </label>

            <nav id="sidebar" class="menu">
                <div class="logo"><img src="../assets/images/audioSphere_logo_light_mode.png" alt="" srcset=""></div>

                <ul>

                    <li><a href="../views/view-search.php">search</a></li>
                    <li><a href="../index.php">home</a></li>
                    <li><a href="../views/view-myplaylist.php">my playlist</a></li>

                    <div>
                        <li>featured stories</li>
                        <li>new release</li>
                        <li>discover</li>
                    </div>
                    <div>
                        <li>my library</li>
                        <li>community</li>
                    </div>
                    <div>
                        <li>FAQ</li>
                        <li>about us</li>
                        <li>create</li>
                    </div>
                </ul>
                <label for="menu_toggle" class="close_icon"></label>
            </nav>
        </div>