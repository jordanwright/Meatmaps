<?php
	//Start session
	require_once('engine.php');	
	siteArea('map');
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Meatmaps</title>
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="title" content="Meatmaps" />
		<meta name="description" content="Meatmaps. A worldwide map of meat." />
		<meta name="keywords" content="Meatmaps, Meat, Maps, Map, Space, Spaces, Meatspace, Meatspaces" />
		
		<link href="/css/meatmaps.css" rel="stylesheet" type="text/css" />
		
		<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<script src="/js/overlap-fix.js"></script>
		<script>
			var markers = [
			 <? 
			 	// Pull cordinates of the meats
			 	$pQcoordsGet="SELECT * FROM member WHERE `long`!='0' AND `lat`!='0'";
			 	$eQcoordsGet=mysqli_query($GLOBALS['db'], $pQcoordsGet);
			 	
			 	if($eQcoordsGet->num_rows > 0) {
			 		while($rQcoordsGet=mysqli_fetch_array($eQcoordsGet)) {
			 			?>['<b><? echo $rQcoordsGet['firstname']; ?></b><? if($rQcoordsGet['twitter']!==""){ ?><br /><a href="http://twitter.com/<? echo $rQcoordsGet['twitter']; ?>">@<? echo$rQcoordsGet['twitter']; ?></a><? } ?>', <? echo $rQcoordsGet['lat']; ?>, <? echo $rQcoordsGet['long']; ?>],
			 			<? echo "\n"; 
			 		}
			 	}
			  ?>
			];
		</script>
		<script src="/js/meatmaps.js"></script>
		
	</head>
	<body>
		<div id="header">
			<div id="title">Meatmaps <span class="small">Beta</span></div>
			<div id="top-buttons">
				<? if(getUserID()==true) { ?>
					<a href="/settings.php">Profile</a>
				<? } else { ?>
					<a href="login.php">Login</a>
				<? } ?>
			</div>
		</div>
		 <div id="map_canvas"></div>
		 
		 <script>
		   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		   })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		 
		   ga('create', 'UA-22891854-4', 'meatmaps.com');
		   ga('send', 'pageview');
		 
		 </script>
	</body>
</html>
<? exit; ?>


