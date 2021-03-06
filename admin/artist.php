<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <title>Artist </title>
</head>
<body>
    <h2 align="center">Artist</h2>
    <br>
	<div class="container">
    <table id="example" class="table table-bordered">
	<a href="index.php?halaman=tambahartist" id="right" class="btn btn-success"><i class='fas fa-folder-plus'></i> Tambah Artist</a>
	<br><br>
	
	<thead>
		<tr>
			<th>No</th>
			<th>Artist</th>
			<th>Foto</th>
			<th>About</th>
			<th>Aksi</th>
		</tr>
	</thead>
    <tbody>
<?php $nomor=1; ?>
    	<?php $ambil=$koneksi->query("SELECT * FROM artist"); ?>
    	<?php while ($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_artist']; ?></td>
			<td><img style="width: 200px" src="../artist_img/<?= $pecah['artist_image'] ?>"></td>
			<td style="width: 480px"><?= $pecah['about'] ?></td>
			<td>
			<a href="index.php?halaman=editartist&id=<?= $pecah['id_artist'] ?>" class="btn btn-warning"><i class='fas fa-edit' ></i> edit</a>
			<a onclick="return confirm('Yakin ingin hapus?')" href="index.php?halaman=hapusartist&id=<?= $pecah['id_artist'] ?>" class="btn-danger btn"><i class='fas fa-trash-alt'></i> hapus</a>
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
