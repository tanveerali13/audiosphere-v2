<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Audios</title>
</head>
<body>

<?php
// Database connection
$conn = new mysqli("localhost", "audio_tmt", "772Fky&d7", "audiosphere");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all audio files from the database
$sql = "SELECT audioFile FROM audios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display audio players for each file
    echo '<h2>Audio Player</h2>';
    while ($row = $result->fetch_assoc()) {
        $audioFile = $row["audioFile"];
        
        echo '<audio controls>';
        echo '<source src="' . $audioFile . '" type="audio/mpeg">';
        echo 'Your browser does not support the audio element.';
        echo '</audio>';
        echo '<br>';
    }
} else {
    echo '<p>No audio files found.</p>';
}

$conn->close();
?>


<a href="../views/view-upload.php">Back to Upload Form</a>

</body>
</html>
