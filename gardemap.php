
<!DOCTYPE html>
<html>
<head>
	<title>Access Google Maps API in PHP</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/googlemap.js"></script>
	
	<style type="text/css">
		.container {
			height: 450px;
		
		}
		 #map {
			width: 100%;
			height: 120%;
			border: 0px solid blue;
			 margin-top:4%;
		} 
		#data, #allData {
			display: none;
		}
	#container
	{
		margin-top:-8%;
	}
	
	</style>
</head>
<body>
<?php
//  include "menucli.php";

?>
	<div class="container" id="container">
<center><h1>les pharmacies les plus plus proche de l'endroid ou vous etes actuellement</h1></center>
		<?php 
		   if(isset($_GET['code'])){
			$code=$_GET['code'];
		}
			require 'fonctionMap.php';
			$edu = new education;
			$coll = $edu->getCollegesBlankLatLng();
			$coll = json_encode($coll, true);
			echo '<div id="data">' . $coll . '</div>';

			$allData = $edu->getAllColleges($code);
			//  echo json_encode($allData);
			foreach($allData as $data){
				 $lng=$data['lng'];
			}
			$allData = json_encode($allData, true);
			echo '<div id="allData">' . $allData . '</div>';			
		 ?>
		<div id="map"></div>
	</div>
</body>
 <!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyDelMOVsafXGIxZe8LBIGFuF-YSJVxdlW8&callback=initMap">
</script> -->
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDelMOVsafXGIxZe8LBIGFuF-YSJVxdlW8&callback=loadMap">
</script> 
</html>