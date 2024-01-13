<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AudioSphere</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/myplaylist.css">

    <!-- JS -->
    <script src="../js/myplaylist.js" defer></script>
</head>
</head>

<body>
    <main>
        <div class="home_menu">
            <input type="checkbox" id="menu_toggle" />
            <label for="menu_toggle" class="menu_icon">
                <span class="navicon"><i class="fas fa-home"></i></span>
                <a href="view-search.php"><i class="fas fa-search"></i></a>
                <a href="view-myplaylist.php"><i class="fa-solid fa-list-ul"></i></a>
                <a href="view-myplaylist.php"><i class="fa-solid fa-user-gear"></i></a>
                <label class="switch">
                    <input type="checkbox" id="modeToggle">
                    <span class="slider"></span>
                </label>
            </label>

            <nav id="sidebar" class="menu">
                <div class="logo"><img src="../assets/images/audioSphere_logo_light_mode.png" alt="" srcset=""></div>

                <ul>
                    <li><a href="view-search.php">search</a></li>
                    <li><a href="../index.php">home</a></li>
                    <li><a href="view-myplaylist.php">my playlist</a></li>

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

        <section class="signup-login">
            <div class="container">
                <h1>Signup</h1>

                <form action="../views/view-myplaylist.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="userid" value="<?php echo $userid; ?>">

                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Username" class="form-control" required>

                    <label for="password">Password (should contain at least 6 characters)</label>
                    <input type="text" name="password" placeholder="Password" class="form-control" required minlength="6">

                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" placeholder="Email" class="form-control" required>

                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control">

                    <input id="signup" type="submit" name="signup" value="Signup">
                </form>
                <p>Do you already have an account?</p>
                <a href="login.php" class="arrow-btn"><i class="fa-solid fa-circle-arrow-right"></i>&nbsp;Login</a>
            </div>
        </section>
    </main>

<?php
    include 'view-footer.php';
?>