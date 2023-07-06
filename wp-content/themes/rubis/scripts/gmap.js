// google maps
function initGMap(mapID , options){
	if(options.address && options.address.length > 0){
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({'address': options.address} , function(result , status){
																	options.latitude = result[0].geometry.location.lat();
																	options.longitude = result[0].geometry.location.lng();
																	GMap(mapID , options);
														});
	}else{
		GMap(mapID , options);
	}
}

function GMap(mapID , options){
	var mapOptions = {
			  mapTypeId: options.type ,
			  zoom: Number(options.zoom) ,
			  zoomControl: options.nav_controls == "true" ? true : false ,
			  panControl: options.nav_controls == "true" ? true : false ,
			  streetViewControl: options.enable_street_view == "true" ? true : false ,
			  mapTypeControl: options.map_type_controls == "true" ? true : false ,
			  draggable: options.draggable == "true" ? true : false ,
			  scrollwheel: options.scrollwheel == "true" ? true : false ,
			  center: new google.maps.LatLng(options.latitude , options.longitude)
			};
	
	var map = new google.maps.Map(document.getElementById(mapID) , mapOptions);
	
	for(var i = 0 ; i < options.markers.length ; i++){
		initGMarker(map , options.markers[i]);
	}
}

function initGMarker(map , markerOptions){
	if(markerOptions.address && markerOptions.address.length > 0){
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({'address': markerOptions.address} , function(result , status){
																	markerOptions.latitude = result[0].geometry.location.lat();
																	markerOptions.longitude = result[0].geometry.location.lng();
																	GMarker(map , markerOptions);
														});
	}else{
		GMarker(map , markerOptions);
	}
}

function GMarker(map , markerOptions){
	var markerShadow = new google.maps.MarkerImage(template_path + '/images/map/shadow.png' ,
												 new google.maps.Size(59, 32) ,
												 new google.maps.Point(0,0) ,
												 new google.maps.Point(16, 32));
												 
	var markerIcon = new google.maps.MarkerImage(template_path + "/images/map/" + markerOptions.color + "-dot.png",
												 new google.maps.Size(32, 32) ,
												 new google.maps.Point(0,0) ,
												 new google.maps.Point(16, 32));
														 
	var marker = new google.maps.Marker({
		map: map ,
		draggable:false ,
		shadow: markerShadow ,
		icon: markerIcon ,
		title: markerOptions.title ,
		position:  new google.maps.LatLng(markerOptions.latitude , markerOptions.longitude),
	});
}