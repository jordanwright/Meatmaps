<?php 
	/**
	* Header and Footer
	*/
	
	function siteHeader() {
		if(SITE_AREA=="internal") {
			include dirname(__FILE__)."/../tpls/internal_header.php";
		} 
		if(SITE_AREA=="public") {
			include dirname(__FILE__)."/../tpls/external_header.php";
		}
		if(SITE_AREA=="map") {
			//nothing special
		}
	}
	
	function siteFooter() {
		include dirname(__FILE__)."/../tpls/internal_footer.php";
	}
	
	
	/**
	* Reject non-logged in users
	*/
	function siteArea($areaCode) {	
		define('SITE_AREA', $areaCode);
			if(getUserID()==false && SITE_AREA=="internal") {
			//	header("location: index.php");
				echo "reject for ". getUserID(). " in area ". SITE_AREA;
				exit();
			}
		
		// Call header to save repetition
		siteHeader();
		return SITE_AREA;
	}	

 ?>