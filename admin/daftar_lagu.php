	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <title>Daftar Lagu</title>
    <style type="text/css">
    	.atas{
    		margin-top: -60px;
    	}
    </style>
</head>
<body>
    <h2 align="center">Daftar Lagu</h2>
    <br>
	<div style="width: 1050px" class="container">
    <table id="example" class="table table-bordered">
	<a href="index.php?halaman=tambahlagu" id="right" class="btn btn-success"><i class='fas fa-folder-plus'></i> Tambah Lagu</a>
	<br><br>
	
	<thead>
		<tr>
			<th class="atas" style="text-align: center;" rowspan="2">No</th>
			<th class="atas" style="text-align: center;" rowspan="2">Title</th>
			<th class="atas" style="text-align: center;" rowspan="2">Year</th>
			<th class="atas" style="text-align: center;" rowspan="2">Song File</th>
			<th style="text-align: center;" colspan="2">Berapa Kali</th>
			<th  class="atas"style="text-align: center;" rowspan="2" width="150px;">aksi</th>
		</tr>
		<tr>
			<th>Diputar</th>
			<th>Difavorit</th>
		</tr>

	</thead>
    <tbody>
    	<?php $nomor=1; ?>
    	<?php $ambil=$koneksi->query("SELECT * FROM song"); ?>
    	<?php 
    		while ($pecah=$ambil->fetch_assoc()){

    			$countfav = $koneksi->query("SELECT id_user_fav_song FROM user_fav_song WHERE id_song = '$pecah[id_song]'");
    	?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['title']; ?></td>
			<td><?php echo $pecah['year']; ?></td>
			<td><?php echo $pecah['song_file']; ?></td>
			<td><?= number_format($pecah['played']) ?></td>
			<td><?= number_format($countfav->num_rows) ?></td>
			<td>
			<a href="index.php?halaman=editlagu&id_song=<?= $pecah['id_song'] ?>" class="btn btn-warning"><i class='fas fa-edit' ></i> edit</a>
			<a onclick="return confirm('Yakin ingin hapus lagu?')" href="index.php?halaman=hapuslagu&id_song=<?= $pecah['id_song'] ?>" class="btn-danger btn"><i class='fas fa-trash-alt'></i> hapus</a>
			</td>
		</tr>
		 <?php $nomor++; ?>
    <?php
    }
    ?>
	</tbody>
</table>
<script type="text/javascript">
    $(document).ready(function() {
         $('#example').DataTable()

    })
</script>
</body>
</html>
