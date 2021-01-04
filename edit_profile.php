<?php
session_start();

include 'koneksi.php';

if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
        echo "<script> alert('Anda belum login. Silakan login terlebih dahulu!') </script>";
        echo "<script>location='index.php';</script>";
    }

    $id_user = $_SESSION['user']['id_user'];

?>
<!DOCTYPE html>
<html>

<head>
    <title>Spotipai - Web Music Player</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php include 'script.html' ?>

</head>

<body style="background-color: #0e0e0d">
    <?php
    include 'header.php';
    include 'sidebar.php';
    ?>

    <div class="content">
        <div class="container" style="width:100%; background-color: #313131; margin-top: 70px; color: white;">
          <br><br>
          <h2>Edit your account details</h2>
          <br>
          <?php
            if (isset($_POST['simpan'])) {
                $uname = $_POST['username'];
                $email = $_POST['email'];
                $nama = $_POST['nama'];

                $cekakun = $koneksi->query("SELECT id_user FROM user WHERE username = '$uname' OR email = '$email'");

                if ($cekakun->num_rows > 0 && $uname != $_SESSION['user']['username'] && $email != $_SESSION['user']['email']) {
                    echo '<div class="alert alert-danger" role="alert">
                            Failed to change your data. Username or Email already exists!
                          </div>';
                }
                else{
                    $koneksi->query("UPDATE user SET username = '$uname', email = '$email', nama = '$nama' WHERE id_user = '$id_user'");

                    $akun = $koneksi->query("SELECT * FROM user WHERE id_user = '$id_user'")->fetch_assoc();

                    $_SESSION['user'] = $akun;
                    
                    echo "<script> alert('Your data has been successfully saved!') </script>";
                    echo "<script>location='profile.php';</script>";

                }
            }
          ?>
          <form class="form-horizontal" method="POST" id="formDaftar">
            <div class="form-group">
                <label class="col-sm-4 control-label">Username</label>
                <input class="form-control col-sm-4" type="text" name="username" placeholder="Username" required value="<?= $_SESSION['user']['username'] ?>">
            </div>
            <br>
            <div class="form-group">
                <label class="col-sm-4 control-label">Email</label>
                <input class="form-control col-sm-4" type="email" name="email" placeholder="Email" required value="<?= $_SESSION['user']['email'] ?>">
            </div>
            <br>
            <div class="form-group">
                <label class="col-sm-4 control-label">Nama</label>
                <input class="form-control col-sm-4" type="text" name="nama" placeholder="Nama" required value="<?= $_SESSION['user']['nama'] ?>">
            </div>
            <br>
            <br><br>
            <button style="float: right; margin-right: 30px" type="submit" class="btn btn-success" name="simpan">Save</button>
            <a style="float: right; margin-right: 20px" class="btn btn-secondary" href="profile.php">Back</a>
          </form>
          <br><br>
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
</body>

</html>