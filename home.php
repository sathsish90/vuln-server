<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Hack Me</title>
<link href="css/all-pages.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
</head>

<body>
<?php include('header.php'); ?>

<?php
	//session_start();
	if(!isset($_SESSION['role'])) {
		header('Location: index.php');
	}
?>

<div class="main-div">
  <div class="logo"><img src="img/sm.png" width="408" height="273"></div>
  <div class="login-main">

<b><h3>Instructions - WARNING!!!</h3></b></br>
<h5>Dear User,</h5>
<ul>
<li>Perform Manual Penetration testing on this application and prepare an official report.</li>
<li>You have 8 hours for testing this application and 24 hours to complete the report.</li>
<li>Use the report template provided and make proper documentation of the steps to reproduce with screenshots.</li>
<li>Make sure that screenshots have proper markings and descriptions. Compare your report with the "Report checklist" before submitting as your grading will be based on your report</li>
<li>Do not use Automated scanners (like sqlmap, nikto, acunetix, etc.), you can run dirbuster or similar tools for directory bruteforcing, enumeration etc.</li>
<h5>Happy Hacking 🙂</h5>

</ul>

<!--
  <ul><?php if(isset($_SESSION['role'])=='admin') { ?>
    <li><a href="userslist.php">Users List</a></li><?php } ?><?php if(isset($_SESSION['role'])=='admin') { ?>
    <li><a href="adduser.php">Add User</a></li><?php } ?><?php if(isset($_SESSION['role'])=='admin') { ?>
    <li><a href="uploadpayrolls.php">Upload Employee Payrolls</a></li><?php } ?>
		<!-- <li><a href="downloadpayslips.php">Download Payslip</a></li> 
      <li><a href="changepwd.php">Change Password</a></li>
		<li><a href="logout.php">Logout</a></li>
      </ul>-->

</div>

  </div>
</div>

<footer>
<div class="footer-inner"><table width="100%" border="0" cellpadding="0" cellspacing="00">
  <tr>
    <td align="center">All Rights &reg; Reseved &copy; Copyright Skillmate</td>
    </tr>
</table>
</div>
</footer>

</body>
</html>

