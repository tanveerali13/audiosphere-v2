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

<!-- PROFILE IMAGE -->
<section class="profile">
    <div class="container">
        <div class="profile-wrapper">
        <?php if ($user): ?>
            <figure>
                <img src="<?php echo $user['audioUserImage'] ?>" alt="profile photo">
            </figure>
            <h1><?php echo $user['audioUsername'] ?></h1>
        <?php endif; ?>
        </div>
    </div>
</section>

</main>
</body>