<style>
	#small{
  	color: red;}
</style>
<h2 align="center">EDIT LAGU</h2>

<?php
	$id_song = $_GET['id_song'];

	$datalagu = $koneksi->query("SELECT * FROM song WHERE id_song = '$id_song'")->fetch_assoc();

	$ambilartist = $koneksi->query("SELECT sa.id_song_artist, a.id_artist, a.nama_artist FROM song_artist sa JOIN artist a ON sa.id_artist = a.id_artist WHERE sa.id_song = '$id_song'");

	$ambilgenre = $koneksi->query("SELECT sg.id_song_genre, g.id_genre, g.nama_genre FROM song_genre sg JOIN genre g ON sg.id_genre = g.id_genre WHERE sg.id_song = '$id_song'");
?>

<div style="width: 1050px" class="container">
<div class="jumbotron">
	<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	 	<label class="col-sm-4 control-label">Judul<small id="small"> *</small></label>
	 	<input class="form-control col-sm-4" type="text" name="judul" value="<?= $datalagu['title'] ?>" required>
	 </div>
	 <br><br><br><br>
	 <div class="form-group">
	 	<label class="col-sm-4 control-label">Year<small id="small"> *</small></label>
	 	<input class="form-control col-sm-4" type="number" min="0" name="year" value="<?= $datalagu['year'] ?>" required>
	 </div>
	 <br><br><br><br>
     <div class="audio form-group">
	 	<label class="col-sm-4 control-label">Song File<small id="small"> *</small></label>
	 	<audio controls>
	 		<source src="../song/<?= $datalagu['song_file'] ?>" type="audio/mpeg">
	 		Your browser does not support the audio tag.
	 	</audio>
	 	<br>
	 	Upload file lagu baru untuk mengganti lagu
	 	<input class="form-control col-sm-4" type="file" name="file" accept="audio/*">
	 </div>
	 <br><br>
     <div class="form-group">
     <label class="col-sm-4 control-label">Artist(s)<small id="small"> *</small></label>
	 <br>
	 <br>
		<?php while ($dataartist = $ambilartist->fetch_assoc()){ ?>
			<a href="editlagu_delete_artist.php?id=<?= $dataartist['id_song_artist'] ?>">&times;</a>&nbsp;&nbsp;&nbsp;<?= $dataartist['nama_artist'] ?><br>
		<?php } ?>
		<br>
		<div class="input-group" style="width: 400px">
			<select name="artist_baru" class="form-control">
				<option value="">-- Tambah Artist --</option>
				<?php 
					$takeartist = $koneksi->query("SELECT * FROM artist");

					while ($dataartist = $takeartist->fetch_assoc()){ 
				?>
					<option value="<?= $dataartist['id_artist'] ?>"><?= $dataartist['nama_artist'] ?></option>
				<?php } ?>
			</select>
			<span class="input-group-btn">
				<button name="tambah-artist" class="btn btn-success">Tambah</button>>
			</span>
		</div>
	</div>
	<div class="form-group">
	 	<label class="col-sm-4 control-label">Genre<small id="small"> *</small></label>
	 	<br>
	    <br>
		<?php while ($datagenre = $ambilgenre->fetch_assoc()){ ?>
			<a href="editlagu_delete_genre.php?id=<?= $datagenre['id_song_genre'] ?>">&times;</a>&nbsp;&nbsp;&nbsp;<?= $datagenre['nama_genre'] ?><br>
		<?php } ?>
		<br>
		<div class="input-group" style="width: 400px">
			<select name="genre_baru" class="form-control">
				<option value="">-- Tambah Genre --</option>
				<?php 
					$takegenre = $koneksi->query("SELECT * FROM genre");

					while ($datagenre = $takegenre->fetch_assoc()){ 
				?>
					<option value="<?= $datagenre['id_genre'] ?>"><?= $datagenre['nama_genre'] ?></option>
				<?php } ?>
			</select>
			<span class="input-group-btn">
				<button name="tambah-genre" class="btn btn-success">Tambah</button>>
			</span>
		</div>
	 </div>
	 <div class="form-group">
	 	<label class="col-sm-4 control-label">Album<small id="small"> *</small></label>
	 	<br>
	    <br>
		<div class="input-group" style="width: 400px">
			<select name="album_baru" class="form-control">
				<?php 
					$ambilalbum = $koneksi->query("SELECT sa.id_song_album, sa.id_album FROM song_album sa JOIN album a ON sa.id_album = a.id_album WHERE sa.id_song = '$id_song'");

					$semuaalbum = $koneksi->query("SELECT * FROM album");

					if($ambilalbum->num_rows == 0){
				?>
						<option value="single" selected>Single</option>
				<?php
						while ($pecahalbum = $semuaalbum->fetch_assoc()){
				?>
							<option value="<?= $pecahalbum['id_album'] ?>"><?= $pecahalbum['title'] ?> (<?= $pecahalbum['year'] ?>)</option>
				<?php
						}
					}
					else{
						$albumnow = $ambilalbum->fetch_assoc();

						echo '<option value="single">Single</option>';
						while($pecahalbum = $semuaalbum->fetch_assoc()){
							if ($pecahalbum['id_album'] == $albumnow['id_album']) {
				?>
								<option value="<?= $pecahalbum['id_album'] ?>" selected><?= $pecahalbum['title'] ?></option>				
				<?php
							}
							else{
								echo '<option value="'.$pecahalbum['id_album'].'">'.$pecahalbum['title'].'</option>';
							}
						}
					}
				?>
			</select>
			<span class="input-group-btn">
				<button name="pilih-album" class="btn btn-success">Pilih</button>>
			</span>
		</div>
	 </div>
	 <small id="small">* Wajib Diisi</small>
	 <br><br>
		 <a  href="index.php?halaman=daftar_lagu" class="btn btn-info"><i class='fas fa-reply' ></i> BACK</a>
	 <button class ="btn btn-primary" name="save"><i class='fas fa-save'></i> SAVE</button>
	 </form>
