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
        <div class="container" style="width:1000px ; background-color: #313131; border-radius:35px;">
            <table style="margin-top: 70px; color:white; text-align:center" align="center">
                <tr>
                    <td><button style="margin-top:30px;padding: 90px; background-color: white; border-radius:35px;" disabled><i class="fas fa-music fa-7x"></i></button></td>
                </tr>
                <tr>
                    <td style="font-size: 80px;">Song Title</td>
                </tr>
                <tr>
                    <td style="font-size: 50px;">Artist</td>
                </tr>
            </table>
            <br>
            <div class="audio" align="center"><audio controls>
                    <source src="" type="audio/mpeg">
                    Your browser does not support the audio tag.
                </audio></div>
            <br>
            <div class="container" style="color: white; padding-bottom:30px;">
                <h3 align="center">About This Song</h3>
                <table align="center">
                    <tr>
                        <td>Album:</td>
                    </tr>
                    <tr>
                        <td>Writer:</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>