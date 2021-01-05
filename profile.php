<?php
session_start();

include 'koneksi.php';

if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    echo "<script> alert('Anda belum login. Silakan login terlebih dahulu!') </script>";
    echo "<script>location='index.php';</script>";
}

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
        <div class="container" style="width:100%; background-color: #313131; border-radius:35px">
            <table style="margin-top: 70px; color:white; text-align:center" align="center">
                <tr>
                    <td><button style="margin-top:30px;padding: 90px; background-color: white; border-radius: 200px;" disabled><i class="fas fa-user fa-7x"></i></button></td>
                </tr>
                <tr>
                    <td style="font-size: 40px;"><?= $_SESSION['user']['username'] ?></td>
                </tr>
                <tr>
                    <td style="font-size: 20px;"><?= $_SESSION['user']['email'] ?></td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
                <tr>
                    <td style="padding-bottom: 30px">
                        <a href="edit_profile.php" class="btn btn-secondary">Edit Profile</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>