</div>
</div>

<?php
	
	if (isset($_POST['save'])) {
		$nama = $_FILES['file']['name'];
		$lokasi= $_FILES['file']['tmp_name'];

		if (!empty($lokasi)) {
			
			move_uploaded_file($lokasi, "../song/".$nama);

			$koneksi->query("UPDATE song SET title = '$_POST[judul]', year = $_POST[year], song_file = '$nama' WHERE id_song = '$id_song'");

		}
		else{
			$koneksi->query("UPDATE song SET title = '$_POST[judul]', year = $_POST[year] WHERE id_song = '$id_song'");
		}

		echo "<script>alert('Data tersimpan.');</script>";
		echo "<script>location='index.php?halaman=daftar_lagu';</script>";
	}
	elseif(isset($_POST['tambah-artist'])){
		// $_POST['artist_baru']

		$countrow = $koneksi->query("SELECT id_song_artist FROM song_artist WHERE id_song = '$id_song' AND id_artist = '$_POST[artist_baru]'");

		if($countrow->num_rows > 0){
			echo "<script>alert('Data artist telah ada.');</script>";

			echo '<meta http-equiv="refresh" content="0.1" >';
		}
		else{
			$koneksi->query("INSERT INTO song_artist (id_song, id_artist) VALUES ('$id_song', '$_POST[artist_baru]')");

			echo '<meta http-equiv="refresh" content="0.1" >';
		}
	}
	elseif(isset($_POST['tambah-genre'])){
		$countrow = $koneksi->query("SELECT id_song_genre FROM song_genre WHERE id_song = '$id_song' AND id_genre = '$_POST[genre_baru]'");

		if ($countrow->num_rows > 0) {
			echo "<script>alert('Data genre telah ada.');</script>";

			echo '<meta http-equiv="refresh" content="0.1" >';
		}
		else{
			$koneksi->query("INSERT INTO song_genre (id_song, id_genre) VALUES ('$id_song', '$_POST[genre_baru]')");

			echo '<meta http-equiv="refresh" content="0.1" >';
		}
	}
	elseif (isset($_POST['pilih-album'])) {

		if ($_POST['album_baru'] == "single"){
			$countrow = $koneksi->query("SELECT id_song_album, id_album FROM song_album WHERE id_song = '$id_song'");

			if ($countrow->num_rows > 0) {
				$koneksi->query("DELETE FROM song_album WHERE id_song = '$id_song'");

				echo '<meta http-equiv="refresh" content="0.1" >';
			}
			else{
				echo '<meta http-equiv="refresh" content="0.1" >';
			}
		}
		else{
			$countrow = $koneksi->query("SELECT id_song_album, id_album FROM song_album WHERE id_song = '$id_song'");

			if ($countrow->num_rows > 0) {
				
				$cekbeda = $countrow->fetch_assoc();

				if ($_POST['album_baru'] == $cekbeda['id_album']) {
					echo '<meta http-equiv="refresh" content="0.1" >';
				}
				else{
					$koneksi->query("UPDATE song_album SET id_album = '$_POST[album_baru]' WHERE id_song = '$id_song'");

					echo '<meta http-equiv="refresh" content="0.1" >';
				}
			}
			else{

				$koneksi->query("INSERT INTO song_album (id_song, id_album) VALUES('$id_song', '$_POST[album_baru]')");

				echo '<meta http-equiv="refresh" content="0.1" >';
			}
		}
	}

?>