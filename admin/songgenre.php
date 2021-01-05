<?php

	$id_song = $_GET['id_song'];

?>

<h2 align="center">Pilih Genre</h2>

<div style="width: 1050px" class="container">
<div class="jumbotron">
	<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	 	<label class="col-sm-4 control-label">Genre<small id="small"> *</small></label>
	 	<select class="form-control" name="genre" required>
	 		<option value="">-- Pilih Genre --</option>
	 		<?php 
	 			$ambil = $koneksi->query("SELECT * FROM genre");

	 			while ($pecah=$ambil->fetch_assoc()){ 
	 		?>
	 		<option value="<?php echo $pecah['id_genre']; ?>"><?php echo $pecah['nama_genre']; ?></option>
	 	<?php
	    	}
	    ?>
	 	</select>  
	 	<br>
	 <button style="float: right;" class ="btn btn-primary" name="save"><i class='fas fa-save'></i> Pilih</button>
	 </div>
	 <small id="small">* Wajib Diisi</small>
	 <br><br>
	 <br><br>
	 <a style="float: right;margin-right: 0px" href="index.php?halaman=songartist&id_song=<?= $id_song ?>" class="btn btn-info">
	 	Next <i class="fas fa-chevron-right"></i>
	 </a>
	</form>
	<?php 
if(isset($_POST['save']))
{
	$id_genre = $_POST['genre'];

	$cekdata = $koneksi->query("SELECT id_song_genre FROM song_genre WHERE id_song = '$id_song' AND id_genre = '$id_genre'");

	if($cekdata->num_rows > 0){
		echo "<script>alert('Genre telah ada di lagu ini!');</script>";
		echo "<script>location='index.php?halaman=songgenre&id_song=".$id_song."';</script>";
	}
	else{
		mysqli_query($koneksi,"INSERT INTO song_genre (id_song, id_genre) VALUES('$id_song', '$id_genre')");

		echo "<script>alert('Genre tersimpan');</script>";
		echo "<script>location='index.php?halaman=songgenre&id_song=".$id_song."';</script>";
	}
}
	?>