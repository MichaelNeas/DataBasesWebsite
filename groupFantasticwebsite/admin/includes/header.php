<?php
	include('includes/arrays.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Administrator Dashboard</title>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/bootstrap.css"> 
</head>

<body>
	<?phps
	include('../globalIncludes/config.ini.php');
?>
<header>
	<img src="http://i67.tinypic.com/x58nr7.png" id="logo">
    <img src="http://i63.tinypic.com/2lxxith.png" id="chinook">
	<h1>Administrator Dashboard</h1>
	<div style="float:right; margin-right:5%;">
		<strong>Welcome <?php echo $_SESSION["Username"];?>
		<a href="../admin/userModifyProfile.php"><button>Edit Profile</button></a>
		<a href="../admin/userShoppingCart.php"><button>My Shopping Cart</button></a>
	</div>
</header> <!--Banner -->

<div class="container-fluid">

		<div class="col-xs-3" id="sidebar">
			<?php include('includes/nav.php'); ?>
		</div> <!-- nav -->
	
	<div id="Bcolor" class="content">		
	
