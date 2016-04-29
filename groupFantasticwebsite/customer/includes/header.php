<?php
	include('includes/arrays.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Customer Dashboard</title>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/bootstrap.css"> 
</head>

<body>
	<?php
	include('../globalIncludes/config.ini.php');
?>
<header "col-xs-12" >    
	<img src="http://i67.tinypic.com/x58nr7.png" id="logo">
    <img src="http://i63.tinypic.com/2lxxith.png" id="chinook">
	<h1 style="float:clear;">Customer Dashboard</h1>
	<div style="float:right; margin-right:5%;">
		<strong>Welcome <?php echo $_SESSION["Username"];?>
		<a href="../customer/userModifyProfile.php"><button>Edit Profile</button></a>
		<a href="../customer/userShoppingCart.php"><button>My Shopping Cart</button></a>
	</div>
</header> <!--Banner -->

<div class="container-fluid" style="float:none;">

		<div class="col-xs-3" id="sidebar">
			<?php include('includes/nav.php'); ?>
		</div> <!-- nav -->
	
	<div id="Bcolor" class="content">		

