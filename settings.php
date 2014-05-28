<?php
	require_once('engine.php');
	siteArea('internal');
	
	// Submitted?
	if(isset($_POST['constant'])) {
		// Length Check
		
		// Steralise
		$nameClean = addslashes(htmlentities($_POST['name']));
		$zipClean = addslashes(htmlentities($_POST['zip']));
		$longClean = addslashes(htmlentities($_POST['long']));
		$latClean = addslashes(htmlentities($_POST['lat']));
		$twitterClean = addslashes(htmlentities($_POST['twitter']));
		
		// Grab Co-Ords
		if($_POST['zip']!==""){
			$coordinates = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($zipClean) . '&sensor=true');
			$coordinates = json_decode($coordinates);
		
			$latClean = $coordinates->results[0]->geometry->location->lat;
			$longClean = $coordinates->results[0]->geometry->location->lng;
		} 
		
	
		mysqli_query($GLOBALS['db'], "UPDATE member SET `firstname` = '".$nameClean."', `zip` = '".$zipClean."', `long` = '".$longClean."', `lat` = '".$latClean."', `twitter` = '".$twitterClean."'  WHERE `mem_id` = '".getUserID()."'") or die(mysqli_error($GLOBALS['db']));
	  echo "Do Submit";
	}
	
	
	// Get Initial Values
	$pQsettingsGet="SELECT * FROM member WHERE mem_id='".getUserID()."'";
	$eQsettingsGet=mysqli_query($GLOBALS['db'], $pQsettingsGet);
	
	if($eQsettingsGet->num_rows > 0) {
		$rQsettingsGet=mysqli_fetch_assoc($eQsettingsGet);
		//$cQsettingsGet=array_shift($rQsettingsGet);
	} else {
		// There has been an error
	}
?>
<div class="row">
          <div class="three fifths bounceInRight animated">
            <h1 class="zero museo-slab"><i class="icon-cog x4"></i> Settings</h1>
            <p class="quicksand">Configure your personal and public settings.</p>
          </div>
</div>

<form action="#" method="post">
  <fieldset class="five one-up-mobile elevenths padded">
    <legend>Public Settings</legend>
    <div class="row">
     <div class="two fifths padded">
       <label for="zip">Your Location</label>
       <input id="zip" name="zip" type="text" placeholder="Zip Code" value="<? echo $rQsettingsGet['zip']; ?>">
     </div>
     <div class="one fifth padded">
     
     </div>
     <div class="two fifths padded">
       <label for="name">About You</label>
       <input id="name" name="name" type="text" placeholder="Meatspace Name" value="<? echo $rQsettingsGet['firstname']; ?>">
     </div>
     
    </div>  
    <div class="row">
      <div class="two fifths padded">
        <div class="row">
          <input id="long" name="long" type="text" placeholder="Longitude" value="<? echo $rQsettingsGet['long']; ?>">
        </div>
      </div>
      <div class="one fifth padded">
      
      </div>
      <div class="two fifths padded">
        <div class="one mobile tenth"><span class="prefix">@</span></div>
        <div class="nine mobile tenth">
          <input id="twitter" type="text" name="twitter" placeholder="twitter handle" value="<? echo $rQsettingsGet['twitter']; ?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="two fifths padded">
        <input id="lat" name="lat" type="text" placeholder="Latitude" value="<? echo $rQsettingsGet['lat']; ?>">
      </div>
      <div class="one fifth padded">
      </div>
      <div class="two fifths padded">
             <input type="hidden" name="constant" value="ready">
             <input class="one whole" type="submit" value="Save!" />
       
      </div>
    </div>
    <div class="row">
    	<br />
    	<p class="pink box">To use a manual long/lat please leave the Zip Code field empty. Otherwise, an approx location will be generated for you. <br />UK users may enter the first half of their Postal Code only if they wish.</p>
    </div>

  </fieldset>
  <br />
  <div class="one mobile eleventh"></div>
  <fieldset class="five mobile elevenths padded" style="display: none;">
	<legend>Personal Settings</legend>
  </fieldset>
</form>


        
<?php siteFooter(); ?>