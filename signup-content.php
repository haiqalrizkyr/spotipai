<div class="content">
<div class="warna">
	<h2 style="margin-top: 90px; text-align: center;">Sign Up Untuk Bergabung Keluarga Penikmat Musik.</h2>
	<br>
	<div class="container">
	<form action="register.php" class="form-horizontal"method="POST" id="formDaftar">
	<div class="form-group">
	 	<label class="col-sm-4 control-label">Username</label>
	 	<input class="form-control col-sm-4" type="text" name="username" placeholder="Username" required>
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
	 <br>
	 <div class="form-group">
	 	<label class="col-sm-4 control-label">Nama</label>
	 	<input class="form-control col-sm-4" type="text" name="nama" placeholder="Nama" required>
	 </div>
	 <br>
	 <div class="form-group">
	 	<label class="col-sm-4 control-label">Email</label>
	 	<input class="form-control col-sm-4" type="email" name="email" placeholder="Email" required>
	 </div>
	 <br><br>
	 <button type="submit" class="btn btn-success" name="Daftar">Sign Up</button>
	</form>
	</div>
</div>
</div>

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
						required:"<font color = 'red'>Username harus diisi!</font>",
						minlength:"Username minimal 5 karakter",
						maxlength:"Username maximal 20 karakter"
					},
					sandi:{
						required:"<font color = 'red'>Password harus diisi!</font>",
						minlength:"Password minimal 8 karakter",
						maxlength:"Password maximal 20 karakter"
					},
					sandi2:{
						equalTo:"<font color = 'red'>Konfirmasi Password tidak sesuai!</font>"
					},
					nama:{
						required:"<font color = 'red'>Nama harus diisi!</font>",
						minlength:"Nama minimal 5 karakter",
						maxlength:"Nama maximal 25 karakter"
					},
					email:{
						required:"<font color = 'red'>Email harus diisi!</font>",
						email:"Format Email tidak sesuai"
					}
				}
			});
		});
	</script>