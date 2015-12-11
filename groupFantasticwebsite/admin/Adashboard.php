<?php 
	include('includes/header.php');
	?>

	Homescreen of the Admin dashboard!
		<div class = "activeCustomersOrders">
		<h1>All Active Customer Orders </h1>
		<table class="rwd-table">
		  <tr>
		    <th>Invoice ID</th>
		    <th>Customer</th>
		    <th>Description</th>
		  </tr>
		  <tr>
		    <td data-th="invoiceId">12312312</td>
		    <td data-th="customer">Captain D</td>
		    <td data-th="Description">Ordered: click for more info, popin with info</td>
		  </tr>
		  <tr>
		    <td data-th="invoiceId">12312312</td>
		    <td data-th="customer">Captain D</td>
		    <td data-th="Description">Ordered: click for more info</td>
		  </tr>
		  <tr>
		    <td data-th="invoiceId">12312312</td>
		    <td data-th="customer">Captain D</td>
		    <td data-th="Description">Ordered: click for more info</td>
		   </tr>
		</table>

	</div>

	<div class = "allEmployees">
		<h1>All Chinook Employees</h1>

		<table class="rwd-table">
		  <tr>
		    <th>Employee ID</th>
		    <th>Username</th>
		    <th>Title</th>
		    <th>ReportsTo</th>
		    <th>Reputation</th>
		  </tr>


		  <?php

		  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

		  	$sql = "SELECT EmployeeId,Username,Title,ReportsTo,Reputation FROM employee ORDER BY EmployeeId ASC";
        		$stmt = $con->prepare($sql);
            	$stmt->execute();
           		$stmt->store_result();
           	 	$stmt->bind_result($EmployeeId, $Username, $Title, $ReportsTo, $Reputation);

           	 	while($stmt->fetch()){
		  ?>

		  <tr>
		    <td data-th="EmployeeId"><?php echo $EmployeeId; ?></td>
		    <td data-th="Username"><?php echo $Username; ?></td>
		    <td data-th="Title"><?php echo $Title; ?></td>
		    <td data-th="ReportsTo"><?php echo $ReportsTo; ?></td>
		    <td data-th="Reputation"><?php echo $Reputation; ?></td>
		  </tr>


<?php
				}

	?>

		</table>

	</div>

	<?php


	include('../globalIncludes/footer.php');
	?>