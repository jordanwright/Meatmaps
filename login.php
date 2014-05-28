<?php
	//Start session
	include 'engine.php';	
	siteArea('public');
	
	//if is logged in redirect
	if(getUserID()==true) {
		header("location: /settings.php");
		exit();
	}
?>
<div class="row">
          <div class="three fifths bounceInRight animated">
            <h1 class="zero museo-slab"><i class="icon-cog x4"></i> Login</h1>
            <p class="quicksand">Login with your Meatmaps account or signin with Twitter.</p>
          </div>
</div>
<div class="row padded one centered fourth small-tablet one-up-mobile" style="text-align: center;">
	<form name="loginform" action="login-go.php" method="post">
	<table width="309" border="0" align="center" cellpadding="2" cellspacing="5">
	  <tr>
	    <td colspan="2">
	    <h4>Login</h4>
			<!--the code bellow is used to display the message of the input validation-->
			 <?php
				if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
				echo '<ul class="err">';
				foreach($_SESSION['ERRMSG_ARR'] as $msg) {
					echo '<li>',$msg,'</li>'; 
					}
				echo '</ul>';
				unset($_SESSION['ERRMSG_ARR']);
				}
			?>
		</td>
	  </tr>
	  <tr>
	    <td width="116"><div align="right">Username</div></td>
	    <td width="177"><input name="username" type="text" /></td>
	  </tr>
	  <tr>
	    <td><div align="right">Password</div></td>
	    <td><input name="password" type="password" /></td>
	  </tr>
	  <tr>
	    <td colspan="2" style="text-align: center;"><input name="" type="submit" value="Login" /></td>
	  </tr>
	</table>
	</form>
	
	
	Or<br />
	<a href="twitter.php"><img src="/images/twitter.png" border="0" /></a>
</div>


        
<?php siteFooter(); ?>
