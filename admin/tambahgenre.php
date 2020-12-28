<style>
	#small{
  	color: red;}
</style>
<h2 align="center">Tambah Genre</h2>

<div class="container">
<div class="jumbotron">
	<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	 	<label class="col-sm-4 control-label">Genre<small id="small"> *</small></label>
	 	<input type="text" class="form-control"  name="genre"  required></input>
	 </div>
	 <small id="small">* Wajib Diisi</small>
	 <br><br>
	 <a  href="index.php?halaman=genre" class="btn btn-info"><i class='fas fa-reply' ></i> BACK</span></a>
	 <button class ="btn btn-primary" name="save"><i class='fas fa-save'></i> SAVE</button>
	</form>