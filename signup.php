
<!DOCTYPE html>
<html>
<head>
		<title>Spotipai - Web Music Player</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
			<?php include 'script.html'?>
			<script type="text/javascript" src="js/jquery.validate.min.js"></script>
			<script type="text/javascript" src="js/bootstrap.js"></script>

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
				.warna{
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
	<center><div class="container">
	<form action="register.php" class="form-horizontal"method="POST" id="formDaftar">
	<div class="form-group">
	 	<label class="col-sm-4 control-label">Username</label>
	 	<input class="form-control col-sm-4" type="text" name="username" placeholder="Username" required>
	 </div>
	 <div class="form-group">
	 	<label class="col-sm-4 control-label">Password</label>
	 	<input class="form-control col-sm-4" type="password" name="sandi" placeholder="Password" required>
	 </div>
	 <div class="form-group">
	 	<label class="col-sm-4 control-label">Konfimasi Password</label>
	 	<input class="form-control col-sm-4" type="password" name="sandi2" placeholder="Konfirmasi Password" required>
	 </div>
	 <div class="form-group">
	 	<label class="col-sm-4 control-label">Nama</label>
	 	<input class="form-control col-sm-4" type="text" name="nama" placeholder="Nama" required>
	 </div>
	 <div class="form-group">
	 	<label class="col-sm-4 control-label">Email</label>
	 	<input class="form-control col-sm-4" type="email" name="email" placeholder="Email" required>
	 </div>
	 <button type="submit" class="btn btn-success" name="Daftar">Sign Up</button>
	</form>
			</div>
			</div>
			</center>
</body>
</html>