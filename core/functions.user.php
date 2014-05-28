<?php
	/**
	 * Has user logged in? / Get this users id
	 */
	function getUserID() {
	 	$pQsessionGet="SELECT session_user FROM sessions WHERE session_id='".session_id()."'";
	 	$eQsessionGet=mysqli_query($GLOBALS['db'], $pQsessionGet);
	 	
		 	if($eQsessionGet->num_rows > 0) {
		 		$rQsessionGet=mysqli_fetch_assoc($eQsessionGet);
		 		$cQsessionGet=array_shift($rQsessionGet);
		 		return $cQsessionGet; 		
		 	} else {
		 		return false;
		 	}
	}
	
	/**
	 * Get this username for this user, unless user id is stated.
	 */
	function getUserFirstname($userID = 0 ) {
		if($userID == 0) {
			$userID = getUserID();
		}
		
		$pQnameGet="SELECT firstname FROM member WHERE mem_id='".$userID."'";
		$eQnameGet=mysqli_query($GLOBALS['db'], $pQnameGet);
		
		if($eQnameGet->num_rows > 0) {
			$rQnameGet=mysqli_fetch_assoc($eQnameGet);
			$cQnameGet=array_shift($rQnameGet);
			return $cQnameGet; 		
		} else {
			return false;
		}
	}
	
	/**
	 * Remove user session
	 */
	 function userLogout() {
	 	$pQsessionDestroy="DELETE FROM sessions WHERE session_id='".session_id()."'";
	 	$eQsessionDestroy=mysqli_query($GLOBALS['db'], $pQsessionDestroy);
	 	
	 	if($eQsessionDestroy) {	
	 		session_unset();
	 		session_destroy();
	 		return true;
	 	} else {
	 		// Something goes wrong... It shouldn't.
	 		echo 'still logged in';
	 		return false;
	 	} 
	 }

?>