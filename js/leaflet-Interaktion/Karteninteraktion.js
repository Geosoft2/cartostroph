﻿/**
 * @author Mazur93
 */
var lat;
var lng;
var userLat;
var userLng;
var userRadius = 0;
var radi;
var bboxUR = false;
var bboxLL = false;
var bboxURcoor;
var bboxLLcoor;
var Bbox = false;
var bboxPolygon;
var MarkerArray = [];
function newMarker(){
	addMarker = true;
	};
	
function discardTopic(){
	document.getElementById("map").removeAttribute("data-reveal-id");
	};
		
function resetView(){
	map.setView([30.505, 0.000], 2);
	}
	
function onMapClick(e) {
	if (addMarker == true){ 
				lng = e.latlng.lng;
				lat = e.latlng.lat;
				document.getElementById("Breitengrad").value = lat;
				document.getElementById("Längengrad").value = lng;
				document.getElementById("newTopicModal").setAttribute("overflow","scroll");
				document.getElementById("map").setAttribute("data-reveal-id","newTopicModal",true);
				document.getElementById("URL").value = "";
				document.getElementById("Titel").value = "";
				document.getElementById("Kommentar").value = "";
				document.getElementById("checkbox1").checked="true";
				document.getElementById("Autor").value = author();
				addMarker = false;
	}else if (bboxUR == true) {
		bboxURcoor = e.latlng;
		bboxLL = true;
		bboxUR = false;
	}else if (bboxLL == true){
		bboxLLcoor = e.latlng;
		var bounds = [bboxURcoor, bboxLLcoor];
		bboxPolygon = L.rectangle(bounds, {color: "#FF0040", weight: 1}).addTo(map);
		bboxLL = false;
		userbbox++;
	}
		
}

function activateAssessment() {
	 if(document.getElementById("checkbox1").checked == false){
		document.getElementById("Bewertung").removeAttribute("disabled");
	 } else {
	 	document.getElementById("Bewertung").setAttribute("disabled","true",true);
	 }
}

function activateSlider() {
	document.getElementById("Bewertung").removeAttribute("disabled");
	document.getElementById("checkbox1").checked = false;
}

function hilfeCookie() {
	if(document.getElementById("HilfeAusschalten").checked == true){
		document.cookie = "Hilfe=aus";
	} else {
		document.cookie = "Hilfe=an";
	}
	
}


// Man gibt das gesuchte Attribut als String an
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
    }
    return "";
} 


function HilfeAnzeigen() {
	var c = getCookie("Hilfe");
	if(c=="" || c=="an"){
	$(document).ready(function(){$('#HilfeModal').foundation('reveal', 'open')});
	}
}

function author() {
	var autor = getCookie("Autor");
	if(autor == "" || autor == 0){
		autor = "Gast";
	}
	return autor;
}

function loggedIn() {
	var autor = getCookie("Autor");
	if(autor == "" || autor == 0){
		autor = "Login";
	}
	return autor;
}

function showDataOnMap(URL) {
	
	var Typ = URL.split(".");
	var Laenge = Typ.length;
	Typ = Typ[(Laenge - 1)];
	var ur = URL;
	alert(ur);
	if ((ur.indexOf('WMS') != -1) || (ur.indexOf('wms') != -1)) {
	alert("it is a wms");
	Typ = "WMS";
	}
	
	//boundingBox gibt an ob 
	boundingBox = true;
	if((Typ == "jpg" || Typ == "png") && boundingBox ){
		Typ = "geoPic"
	}
	
	switch(Typ) {
		// GEOJSON
		case "geojson":
		$.ajax({
    	type: "POST",
    	url: URL ,
    	dataType: 'json',
    	success: function (response) {

        geojsonLayer = L.geoJson(response, {
            style: yourLeafletStyle
        }).addTo(map);
    }
});
		break;
		
		//KML
		case "kml":
		alert(Typ);
		omnivore.kml(URL).addTo(map);
		break;
		
		//GML
		case "gml":
		alert(Typ);
		
		break;
		
		
		//JPEG
		case "jpg":
		alert(Typ);
		document.write("<img src='" + URL +  "' alt='Boris'>");
		break;
		
		
		//PNG
		case "png":
		alert(Typ);
		document.write("<img src='" + URL +  "' alt='Boris'>");
		break;
		
		
		//JPEG / PNG mit boundingBox die angegeben wurde
		case "geoPic":
		alert(Typ);
		var imageUrl = URL ,
    	imageBounds = [[40.712216, -74.22655], [40.773941, -74.12544]];
		L.imageOverlay(imageUrl, imageBounds).addTo(map);
		map.fitBounds([
    	[40.712, -74.227],
    	[40.774, -74.125]]);
		break;
		
		
		//WMTS
		case "WMTS":
		alert(Typ);
		
		break;
		
		//WFS
		case "WFS":
		alert(Typ);
		
		break;
		
		
		case "WMS":
		var nexrad = L.tileLayer.wms("http://mesonet.agron.iastate.edu/cgi-bin/wms/nexrad/n0r.cgi", {
    //layers: 'nexrad-n0r-900913',
    format: 'image/png',
    transparent: true,
    attribution: "Weather data © 2012 IEM Nexrad"
}).addTo(map);
		// var temperature = L.tileLayer.wms(URL, {
    	// format: 'img/png',
    	// transparent: true,
    	// layers: 'nexrad-n0r-900913',
    	// //layers: 16
		// }).addTo(map);
		break;
	}
}

function clickMarker() {
	URL = this.getPopup().getContent().split("<br/>")[1].split("=")[1].split(">")[1].split(",")[0]
	URL = URL.substring(0,URL.length-3);
	urlCookie = "URL=" + URL;
	document.cookie = "URL=" + URL;
}

function onLocationFound(e) {
            var radius = e.accuracy / 2;
            L.marker(e.latlng).addTo(map)
                .bindPopup("Sie befinden sich innerhalb von " + radius + " Metern von diesem Punkt").openPopup(); 
            L.circle(e.latlng, radius).addTo(map);
            //fill the filter with lat and long values
			document.getElementById("lat").value = e.latlng.lat;
			document.getElementById("lng").value = e.latlng.lng;
        }
        
function onLocationError(e) {
            alert(e.message);
        }            

function searchCircle() {
	userRadius++;
	if(userRadius >= 2) {
		map.removeLayer(radi);
		var rad = document.getElementById("radius").value * 1000;
    	radi = L.circle([userLat,userLng],rad).addTo(map);
	}else {
		var rad = document.getElementById("radius").value * 1000;
    	radi = L.circle([userLat,userLng],rad).addTo(map);
	}
}

function searchBoundingBox() {
		bboxUR = true;
		if(bboxPolygon != null){
			map.removeLayer(bboxPolygon);
		}
}     


