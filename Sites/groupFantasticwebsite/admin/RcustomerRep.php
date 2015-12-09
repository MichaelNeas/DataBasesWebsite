<?php 
	include('includes/header.php');
	?>
		   <h2>Customer Reporting</h2>
    <div >
    	<div >
			<label for="">Report Date: <?php echo date('l \- m/d/Y');?></label>

			<br>
			<p>Note: Reports begin from when the media was added and end at current day unless otherwise specified </p>

			<label for="">Start Date:</label>
			<input type="datetime-local" id="pStart" />
			<label for="">End Date:</label>
			<input type="datetime-local" id="pEnd" />	
		</div>

		<div>

			<div>
				<label for="">Search by customer:</label>
				<input type="text" id="cFName" placeholder="First Name" />
				<input type="text" id="cLName" placeholder="Last Name" />
			</div>

			<div>
				<label for="">Search by media:</label>
				<input type="text" id="cSName" placeholder="Song Name" />
				<input type="text" id="cArName" placeholder="Artist Name" />
				<input type="text" id="cAlName" placeholder="Album Name" />
				<input type="text" id="cGName" placeholder="Genre" />
			</div>

			<div>
				<label for="">Or by location:</label>
				<input type="text" id="cCity" placeholder="City" />
				 <select id="cState">
				 	<option value="ChooseOne">State (Choose one)</option>
    				<option value="AL">Alabama</option>
    				<option value="AK">Alaska</option>
    				<option value="AZ">Arizona</option>
    				<option value="AR">Arkansas</option>
				    <option value="CA">California</option>
				    <option value="CO">Colorado</option>
				    <option value="CT">Connecticut</option>
    				<option value="DE">Delaware</option>
    				<option value="DC">District Of Columbia</option>
    				<option value="FL">Florida</option>
    				<option value="GA">Georgia</option>
    				<option value="HI">Hawaii</option>
    				<option value="ID">Idaho</option>
    				<option value="IL">Illinois</option>
    				<option value="IN">Indiana</option>
    				<option value="IA">Iowa</option>
    				<option value="KS">Kansas</option>
    				<option value="KY">Kentucky</option>
    				<option value="LA">Louisiana</option>
    				<option value="ME">Maine</option>
    				<option value="MD">Maryland</option>
    				<option value="MA">Massachusetts</option>
    				<option value="MI">Michigan</option>
    				<option value="MN">Minnesota</option>
    				<option value="MS">Mississippi</option>
    				<option value="MO">Missouri</option>
    				<option value="MT">Montana</option>
    				<option value="NE">Nebraska</option>
    				<option value="NV">Nevada</option>
    				<option value="NH">New Hampshire</option>
    				<option value="NJ">New Jersey</option>
    				<option value="NM">New Mexico</option>
    				<option value="NY">New York</option>
    				<option value="NC">North Carolina</option>
    				<option value="ND">North Dakota</option>
    				<option value="OH">Ohio</option>
    				<option value="OK">Oklahoma</option>
    				<option value="OR">Oregon</option>
    				<option value="PA">Pennsylvania</option>
    				<option value="RI">Rhode Island</option>
    				<option value="SC">South Carolina</option>
    				<option value="SD">South Dakota</option>
    				<option value="TN">Tennessee</option>
    				<option value="TX">Texas</option>
    				<option value="UT">Utah</option>
    				<option value="VT">Vermont</option>
    				<option value="VA">Virginia</option>
    				<option value="WA">Washington</option>
    				<option value="WV">West Virginia</option>
    				<option value="WI">Wisconsin</option>
    				<option value="WY">Wyoming</option>
    			</select>
				<input type="text" id="cCountry" placeholder="Country" />
			</div>
		</div>

		<div >
			<div style="padding-left:5px;">
				<input type="radio" id="cChooseName" />Search by Name <br>
				<input type="radio" id="cChooseLoc" />Search by Location
			</div>
			<div>
				<input type="submit" id="cNewRep" value="Create New Report" />
				<input type="submit" id="cExistingRep" value="Edit Existing Report" />
			</div>
		</div>
		<br> <br>

	
<?php
	include('../globalIncludes/footer.php');
	?>