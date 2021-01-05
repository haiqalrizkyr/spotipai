<style>
  .container button {
    border-radius: 35px;
    border-color: transparent;
    padding: auto;
    font-size: 30px;
    background-size: 200px;
    color: white;
    width: 300px;
    height: 100px;
  }

  a {
    text-decoration: none;
    color: inherit;
  }

  a:hover {
    text-decoration: underline;
  }
</style>
<div class="content">
  <div class="md-form mt-0">
    <table style="margin-top: 70px;" align="center">
      <tr>
        <form action="search_result.php" method="post">
          <td>
            <input name="key" class="form-control" type="text" placeholder="Search songs by title, album, or artist" aria-label="Search" style="width: 500px; border-radius:35px">
          </td>
          <td><button type="submit" style="border-radius: 35px;" class="btn btn-outline-success"><i class="fas fa-search"></i></button></td>
        </form>
      </tr>
    </table>
  </div>
  <h1 style="color: white; margin-top: 10px;">Genres</h1>
  <div class="container">
    <div class="row">
      <?php
      $ambilgenre = $koneksi->query("SELECT * FROM genre ORDER BY rand() LIMIT 3");

      while ($datagenre = $ambilgenre->fetch_assoc()) {
      ?>
        <div class="col-sm-4 mb-4">
          <button class="btn btn-block" onclick="window.location.href='genre_song.php?id_genre=<?= $datagenre['id_genre'] ?>';" style="background-color: <?php echo '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6); ?>;">
            <?= $datagenre['nama_genre'] ?>
          </button>
        </div>
      <?php } ?>
    </div>

    <h3><a href="genres.php" style="color:white;">Browse All Genres</a></h3>
  </div>
  <br>
  <h1 style="color: white; margin-top: 10px;">Albums</h1>
  <br>
  <div class="container" id="container2">
    <!-- <button style="background-color: #286841">Album</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button style="background-color: #282E68">Album</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button style="background-color: #65B748">Album</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button style="background-color: #C9368D">Album</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button style="background-color: #D629BA">Album</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
    <div class="row">
      <?php
      $ambilalbum = $koneksi->query("SELECT * FROM album ORDER BY rand() LIMIT 5");

      while ($dataalbum = $ambilalbum->fetch_assoc()) {
      ?>
        <div class="col-sm-4 mb-4">
          <button class="btn btn-block" onclick="window.location.href='album_song.php?id_album=<?= $dataalbum['id_album'] ?>';" style="background-color: <?php echo '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6); ?>;">
            <?= $dataalbum['title'] ?>
          </button>
        </div>
      <?php } ?>
    </div>

    <h3><a href="albums.php" style="color: white;">Browse All Albums</a></h3>
  </div>
</div>