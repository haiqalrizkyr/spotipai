<style>
	#small{
  	color: red;}
</style>
<h2 align="center">EDIT Album</h2>

<div class="container">
<div class="jumbotron">
	<form method="post" enctype="multipart/form-data">
     	<?php

     		$id_album = $_GET['id'];

     		$dataalbum = $koneksi->query("SELECT * FROM album WHERE id_album = '$id_album'")->fetch_assoc();
     	?>
     <div class="form-group">
	 	<label class="col-sm-4 control-label">Album<small id="small"> *</small></label>
	 	<input type="text" class="form-control"  name="nama_album" value="<?= $dataalbum['title'] ?>" required></input>
	 </div>
	  <div class="form-group">
	 	<label class="col-sm-4 control-label">Artist<small id="small"> *</small></label>
	 	<select class="form-control" name="nama_artist" required>
	 		<option value="">-- Pilih Artist</option>
	 		<?php 
	 			$ambilartist = $koneksi->query("SELECT id_artist, nama_artist FROM artist");

	 			while($artist = $ambilartist->fetch_assoc()){

	 			  if($dataalbum['id_artist'] == $artist['id_artist']) :
	 		?>
	 				<option value="<?= $artist['id_artist'] ?>" selected><?= $artist['nama_artist'] ?></option>

	 			  <?php else : ?>
	 			  	<option value="<?= $artist['id_artist'] ?>"><?= $artist['nama_artist'] ?></option>

	 			  <?php endif ?>
	 		<?php } ?>
	 	</select>
	 </div> 
	 <div class="form-group">
	 	<label class="col-sm-4 control-label">Year<small id="small"> *</small></label>
	 	<input type="number" min="0" class="form-control"  name="year_album" value="<?= $dataalbum['year'] ?>" required></input>
	 </div>
	 <small id="small">* Wajib Diisi</small>
	 <br><br>
		 <a  href="index.php?halaman=album" class="btn btn-info"><i class='fas fa-reply' ></i> BACK</a>
	 <button class ="btn btn-primary" name="save"><i class='fas fa-save'></i> EDIT</button>
	 </form>

<?php
	if (isset($_POST['save'])) {
		$title = addslashes($_POST['nama_album']);
		$artist = $_POST['nama_artist'];
		$year = $_POST['year_album'];

		$koneksi->query("UPDATE album SET title = '$title', year = '$year', id_artist = '$artist' WHERE id_album = '$id_album'");

		echo "<script>alert('Album diubah!');</script>";
		echo '<script type="text/javascript">location="index.php?halaman=album"</script>';
	}

?>