<?php
	session_start();

	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
	<title>Spotipai - Web Music Player</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php include 'script.html' ?>
	<style>
		.container button {
			border-radius: 35px;
			border-color: transparent;
			font-size: 27px;
			color: white;
			width: 300px;
			height: 100px;
			padding: auto;
		}
	</style>
</head>

<body style="background-color: #0e0e0d">
	<?php
	include 'header.php';
	include 'sidebar.php';
	?>
	<div class="content">
		<h1 style="margin-top: 70px; color: white;">All Genres</h1>
		<div class="container">
			<!-- <button style="padding-right: 100px; background-color: #686128">Dance/Electronic</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button style="background-color: #B76348">R&B</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button style="padding-right: 290px; background-color: #65B748">Blues</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<br><br><button style="padding-right: 240px; background-color: #C9BB36">Hip Hop</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button style="padding-right: 310px; background-color: #286841">Pop</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button style="background-color: #282E68">Rock</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<br><br><button style="padding-right: 290px; background-color: #68284E">Jazz</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button style="padding-right: 250px; background-color: #3644C9">Country</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button style="background-color: #C9368D">Indie</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<br><br><button style="background-color: #8EB44B">Chill</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button style="padding-right: 280px; background-color: #714BB4">Metal</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button style="padding-right: 250px; background-color: #D629BA">Acoustic</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
		  <div class="row">
			<?php
	            $ambilgenre = $koneksi->query("SELECT * FROM genre ORDER BY rand()");

	            while ($datagenre = $ambilgenre->fetch_assoc()){
	        ?>
	        <div class="col-sm-4 mb-4">
	        	<button class="btn btn-block" onclick="window.location.href='#<?= $datagenre['id_genre'] ?>'" style="background-color: <?php echo '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6); ?>;">
	        		<?= $datagenre['nama_genre'] ?>
	        	</button>	
	        </div>
	        <?php } ?>
	      </div>
		</div>
	</div>
</body>

</html>