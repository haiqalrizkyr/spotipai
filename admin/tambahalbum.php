<style>
	#small{
  	color: red;}
</style>
<h2 align="center">Tambah Album</h2>

<div class="container">
<div class="jumbotron">
	<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	 	<label class="col-sm-4 control-label">Album<small id="small"> *</small></label>
	 	<input type="text" class="form-control"  name="album"  required></input>
	 </div>
	 <div class="form-group">
	 	<label class="col-sm-4 control-label">Artist<small id="small"> *</small></label>
	 	<select class="form-control" name="artist" required>
	 		<option value="">-- Pilih Artist --</option>
	 		<option>1</option>
	 		<option>2</option>
	 	</select>  
	 </div>
	 <div class="form-group">
	 	<label class="col-sm-4 control-label">Year<small id="small"> *</small></label>
	 	<input type="number" min="0" class="form-control"  name="year"  required></input>
	 </div>
	 <small id="small">* Wajib Diisi</small>
	 <br><br>
	 <a  href="index.php?halaman=album" class="btn btn-info"><i class='fas fa-reply' ></i> BACK</span></a>
	 <button class ="btn btn-primary" name="save"><i class='fas fa-save'></i> SAVE</button>
	</form>

<?php
	if (isset($_POST['save'])) {
		$koneksi->query("INSERT INTO album (title, year) VALUES('$_POST[album]', '$_POST[year]')");

		echo "<script>alert('Album tersimpan!');</script>";
		echo "<script>location='index.php?halaman=album';</script>";
	}

?>