<style>
	#small{
  	color: red;}
</style>
<h2 align="center">EDIT LAGU</h2>

<div class="container">
<div class="jumbotron">
	<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	 	<label class="col-sm-4 control-label">Judul<small id="small"> *</small></label>
	 	<input class="form-control col-sm-4" type="text" name="judul" required>
	 </div>
     <div class="form-group">
	 	<label class="col-sm-4 control-label">Singer<small id="small"> *</small></label>
	 	<input class="form-control col-sm-4" type="text" name="singer" required>
	 </div>
     <div class="form-group">
     <label class="col-sm-4 control-label">Writer<small id="small"> *</small></label>
		<textarea name="writer" class="form-control col-sm-4"  rows="10" required></textarea>
	</div>
	<div class="form-group">
	 	<label class="col-sm-4 control-label">Genre<small id="small"> *</small></label>
	 	<input type="text" class="form-control"  name="genre"  required></input>
	 </div>
	 <small id="small">* Wajib Diisi</small>
	 <br><br>
		 <a  href="index.php?halaman=daftar_lagu" class="btn btn-info"><i class='fas fa-reply' ></i> BACK</a>
	 <button class ="btn btn-primary" name="save"><i class='fas fa-save'></i> EDIT</button>
	 </form>