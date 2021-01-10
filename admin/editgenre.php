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
<h2 align="center">EDIT GENRE</h2>


<div class="container">
<div class="jumbotron">

	<?php

$id_genre =$_GET['id_genre'];
$ambil =$koneksi->query("SELECT * FROM genre WHERE id_genre = '$id_genre'");
$pecah = $ambil->fetch_assoc();
?>
	<form method="post" enctype="multipart/form-data">
     <div class="form-group">
	 	<label class="col-sm-4 control-label">Genre<small id="small"> *</small></label>
	 	<input class="form-control" type="text" name="nama_genre" value="<?php echo $pecah['nama_genre']; ?>" required>
	 </div>
	 <small id="small">* Wajib Diisi</small>
	 <br><br>
		 <a  href="index.php?halaman=genre" class="btn btn-info"><i class='fas fa-reply' ></i> BACK</a>
	 <button class ="btn btn-primary" name="save"><i class='fas fa-save'></i> EDIT</button>
	 </form>
	</div>
</div>

</body>
</html>

<?php
	if (isset($_POST['save'])) {
		$nama_genre = addslashes($_POST['nama_genre']);

		$koneksi->query("UPDATE genre SET nama_genre = '$nama_genre' WHERE id_genre = '$id_genre'");

		echo "<script>alert('Genre diubah!');</script>";
		echo '<script type="text/javascript">location="index.php?halaman=genre"</script>';
	}

?>