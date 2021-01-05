<?php

	$id_song = $_GET['id_song'];

?>

<h2 align="center">Pilih Album</h2>

<div style="width: 1050px" class="container">
<div class="jumbotron">
	<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	 	<label class="col-sm-4 control-label">Album<small id="small"> *</small></label>
	 	<select class="form-control" name="album" required>
	 		<option value="">-- Pilih Album --</option>
	 		<option value="single">Single (tidak ada album)</option>
	 		<?php 
	 			$ambil = $koneksi->query("SELECT * FROM album");

	 			while ($pecah=$ambil->fetch_assoc()){ 
	 		?>
	 		<option value="<?php echo $pecah['id_album']; ?>"><?php echo $pecah['title']; ?> (<?= $pecah['year'] ?>)</option>
	 	<?php
	    	}
	    ?>
	 	</select>  
	 	<br>
	 <button style="float: right;" class ="btn btn-primary" name="save"><i class='fas fa-save'></i> Save</button>
	 </div>
	 <small id="small">* Wajib Diisi</small>
	 <br><br>
	</form>
	<?php 
if(isset($_POST['save']))
{
	$id_album = $_POST['album'];

  if($id_album != "single"){

		$cekdata = $koneksi->query("SELECT id_song_album FROM song_album WHERE id_song = '$id_song' AND id_album = '$id_album'");

		if($cekdata->num_rows > 0){
			echo "<script>alert('Lagu ini telah ada di album yang dipilih!');</script>";
			echo "<script>location='index.php?halaman=songalbum&id_song=".$id_song."';</script>";
		}
		else{
			mysqli_query($koneksi,"INSERT INTO song_album (id_song, id_album) VALUES('$id_song', '$id_album')");

			echo "<script>alert('Album tersimpan.');</script>";
			echo "<script>location='index.php?halaman=daftar_lagu';</script>";
		}
  }
  else{
  	echo "<script>alert('Album tersimpan.');</script>";
	echo "<script>location='index.php?halaman=daftar_lagu';</script>";
  }
}
	?>