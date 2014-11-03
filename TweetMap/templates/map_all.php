<html>
    <head>
    <script type='text/javascript' src='jquery-1.11.1.min.js'></script>
    <script type='text/javascript' src='jquery-ui-1.11.1.custom.min.js'></script>
    <style>
 
        BODY {font-family : Verdana,Arial,Helvetica,sans-serif; color: #000000; font-size : 13px ; }
 
        #map_canvas { width:100%; height: 100%; z-index: 0; }
    </style>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false" /></script>
	<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markermanager/src/markermanager.js"></script>
	
    <script type='text/javascript'>
 
    //This javascript will load when the page loads.
    jQuery(document).ready( function($){
 
            //Initialize the Google Maps
            var geocoder;
            var map;
            var markersArray = [];
            var infos = [];
			var class1_size = 25;
			var class2_size= 25;
			var class3_size= 25;
			var class4_size= 25;
 
            geocoder = new google.maps.Geocoder();
            var myOptions = {
                  zoom: 9,
                  mapTypeId: google.maps.MapTypeId.ROADMAP
                }
            //Load the Map into the map_canvas div
            var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			var listener = google.maps.event.addListener(map, 'bounds_changed', function(){
				setupMarkers();
				google.maps.event.removeListener(listener);
			});
			//var mc = new MarkerClusterer(map);
			
 
            //Initialize a variable that the auto-size the map to whatever you are plotting
            var bounds = new google.maps.LatLngBounds();
            //Initialize the encoded string       
            var encodedStringLean;
            //Initialize the array that will hold the contents of the split string
            var stringArray = [];
            //Get the value of the encoded string from the hidden input
            encodedStringLean = document.getElementById("encodedStringLean").value;
            //Split the encoded string into an array the separates each location
            stringArray = encodedStringLean.split("****");
 
            var x;
            for (x = 0; x < stringArray.length; x = x + 1)
            {
                var addressDetails = [];
                var marker;
                //Separate each field
                addressDetails = stringArray[x].split("&&&");
                //Load the lat, long data
                var lat = new google.maps.LatLng(addressDetails[1], addressDetails[2]);
				var circle_icon_blue = {url: 'circle-icon-blue.png',scaledSize: new google.maps.Size(class1_size/addressDetails[3], class1_size/addressDetails[3])};
				var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
                //Create a new marker and info window
                marker = new google.maps.Marker({
                    map: map,
                    position: lat,
					icon: circle_icon_blue,
                    //Content is what will show up in the info window
                    content: addressDetails[0]
                });
                //Pushing the markers into an array so that it's easier to manage them
                markersArray.push(marker);
				//var markerCluster = new MarkerClusterer(map, markersArray);
                google.maps.event.addListener( marker, 'click', function () {
                    closeInfos();
                    var info = new google.maps.InfoWindow({content: this.content});
                    //On click the map will load the info window
                    info.open(map,this);
                    infos[0]=info;
                });
               //Extends the boundaries of the map to include this new location
               bounds.extend(lat);
            }
            //Takes all the lat, longs in the bounds variable and autosizes the map
            map.fitBounds(bounds);
			var encodedStringNonLean;
            //Initialize the array that will hold the contents of the split string
            var stringArrayNonLean = [];
            //Get the value of the encoded string from the hidden input
            encodedStringNonLean = document.getElementById("encodedStringNonLean").value;
            //Split the encoded string into an array the separates each location
            stringArrayNonLean = encodedStringNonLean.split("****");
			
            var y;
            for (y = 0; y < (stringArrayNonLean.length); y = y + 1)
            {
                //alert(stringArrayNonLean[y]);
				var addressDetailsNonLean = [];
                var marker;
                //Separate each field
                addressDetailsNonLean = stringArrayNonLean[y].split("&&&");
                //Load the lat, long data
                var lat = new google.maps.LatLng(addressDetailsNonLean[1], addressDetailsNonLean[2]);
				var circle_icon_red = {url: 'circle-icon-red.png',scaledSize: new google.maps.Size(class1_size/addressDetails[3], class1_size/addressDetails[3])};
                //Create a new marker and info window
                marker = new google.maps.Marker({
                    map: map,
                    position: lat,
					icon: circle_icon_red,
                    //Content is what will show up in the info window
                    content: addressDetailsNonLean[0]
                });
                //Pushing the markers into an array so that it's easier to manage them
                markersArray.push(marker);
				//var markerCluster = new MarkerClusterer(map, markersArray);
                google.maps.event.addListener( marker, 'click', function () {
                    closeInfos();
                    var info = new google.maps.InfoWindow({content: this.content});
                    //On click the map will load the info window
                    info.open(map,this);
                    infos[0]=info;
                });
               //Extends the boundaries of the map to include this new location
               bounds.extend(lat);
            }
            //Takes all the lat, longs in the bounds variable and autosizes the map
            map.fitBounds(bounds);
//FACs
           var encodedStringFAC;
            //Initialize the array that will hold the contents of the split string
            var stringArrayFAC = [];
            //Get the value of the encoded string from the hidden input
            encodedStringFAC = document.getElementById("encodedStringFAC").value;
            //Split the encoded string into an array the separates each location
            stringArrayFAC = encodedStringFAC.split("****"); 
            var z;
            for (z = 0; z < stringArrayFAC.length; z = z + 1)
            {
                var addressDetailsFAC = [];
                var marker;
                //Separate each field
                addressDetailsFAC = stringArrayFAC[z].split("&&&");
                //Load the lat, long data
                var lat = new google.maps.LatLng(addressDetailsFAC[1], addressDetailsFAC[2]);
				var square_icon_blue = {url: 'square-icon-blue.png',scaledSize: new google.maps.Size(class1_size/addressDetails[3], class1_size/addressDetails[3])};
                //Create a new marker and info window
                marker = new google.maps.Marker({
                    map: map,
                    position: lat,
					icon: square_icon_blue,
                    //Content is what will show up in the info window
                    content: addressDetailsFAC[0]
                });
                //Pushing the markers into an array so that it's easier to manage them
                markersArray.push(marker);
				//var markerCluster = new MarkerClusterer(map, markersArray);
                google.maps.event.addListener( marker, 'click', function () {
                    closeInfos();
                    var info = new google.maps.InfoWindow({content: this.content});
                    //On click the map will load the info window
                    info.open(map,this);
                    infos[0]=info;
                });
               //Extends the boundaries of the map to include this new location
               bounds.extend(lat);
            }
            //Takes all the lat, longs in the bounds variable and autosizes the map
            map.fitBounds(bounds);
			var encodedStringNonFAC;
            //Initialize the array that will hold the contents of the split string
            var stringArrayNonFAC = [];
            //Get the value of the encoded string from the hidden input
            encodedStringNonFAC = document.getElementById("encodedStringNonFAC").value;
            //Split the encoded string into an array the separates each location
            stringArrayNonFAC = encodedStringNonFAC.split("****");
			
            var w;
            for (w = 0; w < (stringArrayNonFAC.length); w = w + 1)
            {
                var addressDetailsNonFAC = [];
                var marker;
                //Separate each field
                addressDetailsNonFAC = stringArrayNonFAC[w].split("&&&");
                //Load the lat, long data
                var lat = new google.maps.LatLng(addressDetailsNonFAC[1], addressDetailsNonFAC[2]);
				var square_icon_red = {url: 'square-icon-red.png',scaledSize: new google.maps.Size(class1_size/addressDetails[3], class1_size/addressDetails[3])};
                //Create a new marker and info window
                marker = new google.maps.Marker({
                    map: map,
                    position: lat,
					icon: square_icon_red,
                    //Content is what will show up in the info window
                    content: addressDetailsNonFAC[0]
                });
                //Pushing the markers into an array so that it's easier to manage them
                markersArray.push(marker);
				//var markerCluster = new MarkerClusterer(map, markersArray);
                google.maps.event.addListener( marker, 'click', function () {
                    closeInfos();
                    var info = new google.maps.InfoWindow({content: this.content});
                    //On click the map will load the info window
                    info.open(map,this);
                    infos[0]=info;
                });
               //Extends the boundaries of the map to include this new location
               bounds.extend(lat);
            }
            //Takes all the lat, longs in the bounds variable and autosizes the map
            map.fitBounds(bounds);

//FACs ends here	
/*	
			var encodedStringClasses;
            //Initialize the array that will hold the contents of the split string
            var stringArrayClasses = [];
            //Get the value of the encoded string from the hidden input
            encodedStringClasses = document.getElementById("encodedStringClasses").value;
            //Split the encoded string into an array the separates each location
			var lineSymbol = {
				path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW
			};
            stringArrayClasses = encodedStringClasses.split("****");
			var p;
            for (p = 0; p < stringArrayClasses.length; p = p + 1)
            {
            var addressDetailsClasses = [];
				addressDetailsClasses = stringArrayClasses[p].split("&&&");
                var pathCoordinates = [
				new google.maps.LatLng(addressDetailsClasses[1], addressDetailsClasses[2]),
				new google.maps.LatLng(addressDetailsClasses[3], addressDetailsClasses[4])
				];
			var pathFAC = new google.maps.Polyline({
			icons: [{
			icon: lineSymbol,
			offset: '50%'
			}],
			path: pathCoordinates,
			geodesic: true,
			strokeColor: '#ff000f',
			strokeOpacity: 1.0,
			strokeWeight: 2
			});
			//alert(addressDetailsClasses[2]);
			pathFAC.setMap(map);
            }
            //Takes all the lat, longs in the bounds variable and autosizes the map
            map.fitBounds(bounds);
			*/
			
			function setupMarkers() {
				mgr = new MarkerManager(map);

				google.maps.event.addListener(mgr, 'loaded', function(){
				mgr.addMarkers(markersArray);
				mgr.refresh();
				});
			}
 
    });
    </script>
 
    </head>
    <body>
    <div id='input'>
 
        <?php
 
        //Connect to the MySQL database that is holding your data, replace the x's with your data
        mysql_connect("localhost", "root", "") or
         die("Could not connect: " . mysql_error());
        mysql_select_db("Geocode");
 
        //Initialize your first couple variables
        $encodedStringFAC = ""; //This is the string that will hold all your location data
        $x = 0; //This is a trigger to keep the string tidy
		$encodedStringNonFAC = ""; //This is the string that will hold all your location data
        $y = 0; //This is a trigger to keep the string tidy
		$encodedStringLean = ""; //This is the string that will hold all your location data
        $z = 0; //This is a trigger to keep the string tidy
		$encodedStringNonLean = ""; //This is the string that will hold all your location data
        $w = 0; //This is a trigger to keep the string tidy
		
		
		$encodedStringClasses = "";
		$p = 0;
		
 
        //Now we do a simple query to the database
		$date = $_GET['date'];
		if (isset ($_GET['date'])){
		$locationsFAC="SELECT * FROM `cwf_locations` join `sic` on cwf_locations.sic = sic.sic where cwf_locations.sic in (select launchdates.sic from launchdates where date(launchdates.launchdates) <= '$date') and cwf_locations.sic in (select otb_fac_lanes_20140603.move_leg_dest_node_nm from otb_fac_lanes_20140603)";
		$locationsNonFAC="SELECT * FROM `cwf_locations` join `sic` on cwf_locations.sic = sic.sic where cwf_locations.sic in (select launchdates.sic from launchdates where date(launchdates.launchdates) <= '$date') and cwf_locations.sic not in (select otb_fac_lanes_20140603.move_leg_dest_node_nm from otb_fac_lanes_20140603)";
		$locationsLean="SELECT * FROM `cwf_locations` join `sic` on cwf_locations.sic = sic.sic where cwf_locations.sic in (select launchdates.sic from launchdates where date(launchdates.launchdates) <= '$date') and cwf_locations.sic in (select 2012_eng_survey_adj.sic from 2012_eng_survey_adj where 2012_eng_survey_adj.lean_ = 'Yes')";
		$locationsNonLean="SELECT * FROM `cwf_locations` join `sic` on cwf_locations.sic = sic.sic where cwf_locations.sic in (select launchdates.sic from launchdates where date(launchdates.launchdates) <= '$date') and cwf_locations.sic in (select 2012_eng_survey_adj.sic from 2012_eng_survey_adj where 2012_eng_survey_adj.lean_ = 'No')";
        
		//$query = "SELECT sc_lat, sc_long, dest_lat, dest_long FROM `otb_fac_lanes_20140603` where sc_lat <>'' and sc_long <> '' and dest_lat <> '' and dest_long <> '' and otb_fac_lanes_20140603.move_leg_orig_node_nm in (select launchdates.sic from launchdates where date(launchdates.launchdates) <= '$date') and otb_fac_lanes_20140603.move_leg_dest_node_nm in (select launchdates.sic from launchdates where date(launchdates.launchdates) <= '$date')";
		//echo $query;
		}
		//}
		else {
		$locationsFAC="SELECT * FROM `cwf_locations` join `sic` on cwf_locations.sic = sic.sic where cwf_locations.sic in (select otb_fac_lanes_20140603.move_leg_dest_node_nm from otb_fac_lanes_20140603)";
		//echo $locationsFAC;
        $locationsNonFAC="SELECT * FROM `cwf_locations` join `sic` on cwf_locations.sic = sic.sic where cwf_locations.sic not in (select otb_fac_lanes_20140603.move_leg_dest_node_nm from otb_fac_lanes_20140603)";
		$locationsLean="SELECT * FROM `cwf_locations` join `sic` on cwf_locations.sic = sic.sic where cwf_locations.sic in (select 2012_eng_survey_adj.sic from 2012_eng_survey_adj where 2012_eng_survey_adj.lean_ = 'Yes')";
		$locationsNonLean="SELECT * FROM `cwf_locations` join `sic` on cwf_locations.sic = sic.sic where cwf_locations.sic not in (select 2012_eng_survey_adj.sic from 2012_eng_survey_adj where 2012_eng_survey_adj.lean_ = 'Yes')";
		//echo $locationsNonLean;
		//$query = "SELECT sc_lat, sc_long, dest_lat, dest_long FROM `otb_fac_lanes_20140603` where sc_lat <>'' and sc_long <> '' and dest_lat <> '' and dest_long <> ''";
		}
		$resultFAC = mysql_query($locationsFAC);
		$resultNonFAC = mysql_query($locationsNonFAC);
		$resultLean = mysql_query($locationsLean);
		$resultNonLean = mysql_query($locationsNonLean);
		//$resultClasses = mysql_query($query);
 
        //Multiple rows are returned
		while ($row = mysql_fetch_array($resultFAC, MYSQL_NUM))
        {
            //This is to keep an empty first or last line from forming, when the string is split
            if ( $x == 0 )
            {
                 $separator = "";
            }
            else
            {
                 //Each row in the database is separated in the string by four *'s
                 $separator = "****";
			//	 echo $separator;
				 //echo 'test';
            }
            //Saving to the String, each variable is separated by three &'s
            $encodedStringFAC = $encodedStringFAC.$separator.
            "<p class='content'><b>Lat:</b> ".$row[9].
            "<br><b>Long:</b> ".$row[10].
            "<br><b>Name: </b>".$row[3].
            "<br><b>Address: </b>".$row[5].','.$row[6].','.$row[7].','.$row[8].
            "</p>&&&".$row[9]."&&&".$row[10]."&&&".$row[12];
            //echo $encodedStringFAC;
			$x = $x + 1;
			
        }
        while ($row = mysql_fetch_array($resultNonFAC, MYSQL_NUM))
        {
            //This is to keep an empty first or last line from forming, when the string is split
            if ( $y == 0 )
            {
                 $separator = "";
            }
            else
            {
                 //Each row in the database is separated in the string by four *'s
                 $separator = "****";
			//	 echo $separator;
				 //echo 'test';
            }
            //Saving to the String, each variable is separated by three &'s
            $encodedStringNonFAC = $encodedStringNonFAC.$separator.
            "<p class='content'><b>Lat:</b> ".$row[9].
            "<br><b>Long:</b> ".$row[10].
            "<br><b>Name: </b>".$row[3].
            "<br><b>Address: </b>".$row[5].','.$row[6].','.$row[7].','.$row[8].
            "</p>&&&".$row[9]."&&&".$row[10]."&&&".$row[12];
            //echo $encodedStringFAC;
			$y = $y + 1;
			
        }
        while ($row = mysql_fetch_array($resultLean, MYSQL_NUM))
        {
            //This is to keep an empty first or last line from forming, when the string is split
            if ( $z == 0 )
            {
                 $separator = "";
            }
            else
            {
                 //Each row in the database is separated in the string by four *'s
                 $separator = "****";
			//	 echo $separator;
				 //echo 'test';
            }
            //Saving to the String, each variable is separated by three &'s
            $encodedStringLean = $encodedStringLean.$separator.
            "<p class='content'><b>Lat:</b> ".$row[9].
            "<br><b>Long:</b> ".$row[10].
            "<br><b>Name: </b>".$row[3].
            "<br><b>Address: </b>".$row[5].','.$row[6].','.$row[7].','.$row[8].
            "</p>&&&".$row[9]."&&&".$row[10]."&&&".$row[12];
            //echo $encodedStringFAC;
			$z = $z + 1;
			
        }
        while ($row = mysql_fetch_array($resultNonLean, MYSQL_NUM))
        {
            //This is to keep an empty first or last line from forming, when the string is split
            if ( $w == 0 )
            {
                 $separator = "";
            }
            else
            {
                 //Each row in the database is separated in the string by four *'s
                 $separator = "****";
			//	 echo $separator;
				 //echo 'test';
            }
            //Saving to the String, each variable is separated by three &'s
            $encodedStringNonLean = $encodedStringNonLean.$separator.
            "<p class='content'><b>Lat:</b> ".$row[9].
            "<br><b>Long:</b> ".$row[10].
            "<br><b>Name: </b>".$row[3].
            "<br><b>Address: </b>".$row[5].','.$row[6].','.$row[7].','.$row[8].
            "</p>&&&".$row[9]."&&&".$row[10]."&&&".$row[12];
            //echo $encodedStringFAC;
			$w = $w + 1;
			
        }
		while ($row = mysql_fetch_array($resultNoLean, MYSQL_NUM))
        {
            //This is to keep an empty first or last line from forming, when the string is split
            if ( $q == 0 )
            {
                 $separator = "";
            }
            else
            {
                 //Each row in the database is separated in the string by four *'s
                 $separator = "****";
			//	 echo $separator;
				 //echo 'test';
            }
            //Saving to the String, each variable is separated by three &'s
            $encodedStringNoLean = $encodedStringNoLean.$separator.
            "<p class='content'><b>Lat:</b> ".$row[9].
            "<br><b>Long:</b> ".$row[10].
            "<br><b>Name: </b>".$row[3].
            "<br><b>Address: </b>".$row[5].','.$row[6].','.$row[7].','.$row[8].
            "</p>&&&".$row[9]."&&&".$row[10]."&&&".$row[12];
            //echo $encodedStringFAC;
			$q = $q + 1;
			
        }
/*		
        while ($row = mysql_fetch_array($resultClasses, MYSQL_NUM))
        {
            //This is to keep an empty first or last line from forming, when the string is split
            if ( $p == 0 )
            {
                 $separator = "";
            }
            else
            {
                 //Each row in the database is separated in the string by four *'s
                 $separator = "****";
				// echo $separator;
				 //echo 'test';
            }
            //Saving to the String, each variable is separated by three &'s
            $encodedStringClasses = $encodedStringClasses.$separator."&&&".$row[0]."&&&".$row[1]."&&&".$row[2]."&&&".$row[3];
            //echo $encodedStringFAC;
			$p = $p + 1;
			
        }    */    

        ?>
<?php //echo $encodedStringNonLean; ?> 
		<form method="GET" action="">
		Enter Date:<input type="text" name="date" value="YYYY-MM-DD"/><input type="submit" value="Submit"></form>
        <input type="hidden" id="encodedStringFAC" name="encodedStringFAC" value="<?php echo $encodedStringFAC; ?>" />
		<input type="hidden" id="encodedStringNonFAC" name="encodedStringNonFAC" value="<?php echo $encodedStringNonFAC; ?>" />
		<input type="hidden" id="encodedStringLean" name="encodedStringLean" value="<?php echo $encodedStringLean; ?>" />
		<input type="hidden" id="encodedStringNonLean" name="encodedStringNonLean" value="<?php echo $encodedStringNonLean; ?>" />
		<input type="hidden" id="encodedStringClasses" name="encodedStringClasses" value="<?php //echo $encodedStringClasses; ?>" />
    </div>
    <div id="map_canvas"></div>
    </body>
</html>