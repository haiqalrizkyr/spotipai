<?php
include ("koneksi.php");

if(isset($_POST['btnlogin']))
{
$user_login=$_POST['pengguna'];
$pass_login=$_POST['sandi'];

$sql = "SELECT * FROM accounts WHERE username = '{$user_login}' and password = '{$pass_login}'";
$query = mysqli_query($koneksi, $sql);
$count = mysqli_num_rows($query);

if(!$query){
die("Query gagal " . mysqli_error($koneksi));
}
if(!empty($user_login) && (!empty($pass_login))){
if($count==0){
echo "Username not found";
} else {
while($row = mysqli_fetch_array($query)){
$user = $row['username'];
$pass = $row['password'];
$nama = $row['nama'];
$email = $row['email'];
$level = $row['level'];
}
if($user_login == $user &&  $pass_login == $pass && $level == 1){
header("Location:adminn.php");
$_SESSION['username'] = $user;
$_SESSION['nama'] = $nama;
$_SESSION['email'] = $email;
$_SESSION['level'] = $level;
} elseif ($user_login == $user && $pass_login == $pass && $level ==2){
header("Location:user.php");
$_SESSION['username'] = $user;
$_SESSION['nama'] = $nama;
$_SESSION['level'] = $level;

}else {
echo "User tidak ditemukan";
echo "$user";
echo "$pass";
}



}
}else {
if(empty($user_login) || empty($pass_login)){
echo "username dan password tidak boleh kosong";
}
}
}

?>

<!DOCTYPE html>
<html>
<head>
            <meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
			<script type="text/javascript" src="js/bootstrap.js"></script>
			<?php include 'script.html'?>
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
		include 'headerlogin.php';
		include 'sidebar.php';
		?>
    <div class="warna">
	<center><div class="container">
    <h2 style="margin-top: 70px; text-align: center;">Log In Untuk Mulai Mendengarkan.</h2>
	<form action="" class="form-horizontal" method="POST" >
	<div class="form-group">
	 	<label class="col-sm-4 control-label">Username</label>
	 	<input class="form-control col-sm-4" type="text" name="username" placeholder="Username" required>
	 </div>
	 <div class="form-group">
	 	<label class="col-sm-4 control-label">Password</label>
	 	<input class="form-control col-sm-4" type="password" name="sandi" placeholder="Password" required>
	 </div>
	 <button class="btn btn-success" type="submit" name="btnlogin">Login </button>
	</form>

		</form>
		</div>
		</div>
		</center>
</body>



</body>
</html>
