<?php 
	##
	#	Please rename this file config.hybridauth.php after editing
	##
	
	/*!
	* HybridAuth
	* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
	* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
	*/
	
	// ----------------------------------------------------------------------------------------
	//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
	// ----------------------------------------------------------------------------------------
	
	/**
	 * Setup baseurl depending on environment.
	 */
	 if($_SERVER['SERVER_NAME']=="meatmaps") {
		 $baseURL="http://meatmaps:8888";
	 } elseif($_SERVER['SERVER_NAME']=="meatmaps.com") {
		 $baseURL="http://meatmaps.com";
	 } else {
		echo "Please re-configure /core/config.hybridauth.php for server name ". $_SERVER['SERVER_NAME'];
		exit;
	 }	
	
	return 
		array(
			"base_url" => $baseURL."/core/libs/hybridauth/", 
	
			"providers" => array ( 
				// openid providers
				"OpenID" => array (
					"enabled" => false
				),
	
				"AOL"  => array ( 
					"enabled" => false 
				),
	
				"Yahoo" => array ( 
					"enabled" => false,
					"keys"    => array ( "id" => "", "secret" => "" )
				),
	
				"Google" => array ( 
					"enabled" => false,
					"keys"    => array ( "id" => "", "secret" => "" )
				),
	
				"Facebook" => array ( 
					"enabled" => false,
					"keys"    => array ( "id" => "", "secret" => "" )
				),
	
				"Twitter" => array ( 
					"enabled" => true,
					"keys"    => array ( "key" => "abc", "secret" => "123" ) 
				),
	
				// windows live
				"Live" => array ( 
					"enabled" => false,
					"keys"    => array ( "id" => "", "secret" => "" ) 
				),
	
				"MySpace" => array ( 
					"enabled" => false,
					"keys"    => array ( "key" => "", "secret" => "" ) 
				),
	
				"LinkedIn" => array ( 
					"enabled" => false,
					"keys"    => array ( "key" => "", "secret" => "" ) 
				),
	
				"Foursquare" => array (
					"enabled" => false,
					"keys"    => array ( "id" => "", "secret" => "" ) 
				),
			),
	
			// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
			"debug_mode" => false,
	
			"debug_file" => ""
		);
 ?>