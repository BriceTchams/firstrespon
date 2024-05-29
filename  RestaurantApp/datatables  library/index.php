
<!DOCTYPE html>
<html lang="en">
<head>
	<base target="_top">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Quick Start - Leaflet</title>

    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script> -->

	<link rel="stylesheet" href="./leaflet.css">
	<script src="./leaflet.js"></script>
	<script>
		function show(){
					document.getElementById('mybody').style="display:block";

		}

		function show1(){
					document.getElementById('mybody').style="display:none";

		}
	</script>


	<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		/* .leaflet-container {
			height: 400px;
			width: 600px;
			max-width: 100%;
			max-height: 100%;
		} */
	</style>

	
</head>
<body>

<?php 
	$pharmacy =  array(
		array('nom' => 'ste monique','lat' => 10.3270,'long' => 5.4657),
		array('nom' => 'montagne','lat' => 10.3370,'long' => 5.4477),
		array('nom' => 'benin','lat' => 10.3470,'long' => 5.4637),
		array('nom' => 'salvia','lat' => 10.3570,'long' => 5.4277),
		array('nom' => 'binam','lat' => 11.3260,'long' => 5.4177));
?>

<button id="btn" onclick="show()">
	afficher la position 
</button>
<button id="btn1" onclick="show1()">
masquer la position</button>
<div id="mybody">			
<div id="map" style="width: 400px; height: 200px; margin-left: 70px; "></div>


<script>

	const map = L.map('map').setView([10.3270, 5.4677], 13);

	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 50,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);

	// const marker = L.marker([10.25, 5.23]).addTo(map)
	// 	.bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();
	<?php $i = 1; foreach ($pharmacy as $ligne): ?>	
	const <?php echo 'mark'.$i; ?> = L.marker([<?php echo $ligne['lat']; ?>, <?php echo $ligne['long']; ?>]).addTo(map)
		.bindPopup('<b><?php echo $ligne['nom']; ?></b><br />I am a popup.').openPopup();
	<?php $i++; endforeach; ?>
</script>

</div>

</body>
</html>