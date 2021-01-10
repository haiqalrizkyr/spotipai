<style>
	#small{
  	color: red;}
</style>
<h2 align="center">Tambah Artist</h2>

<div class="container">
<div class="jumbotron">
	<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	 	<label class="col-sm-4 control-label">Artist<small id="small"> *</small></label>
	 	<input type="text" class="form-control"  name="nama_artist" placeholder="Nama Artist" required></input>
	 </div>
	 <div class="form-group">
	 	<label class="col-sm-4 control-label">About<small id="small"> *</small></label>
	 	<textarea type="text" class="form-control" name="about" placeholder="About" required></textarea>
	 </div>
	 <div class="form-group">
	 	<label class="col-sm-4 control-label">foto<small id="small"> *</small></label>
	 	<input type="file" class="form-control" name="foto" accept="image/*" required></input>
	 </div>
	 <small id="small">* Wajib Diisi</small>
	 <br><br>
	 <a  href="index.php?halaman=artist" class="btn btn-info"><i class='fas fa-reply' ></i> BACK</span></a>
	 <button class ="btn btn-primary" name="save"><i class='fas fa-save'></i> SAVE</button>
	</form>
	<?php 
if(isset($_POST['save']))
{
	$nama_artist = addslashes($_POST['nama_artist']);
	$about = addslashes($_POST['about']);
	$namafoto = addslashes($_FILES['foto']['name']);
	$lokasi= $_FILES['foto']['tmp_name'];

	move_uploaded_file($lokasi, "../artist_img/".$namafoto);

	mysqli_query($koneksi,"INSERT INTO artist (nama_artist, artist_image, about) VALUES('$nama_artist', '$namafoto', '$about')");

// $tampung = $koneksi->insert_id;

	echo "<script>alert('Data artist tersimpan');</script>";
	echo "<script>location='index.php?halaman=artist';</script>";
}
	?>