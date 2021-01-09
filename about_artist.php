<?php
  session_start();

  include 'koneksi.php';

  $id_artist = $_GET['id_artist'];

  $artist = $koneksi->query("SELECT nama_artist, artist_image, about FROM artist WHERE id_artist = '$id_artist'")->fetch_assoc();

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
.container {
  position: relative;
  width: 100%;
}

.image {
  display: block;
  width: 100%;
  background-size: cover;
}

.overlay {
  position: absolute;
  bottom: 100%;
  left: 0;
  right: 0;
  overflow: hidden;
  width: 100%;
  height:0;
  transition: .5s ease;
}

.container:hover .overlay {
  bottom: 0;
  height: 100%;
}
#image_div
{
 width:1300px;
 margin-left:;
 position:relative;
}
#image_div img
{
 width:100%;
}
#image_div #image_label
{
 margin:0px;
 position:absolute;
 bottom:7px;
}
#image_div #image_label span
{
 background-color: #0B4C5F;
 opacity:0.8;
 font-size:50px;
 padding:7px;
 box-sizing:border-box;
 color:white;
 font-weight:bold;
}

.text {
  color: white;
  font-size: 30px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}</style>
<style type="text/css">
        a {
          text-decoration: none;
          color: inherit;
        }

        a:hover {
          text-decoration: underline;
          color: inherit;
        }
      </style>
</head>
<body style="background-color: #0e0e0d">
		<?php
		include 'header.php';
		include 'sidebar.php';
		?>
<div class="content">
    <div class="container">
    <div id="image_div">
 <img src="artist_img/<?= $artist['artist_image'] ?>" style="width:100%">
 <div class="overlay">
    <div class="text">
      <?= $artist['about'] ?>
    </div>
 </div>
 <p id="image_label"><span><?= $artist['nama_artist'] ?></span></p>
</div>
</div>
    <h3 style="margin-top: 50px; color: white;">Album</h3>
        <div>
        <?php
          $ambilalbum = $koneksi->query("SELECT id_album, title, year FROM album WHERE id_artist = '$id_artist'");
        ?>
          <div>
                <table class="table table-dark table-hover table-borderless">
                    <thead>
      				        <tr>
      					        <th scope="col">#</th>
      					        <th style="text-align: center;" scope="col">Title</th>
                        <th style="text-align: center;" scope="col">Release Year</th>
      				        </tr>
			              </thead>
                    <tbody>
                      <?php 
                        $no = 1;
                        while($album = $ambilalbum->fetch_assoc()) { 
                      ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td style="text-align: center;"><?php echo "<a href='album_song.php?id_album=".$album['id_album']."'>".$album['title']."</a>" ?></td>
                        <td style="text-align: center;"><?= $album['year'] ?></td>
                      </tr>
                      <?php 
                        $no++;
                        } 
                      ?>
                    </tbody>
                </table>
          </div>
        </div>
<br><br><br>
<h3 style="color: white;">Song</h3>
        <div>
          <?php
            $ambillagu = $koneksi->query("SELECT s.id_song, s.title, s.played FROM song s JOIN song_artist sa ON s.id_song = sa.id_song WHERE sa.id_artist = '$id_artist'");
          ?>
                <div>
                <table class="table table-dark table-hover table-borderless">
                 <thead>
				          <tr>
    					        <th scope="col">#</th>
    					        <th style="text-align: center;" scope="col">Title</th>
                      <th style="text-align: center;" scope="col">Played</th>
                      <th style="text-align: center;" scope="col">Favorited</th>
				          </tr>
			           </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        while($lagu = $ambillagu->fetch_assoc()) {

                          $countfav = $koneksi->query("SELECT id_user_fav_song FROM user_fav_song WHERE id_song = '$lagu[id_song]'");
                      ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td style="text-align: center;"><a href="play.php?id=<?= $lagu['id_song'] ?>"><?= $lagu['title'] ?></a></td>
                        <td style="text-align: center;"><?= $lagu['played'] ?></td>
                        <td style="text-align: center;"><?= number_format($countfav->num_rows) ?></td>
                      </tr>
                      <?php
                          $no++;
                        }
                      ?>
                    </tbody>
                </table>
    </div>
</div>
<br><br>
	</body>
</html>