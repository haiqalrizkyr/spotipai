<!DOCTYPE html>
<html>

<head>
    <title>Spotipai - Web Music Player</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php include 'script.html' ?>
</head>

<body style="background-color: #0e0e0d">
    <?php
    include 'header.php';
    include 'sidebar.php';
    ?>
    <div class="content">
        <table style="margin-top: 70px; color:white">
            <tr>
                <td><button style="padding: 50px; background-color:white" disabled><i class="fas fa-music fa-7x"></i></button></td>
            </tr>
            <tr>
                <td>Song Title</td>
            </tr>
            <tr>
                <td>Artist</td>
            </tr>
            <tr>
                <td><audio controls>
                        <source src="horse.mp3" type="audio/mpeg">
                        Your browser does not support the audio tag.
                    </audio></td>
            </tr>
        </table>
    </div>
</body>

</html>