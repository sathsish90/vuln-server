<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Hack Me</title>
<link href="css/all-pages.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>

<script type="text/javascript" language="javascript">
	function validateForm() {
		var formName = document.userform;
		var emp_code = formName.emp_code.value;
		var firstname = formName.firstname.value;
		var lastname = formName.lastname.value;
		var username = formName.username.value;
		var password = formName.password.value;
		
		if(emp_code == "") {
			$('#empcode_error').html("Please enter Employee Code.");
			return false;
		} else {
			$('#empcode_error').html("");
		}
		
		if(firstname == "") {
			$('#fn_error').html("Please enter Firstname.");
			return false;
		} else {
			firstname.replace('script','');
			$('#fn_error').html("");
		}
		
		if(lastname == "") {
			$('#ln_error').html("Please enter Lastname.");
			return false;
		} else {
			$('#ln_error').html("");
		}
		
		if(username == "") {
			$('#un_error').html("Please enter Username.");
			return false;
		} else {
			$('#un_error').html("");
		}
		
		if(password == "") {
			$('#pwd_error').html("Please enter Password.");
			return false;
		} else {
			$('#pwd_error').html("");
		}
		
		return true;
	}
</script>
</head>
<body>
<?php include('header.php'); ?>
<div class="clear"></div>

<?php 
	
	if(!isset($_SESSION['role'])) {
		header('Location: index.php');
	}
	$error = "";
	if(isset($_REQUEST['action']))
		if($_REQUEST['action'] == 'usersubmit') {
			include_once "db/DbConnection.php";
			
			$emp_code = $_REQUEST['emp_code'];
			$firstname = $_REQUEST['firstname'];
			$lastname = $_REQUEST['lastname'];
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
			$role = "user";
			
			$query = "SELECT username FROM ivax_users WHERE employee_code 	 = '".$emp_code."' OR username='".$username."'";	
			$result = mysqli_query($con,$query);		
			$num_rows = mysqli_num_rows($result);
			
			if($result->num_rows == 0) {				
				$sql="INSERT INTO ivax_users (firstname, lastname, role, username, password, employee_code, created_date) VALUES ('".$firstname."','".$lastname."','".$role."','".$username."',sha('".$password."'), '".$emp_code."', '".date('Y-m-d H:i:s')."')";
				if (!mysqli_query($con,$sql)) {
					$error = mysqli_error($con);
				} else {
					echo '<script language="javascript">';
					echo 'alert("User Successfully Added")';
					echo '</script>';
					exit;
				}
				
			} else {
				$error = "Duplicate Employee code / Username. Please try again";
			}	
			
		}
?>

<form name="userform" id="userform" action="" method="post" onSubmit="return validateForm();">
<div class="main-div">
  <div class="logo"><img src="img/csw.png" width="408" height="273"></div>
  <div class="login-main">
    <h2>User Details</h2>
    <div class="input-div">
      <input type="text" placeholder="Employee Code" name="emp_code" id="emp_code" size="40" value="<?php if(isset($_REQUEST['emp_code'])){echo $_REQUEST['emp_code'];} ?>">
	  <div id="empcode_error"></div>
    </div>
    <div class="input-div">
      <input type="text" placeholder="Firstname" name="firstname" id="firstname" size="40" value="<?php if(isset($_REQUEST['firstname'])){echo $_REQUEST['firstname'];} ?>">
	  <div id="fn_error"></div>
    </div>
	<div class="input-div">
      <input type="text" placeholder="Lastname" name="lastname" id="lastname" size="40" value="<?php if(isset($_REQUEST['lastname'])){echo $_REQUEST['lastname'];} ?>">
	  <div id="ln_error"></div>
    </div>
	<div class="input-div">
      <input type="text" placeholder="Username" name="username" id="username" size="40" value="<?php if(isset($_REQUEST['username'])){echo $_REQUEST['username'];} ?>">
	  <div id="un_error"></div>
    </div>
	<div class="input-div">
      <input type="text" placeholder="Password" name="password" id="password" size="40" value="<?php if(isset($_REQUEST['password'])){echo $_REQUEST['password'];} ?>">
	  <div id="pwd_error"><?php echo $error; ?></div>
    </div>
    <div>
    <table width="299" border="0">
  <tr>
    <td width="59%">&nbsp;</td>
	<input type="hidden" name="action" id="action" value="usersubmit"/>
    <td width="41%"><input type="submit" value="SAVE DETAILS"/></td>
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

