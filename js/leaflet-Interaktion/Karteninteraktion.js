/**
 * @author Mazur93
 */
function newMarker(){
	addMarker = true;
	};
		
function resetView(){
	map.setView([30.505, 0.000], 2);
	}
	
function onMapClick(e) {
			if(addMarker == true){
			
			L.marker(e.latlng).addTo(map).bindPopup("Titel: <br />Katastrophenart: <br />URL: <br />Bewertung: <br />Breitengrad: " 
													+ e.latlng.lat + "<br />Längengrad: " + e.latlng.lng + "<br /><br /><a>Mehr Infos...</a>"
													) ;
			
			addMarker=false;
		}
		}	

		


