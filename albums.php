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
    <style>
        .container button {
            border-radius: 35px;
            border-color: transparent;
            padding: auto;            
            font-size: 27px;
            background-size: 200px;
            color: white;
            width: 300px;
            height: 100px;
        }
    </style>
</head>

<body style="background-color: #0e0e0d">
    <?php
    include 'header.php';
    include 'sidebar.php';
    ?>
    <div class="content">
        <h1 style="margin-top: 70px; color: white;">All Albums</h1>
        <br>
        <div class="container">
            <div class="row">
                <?php
                    $ambilalbum = $koneksi->query("SELECT * FROM album ORDER BY rand()");

                    while ($dataalbum = $ambilalbum->fetch_assoc()) {
                ?>
                <div class="col-sm-4 mb-4">
                    <button class="btn btn-block" onclick="window.location.href='#<?= $dataalbum['id_album'] ?>'" style="background-color: <?php echo '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6); ?>;">
                        <?= $dataalbum['title'] ?> (<?= $dataalbum['year'] ?>)
                    </button>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>