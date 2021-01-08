<!DOCTYPE html>
<html>

<head>
	<title>Spotipai - Web Music Player</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php include 'script.html' ?>
    <style>
.container {
  position: relative;
  width: 100%;
}

.image {
  display: block;
  width: 100%;
  background-size: cover;
}

.overlay {
  position: absolute;
  bottom: 100%;
  left: 0;
  right: 0;
  overflow: hidden;
  width: 100%;
  height:0;
  transition: .5s ease;
}

.container:hover .overlay {
  bottom: 0;
  height: 100%;
}
#image_div
{
 width:1300px;
 margin-left:;
 position:relative;
}
#image_div img
{
 width:100%;
}
#image_div #image_label
{
 margin:0px;
 position:absolute;
 bottom:7px;
}
#image_div #image_label span
{
 background-color: #0B4C5F;
 opacity:0.8;
 font-size:50px;
 padding:7px;
 box-sizing:border-box;
 color:white;
 font-weight:bold;
}

.text {
  color: white;
  font-size: 30px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}</style>
</head>
<body style="background-color: #0e0e0d">
		<?php
		include 'header.php';
		include 'sidebar.php';
		?>
<div class="content">
    <div class="container">
    <div id="image_div">
 <img src="ariana.jpg" style="width:100%">
 <div class="overlay">
 <div class="text">Ariana is an American singer and actress. Born in Boca Raton, Florida, Grande began her career at age 15 in the 2008 Broadway musical 13. She rose to fame for her role as Cat Valentine in the Nickelodeon television series Victorious (2010–2013) and Sam & Cat (2013–2014)</div>
 </div><p id="image_label"><span>Ariana Grande</span></p>
</div>
</div>
    <h3 style="margin-top: 50px; color: white;">Album</h><br><br>
        <div class="content">
                <div class="container">
                <table class="table table-dark table-hover table-borderless">
                    <thead>
				        <tr>
					        <th scope="col">no.</th>
					        <th scope="col">Album</th>
                            <th scope="col">Total</th>
				        </tr>
                    <tbody>
                        <td>1</td>
                        <td>position</td>
                        <td>3 song</td>
                    </tbody>
                </table>
			</thead>
    </div>
</div>
<h3 style="margin-top: 50px; color: white;">Song</h><br><br>
        <div class="content">
                <div class="container">
                <table class="table table-dark table-hover table-borderless">
                    <thead>
				        <tr>
					        <th scope="col">no.</th>
					        <th scope="col">Song</th>
                            <th scope="col">Duration</th>
				        </tr>
                    <tbody>
                        <td>1</td>
                        <td>34+35</td>
                        <td>3:03</td>
                    </tbody>
                </table>
			</thead>
    </div>
</div>
	</body>
</html>