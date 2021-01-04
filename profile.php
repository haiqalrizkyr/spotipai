<?php
session_start();

include 'koneksi.php';

?>
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
        <div class="container" style="width:100%; background-color: #313131;">
            <table style="margin-top: 70px; color:white; text-align:center" align="center">
                <tr>
                    <td><button style="margin-top:30px;padding: 90px; background-color: white; border-radius: 200px;" disabled><i class="fas fa-user fa-7x"></i></button></td>
                </tr>
                <tr>
                    <td style="font-size: 80px;">Username</td>
                </tr>
                <tr>
                    <td style="font-size: 20px;">My Playlist</td>
                </tr>
                <tr>
                    <td>
                        <button style="padding: 35px; border-radius:35px">Playlist 1</button>
                        <button style="padding: 35px; border-radius:35px">Playlist 2</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>