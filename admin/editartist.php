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

$id_artist =$_GET['id'];
$ambil =$koneksi->query("SELECT nama_artist, artist_image, about FROM artist WHERE id_artist = '$id_artist'");
$pecah = $ambil->fetch_assoc();
?>
	<form method="post" enctype="multipart/form-data">
     <div class="form-group">
	 	<label class="col-sm-4 control-label">artist<small id="small"> *</small></label>
	 	<input class="form-control" type="text" name="nama_artist" value="<?php echo $pecah['nama_artist']; ?>" required>
	 </div>
	 <div class="form-group">
	 	<label class="col-sm-4 control-label">About<small id="small"> *</small></label>
	 	<textarea type="text" class="form-control" name="about" required><?= $pecah['about'] ?></textarea>
	 </div>
	 
	 <div class="form-group">
	 	<label class="col-sm-4 control-label">foto<small id="small"> *</small></label><br><br>
	 	<img style="width: 200px" src="../artist_img/<?= $pecah['artist_image'] ?>"><br><br>
	 	<input type="file" class="form-control" name="foto" accept="image/*"></input>
	 </div>
	 <small id="small">* Wajib Diisi</small>
	 <br><br>
		 <a  href="index.php?halaman=artist" class="btn btn-info"><i class='fas fa-reply' ></i> BACK</a>
	 <button class ="btn btn-primary" name="save"><i class='fas fa-save'></i> EDIT</button>
	 </form>
	</div>
</div>


</body>
</html>

<?php
	if (isset($_POST['save'])) {
		$namafoto = addslashes($_FILES['foto']['name']);
		$lokasi= $_FILES['foto']['tmp_name'];

		$nama = addslashes($_POST['nama_artist']);
		$about = addslashes($_POST['about']);

		if (!empty($lokasi)) {
			move_uploaded_file($lokasi, "../artist_img/".$namafoto);

			$koneksi->query("UPDATE artist SET nama_artist = '$nama', artist_image = '$namafoto', about = '$about' WHERE id_artist = '$id_artist'");			
		}
		else {

			$koneksi->query("UPDATE artist SET nama_artist = '$nama', about = '$about' WHERE id_artist = '$id_artist'");
		}

		echo "<script>alert('Data artist diubah!');</script>";
		echo '<script type="text/javascript">location="index.php?halaman=artist"</script>';
	}

?>