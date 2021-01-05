<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <title>Album </title>
</head>
<body>
    <h2 align="center">Album</h2>
    <br>
	<div class="container">
    <table id="example" class="table table-bordered">
	<a href="index.php?halaman=tambahalbum" id="right" class="btn btn-success"><i class='fas fa-folder-plus'></i> Tambah Album</a>
	<br><br>
	
	<thead>
		<tr>
			<th>No</th>
			<th>Judul dan tahun</th>
			<th>aksi</th>
		</tr>
	</thead>
    <tbody>
    	<?php
    		$no = 1;
    		$ambil = $koneksi->query("SELECT * FROM album");
    		while ($pecah = $ambil->fetch_assoc()) {
    	?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $pecah['title'] ?> (<?= $pecah['year'] ?>)</td>
			<td>
			<a href="index.php?halaman=editalbum&id=<?= $pecah['id_album'] ?>" class="btn btn-warning"><i class='fas fa-edit' ></i> edit</a>
			<a onclick="return confirm('Yakin ingin hapus?')" href="index.php?halaman=hapusalbum&id=<?= $pecah['id_album'] ?>" class="btn-danger btn"><i class='fas fa-trash-alt'></i> hapus</a>
			</td>
		</tr>

		<?php $no++; } ?>

	</tbody>
</table>
		<script type="text/javascript">
    $(document).ready(function() {
         $('#example').DataTable()

    })
</script> 
</body>
</html>
