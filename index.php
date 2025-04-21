<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Hack Me</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<link href="css/all-pages.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>

<script type="text/javascript" language="javascript">
	function validateForm() {
		var formName = document.loginform;
		var username = formName.username.value;
		var password = formName.password.value;
		if(username == "") {
			$('#username_error').html("Please enter Username");
			return false;
		} else {
			$('#username_error').html("");
		}
		if(password == "") {
			$('#password_error').html("Please enter Password");
			return false;
		} else {
			$('#password_error').html("");
		}
		return true;
	}
</script>

</head>

<body>

 <?php 
	session_start();
	if(isset($_SESSION['role'])) {
		header('Location: home.php');
	}	
	$error = "";
	if(isset($_REQUEST['action']))
		if($_REQUEST['action'] == 'loginsubmit') {
			include_once "db/DbConnection.php";
			
			$query = "SELECT id, username, firstname, lastname, role, employee_code FROM ivax_users WHERE username = '".$_REQUEST['username']."' AND password = sha('".$_REQUEST['password']."')";	
			$result = mysqli_query($con,$query);
			$num_rows = $result->num_rows;
			//$num_rows = mysql_num_rows($result);		
			
			if($result->num_rows == 1) {			
				while($row = mysqli_fetch_object($result))
				{
					$_SESSION['username'] = $row->username;
					$_SESSION['firstname'] = $row->firstname;
					$_SESSION['lastname'] = $row->lastname;
					$_SESSION['role'] = $row->role;
					$_SESSION['id'] = $row->id;
					$_SESSION['employee_code'] = $row->employee_code;
				}
				header('Location: home.php');
			} else {
				$error = "Username & Password not matched. Please try again";
			}	
			
		}
?> 

<form name="loginform" id="loginform" action="" method="post" onSubmit="return validateForm();">
<div class="main-div">
  <div class="logo"><img src="img/sm.png" width="408" height="273"></div>
  <div class="login-main">
    <h2>Login</h2>
    <div class="input-div">
      <input type="text" placeholder="Username" name="username" id="username" size="40">
	  <div id="username_error"></div>
    </div>
    <div class="input-div">
      <input type="password" placeholder="Password" name="password" id="password" size="40">
	  <div id="password_error"><?php echo $error; ?></div>
    </div>
    <div>
    <table width="299" border="0">
  <tr>
    <td width="">&nbsp;</td>
	<input type="hidden" name="action" id="action" value="loginsubmit"/>
    <td width="10%"><input type="submit" class="btn btn-primary" value="LOGIN"/></td>
    
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
	if($_REQUEST['action'] == 'loginsubmit') { 
		include_once "db/DbConnectionClose.php";
	}
?>

</body>
</html>

