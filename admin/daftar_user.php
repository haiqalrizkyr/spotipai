<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <title>Daftar User </title>
</head>
<body>
    <h2 align="center">daftar User</h2>
    <br>
	<div class="container">
    <table id="example" class="table table-bordered">
	<br><br>
	
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Email</th>
			<th>Tanggal Daftar</th>
		</tr>
	</thead>
    <tbody>
<?php $nomor=1; ?>
 		<?php $ambil=$koneksi->query("SELECT * FROM user where id_user_role = 2"); ?>
    	<?php while ($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['username']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			<td><?= $pecah['date_signup'] ?></td>
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
