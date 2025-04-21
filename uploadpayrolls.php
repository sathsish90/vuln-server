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
<table width="500" border="0" align="center" cellpadding="5" cellspacing="10">
	<tr>
		<td colspan="2000">
			<form action="fileupload/image.php" method="post" enctype="multipart/form-data">
			<td colspan="2000"><p>Update Your Profile Picture</p><input type="file" name="fileToUpload" id="fileToUpload"></td>
			<td><input type="submit" value="Upload Image" name="submit"></td>
		</td>
	</tr>
	</form>

</table>
<table width="500" border="0" align="center" cellpadding="5" cellspacing="10">
	<tr>
		<td colspan="2000">
			<form action="fileupload/image2.php" method="post" enctype="multipart/form-data">
			<td colspan="2000"><p>Random Image</p><input type="file" name="fileToUpload" id="fileToUpload"></td>
			<td><input type="submit" value="Upload Image" name="submit"></td>
		</td>
	</tr>
</form>
</table>


</div>
</body>
</html>

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
