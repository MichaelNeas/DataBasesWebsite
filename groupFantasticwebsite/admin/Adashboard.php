<?php 
	include('includes/header.php');
	include('');
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
		    <th>Employee Name</th>
		    <th>Employee Location</th>
		  </tr>
		  <tr>
		    <td data-th="invoiceId">name1</td>
		    <td data-th="customer">Captain D</td>
		    <td data-th="Description">Ordered: click for more info, popin with info</td>
		  </tr>
		  <tr>
		    <td data-th="invoiceId">name2</td>
		    <td data-th="customer">Captain D</td>
		    <td data-th="Description">Ordered: click for more info</td>
		  </tr>
		  <tr>
		    <td data-th="invoiceId">name3</td>
		    <td data-th="customer">Captain D</td>
		    <td data-th="Description">Ordered: click for more info</td>
		   </tr>
		</table>

	</div>

<?php
	include('../globalIncludes/footer.php');
	?>