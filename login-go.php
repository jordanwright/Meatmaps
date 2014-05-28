<?php
	//Include database connection details
	require_once('engine.php');
	siteArea('public');
 
	//Array to store validation errors
	$errmsg_arr = array();
 
	//Validation error flag
	$errflag = false;
 
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($GLOBALS['db'], $str);
	}
 
	//Sanitize the POST values
	$username = clean($_POST['username']);
	$password = clean($_POST['password']);
 
	//Input Validations
	if($username == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
 
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: login.php");
		exit();
	}
 
	//Create query
	$qry="SELECT * FROM member WHERE username='$username'";
	$result=mysqli_query($GLOBALS['db'], $qry);
 
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Fetch User Deets
			$member = mysqli_fetch_assoc($result);
			if(password_verify($password, $member['password'])) {				
				$pQnewSession="INSERT INTO sessions (`session_id`, `session_user`) VALUES ('".session_id()."', '".$member['mem_id']."')";
				$eQnewSession=mysqli_query($GLOBALS['db'], $pQnewSession);
				if(eQnewSession) {
					header("location: settings.php");
				}
				exit();
			} else {
				//Pass Wrong
				$errmsg_arr[] = 'Username or Password are incorrect';
				$errflag = true;
				if($errflag) {
					$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
					session_write_close();
					header("location: login.php");
					exit();
				}
			}
			
		}else {
			//Username not found
			$errmsg_arr[] = 'Username or Password are incorrect';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: login.php");
				exit();
			}
		}
	}else {
		die("Query failed");
	}
	
?>