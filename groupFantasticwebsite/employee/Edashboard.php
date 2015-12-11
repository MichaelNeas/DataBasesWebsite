<?php 
	include('includes/header.php');
	?>

	Homescreen of the Employee dashboard!
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

<?php
	include('../globalIncludes/footer.php');
	?>