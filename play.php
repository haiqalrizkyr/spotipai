<?php
    session_start();

    include 'koneksi.php';

    if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
        echo "<script> alert('Anda belum login. Silakan login terlebih dahulu!') </script>";
        echo "<script>location='index.php';</script>";
    }

    $id_user = $_SESSION['user']['id_user'];
    $id_lagu = $_GET['id'];

    $querylagu = "SELECT title, year, song_file FROM song WHERE id_song = '$id_lagu'";

    $ambillagu = $koneksi->query($querylagu);

    $datalagu = $ambillagu->fetch_assoc();
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
        <div class="container" style="width:1000px ; background-color: #313131; border-radius:35px;">
            <table style="margin-top: 70px; color:white; text-align:center" align="center">
                <tr>
                    <td>
                    	<button style="margin-top:30px;padding: 90px; background-color: white; border-radius:35px;" disabled>
                    		<i class="fas fa-music fa-7x"></i>
                    	</button>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 80px;"><?= $datalagu['title'] ?></td>
                </tr>
                <tr>
                	<td>
                		<?php 
                			$queryfav = "SELECT id_user_fav_song FROM user_fav_song WHERE id_user = '$id_user' AND id_song = '$id_lagu'";
                			$ambilfav = $koneksi->query($queryfav);
    						$datafav = $ambilfav->fetch_assoc();

                			if ($ambilfav->num_rows == 0) :
                		?>
                		  <a title="Add to Favorite" href="add_to_favorite.php?id=<?= $id_lagu ?>" style="color: white;"><i class="far fa-heart fa-3x"></i></a>

                		<?php else : ?>
                		  <a title="Favorited" href="delete_to_favorite.php?id=<?= $datafav['id_user_fav_song'] ?>" style="color: white;">
                		  	<i class="fas fa-heart fa-3x"></i>
                		  </a>

                		<?php endif ?>
                	</td>
                </tr>
                <tr>
                    <td style="font-size: 50px;">
                    	<?php
                    		$queryartis = "SELECT a.nama_artist FROM song s JOIN song_artist sa 
											ON s.id_song = sa.id_song AND s.id_song = '$id_lagu' JOIN artist a 
											WHERE sa.id_artist = a.id_artist";

							$ambilartis = $koneksi->query($queryartis);
							$jumlahartis = $ambilartis->num_rows;
							$i = 1;
							while ($dataartis = $ambilartis->fetch_assoc()) {	
								echo $dataartis['nama_artist'];

								if ($i < $jumlahartis) {
									echo ", ";
								}

								$i++;
							}
                    	?>
                	</td>
                </tr>
            </table>
            <br>
            <div class="audio" align="center">
            	<audio controls id="player">
                    <source src="song/<?= $datalagu['song_file'] ?>" type="audio/mpeg">
                    Your browser does not support the audio tag.
                </audio>
            </div>
            <br>
            <div class="container" style="color: white; padding-bottom:30px;">
                <h3 align="center">About This Song</h3>
                <table align="center">
                    <tr>
                        <td>
                        	<?php
                        		$queryalbum = "SELECT al.id_album, al.title, al.year FROM song s JOIN song_album sal 
                        						ON s.id_song = sal.id_song AND s.id_song = '$id_lagu' JOIN album al 
                        						WHERE sal.id_album = al.id_album";

                        		$ambilalbum = $koneksi->query($queryalbum);
                        		$jumlahalbum = $ambilalbum->num_rows;
                        		$dataalbum = $ambilalbum->fetch_assoc();
                        	?>
                        	Album : <?php 
                        				if($jumlahalbum == 1) {
                        					echo "<a href='album_song.php?id_album=".$dataalbum['id_album']."'>".$dataalbum['title']."</a>";
                        							"(".$dataalbum['year'].")";
                        				} 
                        				else {echo "Single";} 
                        			?>
                    	</td>
                    </tr>
                    <tr>
                        <td>Year : <?= $datalagu['year'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() { 
                $("#player").one("play", function() { 
                    $.ajax({
                        type: "GET",
                        dataType: "html",
                        url: "play_count.php?id=<?= $id_lagu ?>"
                    });
                }); 
            }); 
    </script>
</body>

</html>