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
	 	<input type="text" class="form-control"  name="nama_artist"  required></input>
	 </div>
	 <small id="small">* Wajib Diisi</small>
	 <br><br>
	 <a  href="index.php?halaman=artist" class="btn btn-info"><i class='fas fa-reply' ></i> BACK</span></a>
	 <button class ="btn btn-primary" name="save"><i class='fas fa-save'></i> SAVE</button>
	</form>
	<?php 
if(isset($_POST['save']))
{
	$nama_artist = $_POST['nama_artist'];
	mysqli_query($koneksi,"INSERT INTO artist
	(nama_artist)
	VALUES('$nama_artist')");

// $tampung = $koneksi->insert_id;

	echo "<script>alert('artist tersimpan');</script>";
	echo "<script>location='index.php?halaman=artist';</script>";
}
	?>