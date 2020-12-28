<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genre </title>
</head>
<body>
    <h2 align="center">Genre Musik</h2>
    <br>
	<div class="container">
    <table class="table table-bordered">
	<a href="index.php?halaman=tambahgenre" id="right" class="btn btn-success"><i class='fas fa-folder-plus'></i> Tambah Genre</a>
	<br><br>
	
	<thead>
		<tr>
			<th>No</th>
			<th>Genre</th>
			<th>aksi</th>
		</tr>
	</thead>
    <tbody>

		<tr>
			<td>1</td>
			<td>Pop</td>
			<td>
			<a href="index.php?halaman=editgenre" class="btn btn-warning"><i class='fas fa-edit' ></i> edit</a>
			<a href="index.php?halaman=hapusgenre" class="btn-danger btn"><i class='fas fa-trash-alt'></i> hapus</a>
			</td>
		</tr>
		
		

	</tbody>
</table>    
</body>
</html>
