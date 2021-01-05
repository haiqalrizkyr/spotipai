<?php

	$id_song = $_GET['id_song'];

?>

<h2 align="center">Pilih Artist</h2>

<div style="width: 1050px" class="container">
<div class="jumbotron">
	<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	 	<label class="col-sm-4 control-label">Artist<small id="small"> *</small></label>
	 	<select class="form-control" name="artist" required>
	 		<option value="">-- Pilih Artist --</option>
	 		<?php 
	 			$ambil = $koneksi->query("SELECT * FROM artist");

	 			while ($pecah=$ambil->fetch_assoc()){ 
	 		?>
	 		<option value="<?php echo $pecah['id_artist']; ?>"><?php echo $pecah['nama_artist']; ?></option>
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
	 <a style="float: right;margin-right: 0px" href="index.php?halaman=songalbum&id_song=<?= $id_song ?>" class="btn btn-info">
	 	Next <i class="fas fa-chevron-right"></i>
	 </a>
	</form>
	<?php 
if(isset($_POST['save']))
{
	$id_artist = $_POST['artist'];

	$cekdata = $koneksi->query("SELECT id_song_artist FROM song_artist WHERE id_song = '$id_song' AND id_artist = '$id_artist'");

	if($cekdata->num_rows > 0){
		echo "<script>alert('Artist telah ada di lagu ini!');</script>";
		echo "<script>location='index.php?halaman=songartist&id_song=".$id_song."';</script>";
	}
	else{
		mysqli_query($koneksi,"INSERT INTO song_artist (id_song, id_artist) VALUES('$id_song', '$id_artist')");

		echo "<script>alert('Artist tersimpan.');</script>";
		echo "<script>location='index.php?halaman=songartist&id_song=".$id_song."';</script>";
	}
}
	?>