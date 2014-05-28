<?php
	//Include database connection details
	require_once('engine.php');
	siteArea('public');
	
	if($_POST['username']=="" || $_POST['password']=="") {
		// Fill Fields
		$errmsg_arr[] = 'Please fill both fields';
		$errflag = true;
		if($errflag) {
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			session_write_close();
			header("location: signup.php");
			exit();
		}
	}
	
	$nameClean = addslashes(htmlentities($_POST['username']));
	$passClean = addslashes(htmlentities($_POST['password']));
	
	$nameReady = $nameClean;
	$passReady = password_hash($passClean, PASSWORD_BCRYPT, ["cost" => 11]);
	
	
	$pQusernameCheck="SELECT * FROM member WHERE username='".$nameClean."'";
	$eQusernameCheck=mysqli_query($GLOBALS['db'], $pQusernameCheck);
	
	if($eQusernameCheck) {
		if(mysqli_num_rows($eQusernameCheck) == 0) {
			$pQnewMember="INSERT INTO member (`username`, `password`) VALUES ('".$nameReady."', '".$passReady."')";
			$eQnewMember=mysqli_query($GLOBALS['db'], $pQnewMember) or die(mysql_error($GLOBALS['db']));
			
			if($eQnewMember) {
				$pQusernameCheck2="SELECT mem_id FROM member WHERE username='".$nameClean."'";
				$eQusernameCheck2=mysqli_query($GLOBALS['db'], $pQusernameCheck2);
				
				$rQusernameCheck2=mysqli_fetch_assoc($eQusernameCheck2);
				$cQusernameCheck2=array_shift($rQusernameCheck2);
			
				$pQnewSession="INSERT INTO sessions (`session_id`, `session_user`) VALUES ('".session_id()."', '".$cQusernameCheck2."')";
				$eQnewSession=mysqli_query($GLOBALS['db'], $pQnewSession);
				header("location: settings.php");
			}
		} else {
			// Name taken
			$errmsg_arr[] = 'Username has been taken';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: signup.php");
				exit();
			}
		}
	} else {
		echo "Something went wrong. Please contact @JordanLeft via twitter.";
	}
		
	
?>