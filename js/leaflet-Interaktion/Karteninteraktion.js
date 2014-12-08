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
				document.getElementById("Breitengrad").value = lat;
				document.getElementById("Längengrad").value = lng;
				document.getElementById("newTopicModal").setAttribute("overflow","scroll");
				document.getElementById("map").setAttribute("data-reveal-id","newTopicModal",true);
				document.getElementById("URL").value = "";
				document.getElementById("Titel").value = "";
				document.getElementById("Kommentar").value = "";
				document.getElementById("checkbox1").checked="true";
				addMarker = false;
	}
		
}	
function submitTopic(){
	var URL = document.getElementById("URL").value;
	var Titel = document.getElementById("Titel").value;
	var Bewertung = document.getElementById("Bewertung").value;
	var Autor = getCookie("Autor");
	L.marker([lat, lng]).addTo(map).bindPopup("Titel: " + Titel + "<br />Bewertung: "
								       		 + Bewertung + "<br />Breitengrad: " + "<br/> Autor: " + Autor  + "<br /><br /><a>Mehr Infos...</a>");	
	addMarker = false;
	document.getElementById("map").removeAttribute("data-reveal-id");				       		 								
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
