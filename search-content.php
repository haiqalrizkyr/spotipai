<style>
    .container button {
        border-radius: 35px;
        border-color: transparent;
        padding-left: 25px;
        padding-top: 25px;
        padding-right: 300px;
        padding-bottom: 200px;
        font-size: 30px;
        background-size: 200px;
        color: white;
    }

    #container2 button {
        border-radius: 35px;
        border-color: transparent;
        padding-left: 25px;
        padding-top: 25px;
        padding-right: 100px;
        padding-bottom: 100px;
        font-size: 35px;
        background-size: 200px;
        color: white;
    }

    #container3 button {
        border-radius: 35px;
        border-color: transparent;
        padding-left: 25px;
        padding-top: 25px;
        padding-right: 300px;
        padding-bottom: 50px;
        font-size: 35px;
        background-size: 200px;
        color: white;
    }
</style>
<div class="content">
    <div class="md-form mt-0">
        <table style="margin-top: 70px;" align="center">
            <tr>
                <td><input class="form-control" type="text" placeholder="Search" aria-label="Search" style="width: 500px; border-radius:35px"></td>
                <td><button style="border-radius: 35px;" class="btn btn-outline-success"><i class="fas fa-search"></i></button></td>
            </tr>
        </table>
    </div>
    <h1 style="color: white; margin-top: 10px;">Genres</h1>
    <div class="container">
        <?php
            $ambilgenre = $koneksi->query("SELECT * FROM genre ORDER BY rand() LIMIT 3");

            while ($datagenre = $ambilgenre->fetch_assoc()){
        ?>
            <button onclick="window.location.href='#';" style="background-color: <?php echo '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6); ?>;">
                <?= $datagenre['nama_genre'] ?>
            </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php } ?>
        <br><br>
        <h3><a href="genres.php" style="color:white;">Browse All Genres</a></h3>
    </div>
    <h1 style="color: white; margin-top: 10px;">Albums</h1>
    <div class="container" id="container2">
        <!-- <button style="background-color: #286841">Album</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button style="background-color: #282E68">Album</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button style="background-color: #65B748">Album</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button style="background-color: #C9368D">Album</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button style="background-color: #D629BA">Album</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
        <?php
            $ambilalbum = $koneksi->query("SELECT * FROM album ORDER BY rand() LIMIT 5");

            while ($dataalbum = $ambilalbum->fetch_assoc()){
        ?>
            <button style="background-color: <?php echo '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6); ?>;">
                <?= $dataalbum['title'] ?>
            </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php } ?>
        <br><br>
        <h3><a href="albums.php" style="color: white;">Browse All Albums</a></h3>
    </div>
</div>