<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Hack Me</title>
<link href="css/all-pages.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>

<script type="text/javascript" language="javascript">
	function validateForm() {
		var formName = document.loginform;
		var org_password = formName.org_password.value;
		var new_password = formName.new_password.value;
		var confirm_password = formName.confirm_password.value;
		if(org_password == "") {
			$('#oldpwd_error').html("Please enter Old Password.");
			return false;
		} else {
			$('#oldpwd_error').html("");
		}
		if(new_password == "") {
			$('#newpwd_error').html("Please enter New Password.");
			return false;
		} else {
			$('#newpwd_error').html("");
		}
		if(confirm_password == "") {
			$('#cnfpwd_error').html("Please enter Confirm Password.");
			return false;
		} else {
			$('#cnfpwd_error').html("");
		}		
		if(new_password != confirm_password) {
			$('#cnfpwd_error').html("New & Confirm Passwords are not matched.");
			return false;
		}
		
		return true;
	}
</script>

</head>

<body>
<?php include('header.php'); ?>
<?php 
	
	if(!isset($_SESSION['role'])) {
		header('Location: index.php');
	}
	$error = "";
	if(isset($_REQUEST['action']))
		if($_REQUEST['action'] == 'pwdsubmit') {
			include_once "db/DbConnection.php";
			
			$query = "SELECT username, firstname, lastname, role FROM ivax_users WHERE password = sha('".$_REQUEST['org_password']."') AND id='".$_REQUEST['userid']."'";	
			$result = mysqli_query($con,$query);		
			$num_rows = mysqli_num_rows($result);		
			
			if($result->num_rows == 1) {	
				$query1 = "UPDATE ivax_users SET password = sha('".$_REQUEST['new_password']."') WHERE id='".$_REQUEST['userid']."'";
				$result = mysqli_query($con,$query1);
			
				echo '<script language="javascript">';
				echo 'alert("Password has been updated successfully")';
				echo '</script>';
			} else {
			echo '<script language="javascript">';
			echo 'alert("Old Password not matched. Please try again")';
			echo '</script>';
			}	
			
		}
?>

<form name="loginform" id="loginform" action="" method="post" onSubmit="return validateForm();">
<div class="main-div">
  <div class="logo"><img src="img/csw.png" width="408" height="273"></div>
  <div class="login-main">
    <h2>Change Password</h2>
    <div class="input-div">
      <input type="password" placeholder="Old Password" name="org_password" id="org_password" size="40">
	  <div id="oldpwd_error"></div>
    </div>
    <div class="input-div">
      <input type="password" placeholder="New Password" name="new_password" id="new_password" size="40">
	  <div id="newpwd_error"></div>
    </div>
	<div class="input-div">
      <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" size="40">
	  <div id="cnfpwd_error"><?php echo $error; ?></div>
    </div>
    <div>
    <table width="299" border="0">
  <tr>
    <td width="59%">&nbsp;</td>
	<input type="hidden" name="action" id="action" value="pwdsubmit"/>
	<input type="hidden" name="username" id="username" value="<?php echo $_SESSION['username']; ?>"/>
	<input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['id']; ?>"/>
    <td width="41%"><input type="submit" value="CHANGE PASSWORD"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="center"><strong><!--<a href="Creat-a-new-account.html">Creat a new account</a>--></strong></td>
  </tr>
    </table>
    </div>

  </div>
</div>
</form>

<?php
	if(isset($_REQUEST['action']))
		if($_REQUEST['action'] == 'loginsubmit') { 
			include_once "db/DbConnectionClose.php";
		}
?>

<footer>
<div class="footer-inner"><table width="100%" border="0" cellpadding="0" cellspacing="00">
  <tr>
    <td align="center">All Rights &reg; Reseved &copy; Copyright CSW</td>
    </tr>
</table>
</div>
</footer>

</body>
</html>
