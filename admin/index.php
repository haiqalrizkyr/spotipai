<?php
session_start();
//koneksi ke database
$koneksi= new mysqli("localhost","root","","admin_spotipai");

if (!isset($_SESSION['admin'])) 
{
   echo "<script>alert('Anda harus login');</script>";
   echo "<script>location='login.php';</script>";
   exit();
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin spotipai</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
   <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 20px;">&nbsp; <a href="logout.php" class="btn btn-primary square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation" style="background-color: white;">
            <div class="sidebar-collapse" >
                <ul class="nav" id="main-menu" style="background-color: black;">
				<li class="text-center">
                    <img src="smiletipai.jpeg"  class="user-image img-responsive"/>
					</li>
                    <li><a class="active-menu"  href="index.php "><i class="fa fa-home fa-3x" style="font-size:36px"></i> Home</a></li>
                    <li><a class="active-menu"  href="index.php?halaman=daftar_lagu"><i class="fa fa-music" style="font-size:36px"></i> Daftar Lagu</a></li>
                    <li><a class="active-menu"  href="index.php?halaman=genre"><i class="material-icons" style="font-size:36px">&#xe063;</i> Genre</a></li>
                    <li><a class="active-menu"  href="index.php?halaman=playlist"><i class="material-icons" style="font-size:36px">&#xe03d;</i> Playlist</a></li>
                    <li><a class="active-menu"  href="index.php?halaman=artist"><i class="material-icons" style="font-size:36px">&#xe030;</i> Artist</a></li>
                    <li><a class="active-menu"  href="index.php?halaman=logout"><i class="fa fa-minus-circle fa-3x"></i> Logout</a></li>
                </li>  
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php
                if (isset($_GET['halaman']))
                {
                    if ($_GET['halaman']=="genre")
                    {
                        include 'genre.php';
                    }
                    elseif ($_GET['halaman']=="playlist")
                    {
                        include 'playlist.php';
                    }
                    elseif ($_GET['halaman']=="artist")
                    {
                        include 'artist.php';
                    }   
                    elseif ($_GET['halaman']=="logout")
                    {
                        include 'logout.php';
                    }
                    elseif ($_GET['halaman']=="daftar_lagu")
                    {
                        include 'daftar_lagu.php';
                    }
                    elseif ($_GET['halaman']=="tambahlagu")
                    {
                        include 'tambahlagu.php';
                    }
                    elseif ($_GET['halaman']=="editlagu")
                    {
                        include 'editlagu.php';
                    }
                    elseif ($_GET['halaman']=="hapuslagu")
                    {
                        include 'hapuslagu.php';
                    }
                    elseif ($_GET['halaman']=="tambahgenre")
                    {
                        include 'tambahgenre.php';
                    }
                    elseif ($_GET['halaman']=="editgenre")
                    {
                        include 'editgenre.php';
                    }
                    elseif ($_GET['halaman']=="hapusgenre")
                    {
                        include 'hapusgenre.php';
                    }
                    elseif ($_GET['halaman']=="tambahplaylist")
                    {
                        include 'tambahplaylist.php';
                    }
                    elseif ($_GET['halaman']=="editplaylist")
                    {
                        include 'editplaylist.php';
                    }
                    elseif ($_GET['halaman']=="hapusplaylist")
                    {
                        include 'hapusplaylist.php';
                    }
                    elseif ($_GET['halaman']=="tambahartist")
                    {
                        include 'tambahartist.php';
                    }
                    elseif ($_GET['halaman']=="editartist")
                    {
                        include 'editartist.php';
                    }
                    elseif ($_GET['halaman']=="hapusartist")
                    {
                        include 'hapusartist.php';
                    }
                }
                else
                {
                    include 'home.php';
                }
                ?>
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
