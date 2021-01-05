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

$id_artist =$_GET['id_artist'];
$ambil =$koneksi->query("SELECT * FROM artist");
$pecah = $ambil->fetch_assoc();
?>
	<form method="post" enctype="multipart/form-data">
     <div class="form-group">
	 	<label class="col-sm-4 control-label">artist<small id="small"> *</small></label>
	 	<input class="form-control" type="text" name="nama_artist" value="<?php echo $pecah['nama_artist']; ?>" required>
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