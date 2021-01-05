<h2 align="center">Pilih Genre</h2>

<div class="container">
<div class="jumbotron">
	<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	 	<label class="col-sm-4 control-label">Genre<small id="small"> *</small></label>
	 	<select>
	 		
	 		<option>PILIH</option>
	 		<?php while ($pecah=$ambil->fetch_assoc()){ ?>
	 		<option value="<?php echo $pecah['id_genre']; ?>"><?php echo $pecah['nama_genre']; ?></option>
	 	</select  <?php
    }
    ?>>
	 </div>
	 <small id="small">* Wajib Diisi</small>
	 <br><br>
	 <a  href="index.php?halaman=songartist" class="btn btn-info"><i class='fas fa-reply' ></i> BACK</span></a>
	 <button class ="btn btn-primary" name="save"><i class='fas fa-save'></i> SAVE</button>
	</form>
	<?php 
if(isset($_POST['save']))
{
	$id_genre = $_POST['id_genre'];
	mysqli_query($koneksi,"INSERT INTO song_genre
	(id_genre)
	VALUES('$id_genre')");

// $tampung = $koneksi->insert_id;

	echo "<script>alert('lagu tersimpan');</script>";
	echo "<script>location='index.php?halaman=songgenre';</script>";
}
	?>