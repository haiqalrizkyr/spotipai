<?php 
include 'koneksi.php';
?>
<style>
	#small{
  	color: red;}
</style>
<h2 align="center">Tambah Lagu</h2>

<div class="container">
<div class="jumbotron">
	<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	 	<label class="col-sm-4 control-label">Judul<small id="small"> *</small></label>
	 	<input class="form-control col-sm-4" type="text" name="title" >
	 </div>
     <div class="form-group">
	 	<label class="col-sm-4 control-label">tahun<small id="small"> *</small></label>
	 	<input class="form-control col-sm-4" type="text" name="year" >
	 </div>
     <div class="form-group">
     <label class="col-sm-4 control-label">file<small id="small"> *</small></label>
		<input type="file" name="song_file" id="song_file" class="form-control col-sm-4" accept="audio/*">
	</div>
	<!-- <div class="form-group">
	 	<label class="col-sm-4 control-label">Album<small id="small"> *</small></label>
	 	<select>
	 		<option value="<?php echo $pecah ['id_album']; ?>"><?php echo $pecah['title']; ?></option>
	 	</select>
	 </div> -->
	 <small id="small">* Wajib Diisi</small>
	 <br><br>
	 <a  href="index.php?halaman=daftar_lagu" class="btn btn-info"><i class='fas fa-reply' ></i> BACK</span></a>
	 <button class ="btn btn-primary" name="save"><i class='fas fa-save'></i> SAVE</button>
	</form>
<!-- <select>
	SELECT * FROM artist
	
	
</select>
<input type="submit" name="" value="pilih">
<button></button>
if isset $_POST['pilih']
{
	$_SESSION['a'] = 
}


$koneksi->insert_id;

 -->

	<?php 
if(isset($_POST['save']))
{
	$title = $_POST['title'];
	$year = $_POST['year'];
	$nama = $_FILES['song_file']['name'];
	$lokasi= $_FILES['song_file']['tmp_name'];
	move_uploaded_file($lokasi, "song/".$nama);
	mysqli_query($koneksi,"INSERT INTO song
	(title, year, song_file)
	VALUES('$title','$year','$nama')");

// $tampung = $koneksi->insert_id;

	echo "<script>alert('lagu tersimpan');</script>";
	echo "<script>location='index.php?halaman=songgenre';</script>";
}
	?>

<!-- ALUR
1.Tambah lagu untuk masukkan ke table song
2. move to tambah genre
3.isian dropdown dari table genre menggunakan isset
4. tekan halaman selanjutnya untuk nambah artist
5. isi dropdown dari table artist gunakan isset
5. tekan selanjutnya ke tambah album
6.save dan selesai  -->
