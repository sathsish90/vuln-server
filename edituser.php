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
	
	$emp_code = "";
	$firstname = "";
	$lastname = "";
	$username = "";
	$password = "";
	$role = "";
	$id = "";
	
	if(isset($_REQUEST['action']) or isset($_REQUEST['id']))
		if(isset($_REQUEST['action']) and $_REQUEST['action'] == 'usersubmit') {
			include_once "db/DbConnection.php";
			
			$emp_code = $_REQUEST['emp_code'];
			$firstname = $_REQUEST['firstname'];
			$lastname = $_REQUEST['lastname'];
			$username = $_REQUEST['username'];
			$password = isset($_REQUEST['password']);
			$role = isset($_REQUEST['role']);
			$id = $_REQUEST['userid'];
						
			$sql="UPDATE ivax_users SET firstname = '".$firstname."', lastname = '".$lastname."', role = '".$role."' WHERE id = ".$id;
			if (!mysqli_query($con,$sql)) {
				$error = mysqli_error($con);
			} else {
				$error = "User details updated successfully";
			}		
		} else {
			include_once "db/DbConnection.php";
			
			$query = "SELECT * FROM ivax_users WHERE id = ".$_REQUEST['id'];	
			$result = mysqli_query($con,$query);		
			while($row = mysqli_fetch_object($result))
			{
				$emp_code = $row->employee_code;
				$firstname = $row->firstname;
				$lastname = $row->lastname;
				$username = $row->username;
				$role = $row->role;
				$id = $row->id;
			}
		}
?>

<form name="userform" id="userform" action="" method="post" onSubmit="return validateForm();">
<div class="main-div">
  <div class="logo"><img src="img/csw.png" width="408" height="273"></div>
  <div class="login-main">
    <h2>User Details</h2>
    <div class="input-div">
      <input type="text" placeholder="Employee Code" name="emp_code" id="emp_code" size="40" value="<?php if(isset($emp_code)){echo $emp_code;} ?>" readonly="readonly">
	  <div id="empcode_error"></div>
    </div>
    <div class="input-div">
      <input type="text" placeholder="Firstname" name="firstname" id="firstname" size="40" value="<?php if(isset($firstname)){ echo $firstname;} ?>">
	  <div id="fn_error"></div>
    </div>
	<div class="input-div">
      <input type="text" placeholder="Lastname" name="lastname" id="lastname" size="40" value="<?php if(isset($lastname)){ echo $lastname;} ?>">
	  <div id="ln_error"></div>
    </div>
	<div class="input-div">
      <input type="text" placeholder="Username" name="username" id="username" size="40" value="<?php if(isset($username)){ echo $username;} ?>" readonly="readonly">
	  <div id="un_error"><?php echo $error; ?></div>
    </div>	
    <div>
    <table width="299" border="0">
  <tr>
    <td width="59%">&nbsp;</td>
	<input type="hidden" name="action" id="action" value="usersubmit"/>
	<input type="hidden" name="userid" id="userid" value="<?php echo $id; ?>"/>
    <td width="41%"><input type="submit" value="UPDATE DETAILS"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="center"></td>
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
