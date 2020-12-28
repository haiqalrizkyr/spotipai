
<!DOCTYPE html>
<html>
<head>
		<title>Spotipai - Web Music Player</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<link rel="stylesheet" type="text/css" href="style.css">
			<?php include 'script.html'?>
			<script type="text/javascript" src="js/jquery.validate.min.js"></script>
			<script type="text/javascript">
		$(document).ready(function(){
			$('#formDaftar').validate({
				rules:{
					username:{
						minlength:5,
						maxlength:20
					},
					sandi:{
						minlength:8,
						maxlength:20
					},
					sandi2:{
						equalTo:"#sandi"
					},
					nama:{
						minlength:5,
						maxlength:25
					},
					email:{
						email:true
					}
				},
				messages:{
					username:{
						required:"Username harus diisi",
						minlength:"Username minimal 5 karakter",
						maxlength:"Username maximal 20 karakter"
					},
					sandi:{
						required:"Password harus diisi",
						minlength:"Password minimal 8 karakter",
						maxlength:"Password maximal 20 karakter"
					},
					sandi2:{
						equalTo:"Konfirmasi Password Tidak Sesuai Dengan Password"
					},
					nama:{
						required:"Nama harus diisi",
						minlength:"Nama minimal 5 karakter",
						maxlength:"Nama maximal 25 karakter"
					},
					email:{
						required:"Email harus diisi",
						email:"Format Email tidak sesuai"
					}
				}
			});
		});
	</script>
			<style>
				body{
					font-family: Montserrat;
				}.warna{
					color: white;
				}
			</style>
			
</head>	
    
	<body style="background-color: #0e0e0d">
		<?php
		include 'headersignup.php';
		include 'sidebar.php';
		?>
	
				<div class="warna">
	<h2 style="margin-top: 70px; text-align: center;">Sign Up Untuk Bergabung Keluarga Penikmat Musik.</h2>
	<br>
	
	<form action="register.php" method="POST" id="formDaftar">
		<table align="center">
			<tr>
				<td class="">Username</td>
				<td><input id="username" type="text" name="username"  required></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input id="sandi" type="password" name="sandi" required ></td>
			</tr>
			<tr>
				<td>Konfirmasi Password</td>
				<td><input id="sandi2" type="password" name="sandi2" required></td>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" required></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" required></td>
			</tr>
			<tr>
				<td></td>
				<td><button type="submit" class="btn btn-success"name="Daftar">Sign Up</button</td>
			</tr>
		</table>
	</form>
			</div>

</body>
</html>