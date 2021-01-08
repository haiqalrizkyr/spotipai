<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <title>Detail Playlist User </title>
</head>
<body>
    <h2 align="center">Detail Playlist User</h2>
    <br>
    <center><a href="index.php?halaman=playlist_user" class="btn btn-danger">Kembali</a></center>
	<div class="container">
    <table id="example" class="table table-bordered">
	<br><br>
	<thead>
	 <tr>
        <th colspan="2" style="text-align: center;">Daftar Lagu dalam Playlist</th>
    </tr>
    <tr>
        <th style="text-align: center;">Judul</th>
        <th style="text-align: center;">Tanggal di add ke playlist</th>
    </tr>
</thead>
</table> 
		<script type="text/javascript">
    $(document).ready(function() {
         $('#example').DataTable()

    })
</script>
</body>
</html>
