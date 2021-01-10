<?php 
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

<style>
	#small{
  	color: red;}
</style>
</head>
<body>
<h2 align="center">Tambah Genre</h2>

        
<div class="container">
<div class="jumbotron">
	<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	 	<label class="col-sm-4 control-label">Genre<small id="small"> *</small></label>
	 	<input class="form-control col-sm-4" type="text" name="nama_genre" >
	 	
	 </div>
	 <small id="small">* Wajib Diisi</small>
	 <br><br>
	 <a  href="index.php?halaman=genre" class="btn btn-info"><i class='fas fa-reply' ></i> BACK</span></a>
	 <button class ="btn btn-primary" name="save"><i class='fas fa-save'></i> SAVE</button>
	</form>
	</div>
</div>
	<?php 
if(isset($_POST['save']))
{
	$nama_genre = addslashes($_POST['nama_genre']);
	mysqli_query($koneksi,"INSERT INTO genre
	(nama_genre)
	VALUES('$nama_genre')");

// $tampung = $koneksi->insert_id;

	echo "<script>alert('genre tersimpan');</script>";
	echo "<script>location='index.php?halaman=genre';</script>";
}
	?>

</body>
</html>