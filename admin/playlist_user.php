<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <title>Playlist user </title>
</head>
<body>
    <h2 align="center">Playlist User</h2>
    <br>
	<div class="container">
    <table id="example" class="table table-bordered">
	<br><br>
	
	<thead>
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Judul Playlist</th>
			<th>Tanggal playlist dibuat</th>
			<th>aksi</th>
		</tr>
	</thead>
    <tbody>
		<?php $nomor=1; ?>
 		<?php
 			$ambilpl = $koneksi->query("SELECT u.username, up.id_user_playlist, up.nama_playlist, up.date_created 
 										FROM user u JOIN user_playlist up ON u.id_user = up.id_user");

 			while($datapl =  $ambilpl->fetch_assoc()){
 		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?= $datapl['username'] ?></td>
			<td><?= $datapl['nama_playlist'] ?></td>
			<td><?= $datapl['date_created'] ?></td>
			<td>
				<a href="index.php?halaman=detail_playlist_user&id_playlist=<?= $datapl['id_user_playlist'] ?>&user=<?= $datapl['username'] ?>&judul=<?= $datapl['nama_playlist'] ?>" class="btn btn-info">
					<i class='fas fa-edit' ></i> Detail
				</a>
			</td>
		</tr>
		 <?php $nomor++; } ?>
   
		

	</tbody>
</table> 
		<script type="text/javascript">
    $(document).ready(function() {
         $('#example').DataTable()

    })
</script>
</body>
</html>
