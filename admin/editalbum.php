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
	 	<label class="col-sm-4 control-label">Year<small id="small"> *</small></label>
	 	<input type="number" min="0" class="form-control"  name="year_album" value="<?= $dataalbum['year'] ?>" required></input>
	 </div>
	 <small id="small">* Wajib Diisi</small>
	 <br><br>
		 <a  href="index.php?halaman=playlist" class="btn btn-info"><i class='fas fa-reply' ></i> BACK</a>
	 <button class ="btn btn-primary" name="save"><i class='fas fa-save'></i> EDIT</button>
	 </form>

<?php
	if (isset($_POST['save'])) {
		$koneksi->query("UPDATE album SET title = '$_POST[nama_album]', year = '$_POST[year_album]' WHERE id_album = '$id_album'");

		echo "<script>alert('Album diubah!');</script>";
		echo '<script type="text/javascript">location="index.php?halaman=album"</script>';
	}

?>