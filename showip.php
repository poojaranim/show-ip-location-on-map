<?php
$conn = mysqli_connect("localhost", "USER", "PASSWD","YOURDATABASE");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error($conn));
    exit();    #var_dump($xdist,$xlat,$xlng,$ylat,$ylng,$maxdistanz);
}
$xlat = 51.46392;
$xlng =7.30219 ;
mysqli_set_charset($conn, 'utf8');
$api_key= "AIzaSyBhi-cegCT2oGrLkK9hlP8A96jvaxmhamM";
?>
 <html>
   <head>
    <script type='text/javascript' src='jquery-1.6.2.min.js'></script>
    <script type='text/javascript' src='jquery-ui.min.js'></script>
    <style>
        BODY {font-family : Verdana,Arial,Helvetica,sans-serif; color: #000000; font-size : 13px ; }
        #map { width:100%; height: 100%; z-index: 0; }
    </style>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6EGrvk3Ej0b0WjCEXZQVlCooZDVTQyEc" /></script>
    <script type='text/javascript'>
    jQuery(document).ready( function($){
            var geocoder;
            var map;
            var markersArray = [];
            var infos = [];
            geocoder = new google.maps.Geocoder();
            var myOptions = {
                  zoom: 9,
                  mapTypeId: google.maps.MapTypeId.ROADMAP
             }
             map = new google.maps.Map(document.getElementById("map"), myOptions);
            
            var bounds = new google.maps.LatLngBounds();
            var encodedString;
            var stringArray = [];
            encodedString = document.getElementById("encodedString").value;
            stringArray = encodedString.split("****");
           var x;
            for (x = 0; x < stringArray.length; x = x + 1){
                   
 var addressDetails = [];
                var marker;
                addressDetails = stringArray[x].split("&&&");
var pos2=addressDetails[0].search("Division: </b>");
var teil2 = addressDetails[0].substring(pos2+14,pos2+54);
var pos3 = teil2.search("</p>");
var teil3 = teil2.substring(0,pos3);
var pos1=addressDetails[0].search("Name: </b>");
var teil1 = addressDetails[0].substring(pos1+10,pos1+30);
var pos4 = teil1.search("<br>");
var teil1 = teil1.substring(0,pos4);
var pos7=addressDetails[0].search("Address: </b>");
var teil7 = addressDetails[0].substring(pos7+13,pos7+54);
var pos8 = teil7.search("<br>");
var teil7 = teil7.substring(0,pos8);

//alert(teil7);


		numberMarkerImg = {
         
    //url:teil1 ,
	url: 'ip.png' ,
            
            size: new google.maps.Size(62, 88),
            scaledSize: new google.maps.Size(32, 38)
            };

                var lat = new google.maps.LatLng(addressDetails[1], addressDetails[2]);
                marker = new google.maps.Marker({
                    map: map,
                    position: lat,
                    icon : numberMarkerImg,
                    content: teil3,
                     label: {
                    text:teil1,
                    fontWeight: 'bold',
                    fontSize: '14px',
                    fontFamily: '"Courier New", //Courier,Monospace',
                    color: 'black'
                            }          
                });
                markersArray.push(marker);
 google.maps.event.addListener( marker, 'click', function ()
{
closeInfos();
        var info = new google.maps.InfoWindow({content: this.content});
                    info.open(map,this);
                    window.open(this['content'],'_blank');
                    console.log(this);     
                    infos[0]=info;
                });     
               bounds.extend(lat);
}
            //Takes all the lat, longs in the bounds variable and autosizes the map
            map.fitBounds(bounds);
        var listener = google.maps.event.addListener(map, "idle", function() { 
  if (map.getZoom() > 12) map.setZoom(8); 
  google.maps.event.removeListener(listener); 
});       

            function closeInfos(){
               if(infos.length > 0){
                  infos[0].set("marker",null);
                  infos[0].close();
                  infos.length = 0;
               }
            }
    });
    </script>
    </head>
    <body>
    <div id='input'>
<?php
##################################################
$encodedString = "";
  $xdist=0;
$x = 0;  
$sql = "SELECT * FROM ipadr WHERE id > 0";
$result = mysqli_query($conn,$sql);
if (!$result) {
  die('Invalid query: ' . mysqli_error($conn));
}
      
      
	($row = @mysqli_fetch_assoc($result))
        {
	$ylat=floatval($row['lat']);
	$ylng=floatval($row['lng']);
	$mid=$row['id'];
	$mname=$row['name'];
	
            if ( $x == 0 )
            {
                 $separator = "";
            }
            else
            {
                 $separator = "****";
            }
            $encodedString = $encodedString.$separator.
            "<p class='content'><b>Lat:</b> ".$row['lat'].
            "<br><b>Long:</b>".$row['lng'].
            "<br><b>Name: </b>".$row['name'].
            "<br><b>Address: </b>".$row['strasse'].
            "<br><b>Division: </b>".$row['type'].
            "</p>&&&".$row['lat']."&&&".$row['lng'];
            #var_dump($encodedString);
            #var_dump($x);
            $x = $x + 1;
        }   
  
        <input type="hidden" id="encodedString" name="encodedString" value="<?php echo $encodedString; ?>" />
    </div>
    
    <div id="map"></div>
    </body>
</html>













