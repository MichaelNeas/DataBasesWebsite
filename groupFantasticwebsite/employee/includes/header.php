<?php
	include('includes/arrays.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Employee Dashboard</title>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/bootstrap.css"> 
</head>

<body>
<header>
	<img src="http://i67.tinypic.com/x58nr7.png" id="logo">
    <img src="http://i63.tinypic.com/2lxxith.png" id="chinook">
	<h1>Employee Dashboard</h1>
</header> <!--Banner -->

<div class="container-fluid">

		<div class="col-xs-3" id="sidebar">
			<?php include('includes/nav.php'); ?>
		</div> <!-- nav -->
	
	<div id="Bcolor" class="content">		
	<?php
	include('../globalIncludes/config.ini.php');
?>