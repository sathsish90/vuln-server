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

<div class="clear"></div>
<div class="main-div">
  <div class="clear"></div>
  <div class="page-head">Users / Employees List</div>
  <div>
  <table cellpadding="0" cellpadding="0" border="1" width="80%" align="center">
<tr>
	<th>S.No.</th>
	<th>Employee Code</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Username</th>
	<th>Password</th>
	<th>Actions</th>
</tr>
<?php 
	//session_start();
	if(!isset($_SESSION['role'])) {
		header('Location: index.php');
	}
	$error = "";
	$inc = 1;
	include_once "db/DbConnection.php";
	
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * 20; 

	$query = "SELECT * FROM ivax_users ORDER BY created_date DESC LIMIT $start_from, 20";	
	$result = mysqli_query($con,$query);		
	while($row = mysqli_fetch_object($result))
	{
		$row->employee_code = preg_replace('/script/', '', $row->employee_code);
		$row->firstname = preg_replace('/script/', '', $row->firstname);
		$row->lastname = preg_replace('/script/', '', $row->lastname);
		$row->username = preg_replace('/script/', '', $row->username);
?>
		
		<tr>
			<td><?php echo $inc; ?></td>
			<td><?php echo $row->employee_code; ?></td>
			<td><?php echo $row->firstname; ?></td>
			<td><?php echo $row->lastname; ?></td>
			<td><?php echo $row->username; ?></td>
			<td><?php echo $row->password; ?></td>
			<td><a href="edituser.php?id=<?php echo $row->id; ?>"><img src="img/editIcon.png" alt="Edit" title="Edit"/></a>&nbsp;<a href="deleteuser.php?id=<?php echo $row->id; ?>"><img src="img/delete.png" alt="Delete" title="Delete"/></td>
		</tr>


		<?php
		$inc++;
	}
?>
</table>

<div align="center"><br>
<?php 
	$query = "SELECT username FROM ivax_users"; 
	$result = mysqli_query($con,$query);		
	$num_rows = $result->num_rows;
	//$num_rows = mysql_num_rows($result);
	$total_records = $result->num_rows; 
	$total_pages = ceil($total_records / 20); 
	 echo 'Page : ';
	for ($i=1; $i<=$total_pages; $i++) { 
				echo "<a href='userslist.php?page=".$i."'>".$i."</a> "; 
	}
?>
</div>

</div>
</div>

<?php
	if(isset($_REQUEST['action']) == 'loginsubmit') { 
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

