
<?php 
  include('includes/header.php');
  ?>
	   <h2>Employee Productivity</h2>

	<div>
		<div>
			<p>Reports start at the beginning of employment and end at current day unless otherwise specified</p>
		<div>
			<label for="">First Name:</label>
			<input type="text" id="pFSearch" />
			<label for="">Last Name:</label>
			<input type="text" id="pLSearch" />
			<input type="submit" id="eSButton" value="Find Employee" />
		</div>

		<div>
			<label for="">Report Date: <?php echo date('l \- m/d/Y');?></label>

			<br>

			<label for="">Start Date:</label>
			<input type="datetime-local" id="pStart" />
			<label for="">End Date:</label>
			<input type="datetime-local" id="pEnd" />
			
			
			
		</div>

	<br>

		<div id="songItem">
			<a href="#" class="list-group-item">
				<div>
					<ol>
						<li id="pFName">First Name: </li>
						<li id="pLName">Last Name: </li>
						<li id="pNumCust"># of Customers: </li>
						<li id="pNumSale"># of Sales: </li>
					</ol>
				</div>
			</a>
		</div>
	</div>
	</div>
<?php
	include('../globalIncludes/footer.php');
	?>