<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album </title>
</head>
<body>
    <h2 align="center">Album Musik</h2>
    <br>
	<div class="container">
    <table class="table table-bordered">
	<a href="index.php?halaman=tambahalbum" id="right" class="btn btn-success"><i class='fas fa-folder-plus'></i> Tambah Album</a>
	<br><br>
	
	<thead>
		<tr>
			<th>No</th>
			<th>album</th>
			<th>aksi</th>
		</tr>
	</thead>
    <tbody>

		<tr>
			<td>1</td>
			<td>monokrom</td>
			<td>
			<a href="index.php?halaman=editalbum" class="btn btn-warning"><i class='fas fa-edit' ></i> edit</a>
			<a href="index.php?halaman=hapusalbum" class="btn-danger btn"><i class='fas fa-trash-alt'></i> hapus</a>
			</td>
		</tr>
		
		

	</tbody>
</table>    
</body>
</html>
