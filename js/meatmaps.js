function initialize() {
	// Create an array of styles.
	var styles = [
	  {
	    "stylers": [
	         { "visibility": "on" },
	         { "hue": "#f181ad" }, // or ff00cc
	         { "saturation": 0 }, //-48
	         { "gamma": 1 } //-0.73
	       ]
	  }
	];
	
	var styledMap = new google.maps.StyledMapType(styles, {name: "Meatmap"});
	var mapCanvas = document.getElementById('map_canvas');
	var mapOptions = {
		center: new google.maps.LatLng(0, 0),
		zoom: 2,
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
		}
	};
  	var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
  
  	var image = 'images/meatcube2.png';
  	//var image2 = 'images/greencube.png';
  
	var infowindow = new google.maps.InfoWindow(), marker, i;
	 for (i = 0; i < markers.length; i++) {  
	    marker = new google.maps.Marker({
	         position: new google.maps.LatLng(markers[i][1], markers[i][2]),
	         map: map,
	         icon: image
	     });
	     google.maps.event.addListener(marker, 'click', (function(marker, i) {
	         return function() {
	             infowindow.setContent(markers[i][0]);
	             infowindow.open(map, marker);
	         }
	     })(marker, i));
	 }
  
	map.mapTypes.set('map_style', styledMap);
	map.setMapTypeId('map_style');
}

google.maps.event.addDomListener(window, 'load', initialize);