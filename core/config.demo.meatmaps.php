<?php 
	##
	#	Please rename this file config.meatmaps.php after editing
	##
	
	/**
	 * Setup configureables depending on environment.
	 */
	 if($_SERVER['SERVER_NAME']=="meatmaps") {
		 $mysql_hostname = "localhost";
		 $mysql_user	 = "";
		 $mysql_password = "";
		 $mysql_database = "meatmaps";
	 } elseif($_SERVER['SERVER_NAME']=="meatmaps.com") {
		 $mysql_hostname = "localhost";
		 $mysql_user	 = "";
		 $mysql_password = "";
		 $mysql_database = "meatmaps";
	 } else {
		echo "Please re-configure /core/config.com.php for server name ". $_SERVER['SERVER_NAME'];
		exit;
	 }	
	
	/**
	 * Connect to database. Use MySQLi!
	 */
	 $GLOBALS['db'] = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
	 mysqli_select_db($GLOBALS['db'], $mysql_database) or die("Could not select database");
 
 
  	/**
  	 * Configure the session
  	 * >> hybridAuth must use default php session name.
  	 */
     //define( "SESSION_NAME", "session_id" );
  	 //ini_set('session.name', SESSION_NAME );	 
 ?>