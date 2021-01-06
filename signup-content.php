<?php
include 'koneksi.php';
session_start();
?>

<div class="content" style="color: white;">
	<h1 style="margin-top: 10px; text-align: center;">Sign Up Untuk Bergabung Keluarga Penikmat Musik.</h1>
	<br>
	<div class="container">

		<?php
		if (isset($_POST['Daftar'])) {
			$cekakun = mysqli_query($koneksi, "SELECT id_user FROM user WHERE username = '$_POST[username]' OR email = '$_POST[email]'");

			$rowcount = mysqli_num_rows($cekakun);

			if ($rowcount > 0) {
				echo '<div class="alert alert-danger" role="alert">
  							Pendaftaran tidak berhasil, Username atau Email telah digunakan!
						  </div>';
			} else {
				$role_user = 2;
				$tanggal = date("d-m-Y");

				$querymasukkan = "INSERT INTO user(id_user_role, username, email, nama, password, date_signup)
										VALUES ('$role_user', '$_POST[username]', '$_POST[email]', '$_POST[nama]', '$_POST[sandi]', '$tanggal')";

				mysqli_query($koneksi, $querymasukkan);

				echo "<script> alert('Pendaftaran berhasil! Silakan login terlebih dahulu') </script>";
				echo "<script>location='index.php';</script>";
			}
		}
		?>

		<form class="form-horizontal" method="POST" id="formDaftar">
			<div class="form-group">
				<label class="col-sm-4 control-label">Username</label>
				<input class="form-control col-sm-4" type="text" name="username" placeholder="Username" required>
			</div>
			<br>
			<div class="form-group">
				<label class="col-sm-4 control-label">Email</label>
				<input class="form-control col-sm-4" type="email" name="email" placeholder="Email" required>
			</div>
			<br>
			<div class="form-group">
				<label class="col-sm-4 control-label">Nama</label>
				<input class="form-control col-sm-4" type="text" name="nama" placeholder="Nama" required>
			</div>
			<br>
			<div class="form-group">
				<label class="col-sm-4 control-label">Password</label>
				<input class="form-control col-sm-4" id="sandi" type="password" name="sandi" placeholder="Password" required>
			</div>
			<br>
			<div class="form-group">
				<label class="col-sm-4 control-label">Konfimasi Password</label>
				<input class="form-control col-sm-4" type="password" name="sandi2" placeholder="Konfirmasi Password">
			</div>
			<br><br>
			<button type="submit" class="btn btn-success" name="Daftar">Sign Up</button>
		</form>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#formDaftar').validate({
			rules: {
				username: {
					minlength: 5,
					maxlength: 20
				},
				sandi: {
					minlength: 8,
					maxlength: 20
				},
				sandi2: {
					equalTo: "#sandi"
				},
				nama: {
					minlength: 5,
					maxlength: 25
				},
				email: {
					email: true
				}
			},
			messages: {
				username: {
					required: "<font color = 'red'>Username harus diisi!</font>",
					minlength: "Username minimal 5 karakter",
					maxlength: "Username maximal 20 karakter"
				},
				sandi: {
					required: "<font color = 'red'>Password harus diisi!</font>",
					minlength: "Password minimal 8 karakter",
					maxlength: "Password maximal 20 karakter"
				},
				sandi2: {
					equalTo: "<font color = 'red'>Konfirmasi Password tidak sesuai!</font>"
				},
				nama: {
					required: "<font color = 'red'>Nama harus diisi!</font>",
					minlength: "Nama minimal 5 karakter",
					maxlength: "Nama maximal 25 karakter"
				},
				email: {
					required: "<font color = 'red'>Email harus diisi!</font>",
					email: "Format Email tidak sesuai"
				}
			}
		});
	});
</script>


<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>