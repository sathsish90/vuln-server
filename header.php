<?php session_start(); ?>
<header>
  <div class="header-inner">
    <div class="inner-logo"><img src="img/sm-logo.png" width="200" height="50" alt=""/></div>
    <nav>
      <ul>
	  	<li><a href="home.php">Home</a></li><?php if(isset($_SESSION['role'])=='admin') { ?>
      <li><a href="userslist.php">Users List</a></li><?php } ?><?php if(isset($_SESSION['role'])=='admin') { ?>
      <li><a href="adduser.php">Add User</a></li><?php } ?><?php if(isset($_SESSION['role'])=='admin') { ?>
      <li><a href="uploadpayrolls.php">Upload Employee Payrolls</a></li><?php } ?>
      <li><a href="changepwd.php">Change Password</a></li>
        <li style="border:0px;"><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </div>
</header>
