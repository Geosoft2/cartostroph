/**
 * @author Mazur93
 */
var lat;
var lng;
// var URL;
// var Titel;
var MarkerArray = [];
function newMarker(){
	addMarker = true;
	};
		
function resetView(){
	map.setView([30.505, 0.000], 2);
	}
	
function onMapClick(e) {
	if (addMarker == true){ 
				lng = e.latlng.lng;
				lat = e.latlng.lat;
				document.getElementById("map").setAttribute("data-reveal-id","newTopicModal",true);
				document.getElementById("URL").value = "";
				document.getElementById("Titel").value = "";
				document.getElementById("Kommentar").value = "";
				addMarker = false;
	}
		
}	
function submitTopic(){
	var URL = document.getElementById("URL").value;
	var Titel = document.getElementById("Titel").value;
	var Bewertung = document.getElementById("Bewertung").value;
	L.marker([lat, lng]).addTo(map).bindPopup("Titel: " + Titel + "<br />URL: " + URL + "<br />Bewertung: "
								       		 + Bewertung + "<br />Breitengrad: " + lat + "<br />Längengrad: " + lng + "<br /><br /><a>Mehr Infos...</a>");	
	addMarker = false;
	document.getElementById("map").removeAttribute("data-reveal-id");				       		 								
}


