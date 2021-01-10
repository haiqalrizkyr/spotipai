<?php
    $id_playlist = $_GET['id_playlist'];
    $username = $_GET['user'];
    $judul_pl = $_GET['judul'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <title>Detail Playlist User</title>
</head>
<body>
    <h2 align="center">Detail Playlist <?= $username ?></h2>
    <br>
    <center><a href="index.php?halaman=playlist_user" class="btn btn-danger">Kembali</a></center>
	<div class="container">
    <table id="example" class="table table-bordered">
	<br><br>
	<thead>
	 <tr>
        <th colspan="3" style="text-align: center;">Daftar Lagu dalam Playlist <?= $judul_pl ?></th>
     </tr>
     <tr>
        <th style="text-align: center;">Judul</th>
        <th style="text-align: center;">Artist</th>
        <th style="text-align: center;">Added on</th>
     </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;

            $ambillagu = $koneksi->query("SELECT s.id_song, s.title, s.year, ups.added_on FROM song s JOIN user_playlist_song ups ON s.id_song = ups.id_song WHERE ups.id_user_playlist = '$id_playlist'");

            while ($lagu = $ambillagu->fetch_assoc()){
        ?>
        <tr>
            <td style="text-align: center;"><?= $lagu['title'] ?> (<?= $lagu['year'] ?>)</td>
            <td style="text-align: center;">
                <?php
                    $queryartis = "SELECT a.nama_artist FROM song s JOIN song_artist sa 
                                            ON s.id_song = sa.id_song AND s.id_song = '$lagu[id_song]' JOIN artist a 
                                            WHERE sa.id_artist = a.id_artist";

                    $ambilartis = $koneksi->query($queryartis);

                    while ($artis = $ambilartis->fetch_assoc()){
                ?>
                        <?= $artis['nama_artist'] ?> <br>
                <?php } ?>
            </td>
            <td style="text-align: center;"><?= $lagu['added_on'] ?></td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table> 
		<script type="text/javascript">
    $(document).ready(function() {
         $('#example').DataTable()

    })
</script>
</body>
</html>
