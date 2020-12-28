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
</head>
<body>
    <h2 align="center">Daftar Lagu</h2>
    <br>
	<div class="container">
    <table id="example" class="table table-bordered">
	<a href="index.php?halaman=tambahlagu" id="right" class="btn btn-success"><i class='fas fa-folder-plus'></i> Tambah Lagu</a>
	<br><br>
	
	<thead>
		<tr>
			<th>No</th>
			<th>Judul</th>
			<th>Singer</th>
			<th>Writer</th>
			<th>Genre</th>
			<th style="width: 200px;">aksi</th>
		</tr>
	</thead>
    <tbody>

		<tr>
			<td>1</td>
			<td>Memories</td>
			<td>Maroon 5</td>
			<td>Adam Levine, Michael Pollack, Jacob Kasher, Hindlin Jonathan, Bellion Vincent, Ford, Stefan Johnson</td>
			<td>pop</td>
			<td>
			<a href="index.php?halaman=editlagu" class="btn btn-warning"><i class='fas fa-edit' ></i> edit</a>
			<a href="index.php?halaman=hapuslagu" class="btn-danger btn"><i class='fas fa-trash-alt'></i> hapus</a>
			</td>
		</tr>
		
		

	</tbody>
</table>
<script type="text/javascript">
    $(document).ready(function() {
         $('#example').DataTable()

    })
</script>
</body>
</html>
