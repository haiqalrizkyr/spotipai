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
			<th>Nama</th>
			<th>Judul</th>
			<th>Tanggal playlist dibuat</th>
			<th>aksi</th>
		</tr>
	</thead>
    <tbody>
<?php $nomor=1; ?>
 		
		<tr>
			<td><?php echo $nomor; ?></td>
			<td></td>
			<td></td>
			<td></td>
			<td>
			<a href="index.php?halaman=detail_playlist_user" class="btn btn-info"><i class='fas fa-edit' ></i> Detail</a>
			</td>
		</tr>
		 <?php $nomor++; ?>
   
		

	</tbody>
</table> 
		<script type="text/javascript">
    $(document).ready(function() {
         $('#example').DataTable()

    })
</script>
</body>
</html>
