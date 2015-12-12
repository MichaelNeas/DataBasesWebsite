<?php 
	include('includes/header.php');
	?>

	Homescreen of the Employee dashboard!
		<div class = "activeCustomersOrders">
				<h1>Most Recent Customer Orders </h1>
		<table class="rwd-table">
		  <tr>
		    <th>Invoice ID</th>
		    <th>Customer</th>
		    <th>Description</th>
		  </tr>
		  <tr>
		    <td data-th="invoiceId">#12</td>
		    <td data-th="customer">Joey Hanlon</td>
		    <td data-th="Description"><a href="#"> Ordered: click for more info</a></td>
		  </tr>
		  <tr>
		    <td data-th="invoiceId">#82</td>
		    <td data-th="customer">Mike Neas</td>
		    <td data-th="Description"><a href="#"> Ordered: click for more info</a></td>
		  </tr>
		  <tr>
		    <td data-th="invoiceId">#25</td>
		    <td data-th="customer">Alex Dow</td>
		    <td data-th="Description"><a href="#"> Ordered: click for more info</a></td>
		   </tr>
		</table>

	</div>

<?php
	include('../globalIncludes/footer.php');
	?>