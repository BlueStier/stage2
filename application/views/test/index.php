<!DOCTYPE HTML>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Google MAP</title>
<style type="text/css">
html, body{
  margin:0;
  padding:0;
  min-height:100%;
}
#div_carte{
  margin:auto;
  margin-top:2.0em;
  width:757px;
  height:757px;
  border:1px solid #808080;
}
</style>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDi_lJupA7cM3dEQkfT3KF588oEFjviJ34"></script>
<script type="text/javascript">
 var geocoder = new google.maps.Geocoder();
 var addr, latitude, longitude;
 var data1= [];
  /* Fonction chargée de géolocaliser l'adresse */ 
 function geolocalise(){
   <?php
    $array = array(
      0=>array(50.460009,2.990777),
      1=>array(50.468357,2.994574)
    );
    $taille = sizeof($array);
    for($i =0;$i < $taille;$i++){
      echo "data1[".$i."]=[".$array[$i][0].",".$array[$i][1]."];";
    }
    
    
    ?>
  
  //data1[0]=[50.460009,2.990777];
 //data1[1]=[50.468357,2.994574];   
  /* Récupération du champ "adresse" */ 
  addr = document.getElementById('adresse').value;
  /*concatenation pour passer en paramètre le cp et le nom de la ville*/
  addr = addr.concat('62590 Oignies');
  /* Tentative de géocodage */ 
  geocoder.geocode( { 'address': addr}, function(results, status) {    
   /* Si géolocalisation réussie */ 
   if (status == google.maps.GeocoderStatus.OK) {
    /* Récupération des coordonnées */ 
    latitude = results[0].geometry.location.lat();
    longitude = results[0].geometry.location.lng();    
    data1[2]=[latitude,longitude];
   initCarte(data1);
   }  
  });
  
 }
 
function initCarte(data) {
  var i, nb = data.length;
  var oMarker;
  var oMap = new google.maps.Map(document.getElementById('div_carte'),{
      'center': new google.maps.LatLng( 50.46, 2.99),
      'zoom': 14,
      'backgroundColor': '#fff',
      'mapTypeId': google.maps.MapTypeId.ROADMAP
    });
 
  for( i=0; i < nb; i++){    
    oMarker = new google.maps.Marker({
        'map' : oMap,
        'position': new google.maps.LatLng( data[i][0], data[i][1])
      });  
  }  
}

// init lorsque la page est chargée
google.maps.event.addDomListener(window, 'load', initCarte);
</script>
</head>
<body>
<input type="text" id="adresse" placeholder="saisissez votre adresse à géolocaliser" />
<input type="button" onclick="geolocalise()" value="géolocaliser" />
  <div id="div_carte"></div>
</body>
</html>