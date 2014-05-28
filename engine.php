<?php
/**
 * Meatmaps Beta Version
 *
 * @author		Jordan Wright 
 * @created		26th May 2014
 * @updated		28th May 2014 by http://github.com/jordanwright
 *
 */
 
 	/**
 	 * Include Configuration
 	 */
 	 include dirname( __FILE__ ) . "/core/config.meatmaps.php";
 	 
 	/**
 	 * Load Various Functions
 	 */
 	 include dirname( __FILE__ ) . "/core/functions.user.php";
 	 include dirname( __FILE__ ) . "/core/functions.site.php";
 	
 	/**
 	 * Hotfix: Allow users displaynames to contain UTF-8 Characters
 	 */
 	 header('Content-Type: text/html; charset=utf-8');
 	
 	/**
 	 * Begin!
 	 */
 	 session_start();
	 ob_start();
?>