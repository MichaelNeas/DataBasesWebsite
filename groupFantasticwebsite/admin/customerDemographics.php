<?php 
	include('includes/header.php');
	?>

	Search all people and change their data
			<div class = "peopleDemographics">
				<h1>People Demographics </h1>

	<form method="post" action="" style="padding:10px; text-align:center;">			
		<select name="personID"> 
        <option value="">All Customers and Employees</option>

    <?php 
        $query = "SELECT PersonID,FirstName,LastName FROM person ORDER BY person.LastName ASC";
        if ($stmt = $con->prepare($query)) {
                $stmt->execute();
    			$stmt->bind_result($PersonID, $FirstName, $LastName);
    			while ($stmt->fetch()) {
    			   	echo '<option value="'.$PersonID.'">' .$LastName. ",".$FirstName.'</option>';
    			}
       	}
        /*else{
            echo "Prepare failed: (" . $con->errno . ") " . $con->error;
        }
        $con->close();*/
    ?>

      </select>
      <input name="fillTableSubmit" type="submit" value="Fill Table">
      </form>
			<!--Customers Information-->

<?php   
/* Connection Debugging	
    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    else{
        echo "connected";
    }*/
    //echo $_POST['personID'];
    if(isset($_POST["fillTableSubmit"])){
        $personID = $_POST['personID'];
        //echo $personID;
            $query = "SELECT * FROM person WHERE PersonID = ?";
        if ($stmt = $con->prepare($query)) {
            $stmt->bind_param("i", $personID); 
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($PersonID, $FirstName, $LastName, $Address, $City, $State, $Country, $PostalCode, $Phone, $Fax, $Email);
            $stmt->fetch();
            echo '<table class="rwd-table" style="width:50%; margin: 0 auto;">
		  <tr>
		    <th>Customer:</th>
		    <th>'.$FirstName.' '.$LastName.'</th>
		  <tr>
		    <td data-th="customerID">Customer ID</td>
		    <td> '.$PersonID.' </td>
		  </tr>
		  <tr>
		    <td data-th="username">Username</td>
		    <td> '.$PersonID.'</td>
		  </tr>
		  <tr>
		    <td data-th="street">Street</td>
		    <td> '.$Address.'</td>
		  </tr>
		  <tr>
		    <td data-th="city">City</td>
		    <td> '.$City.'</td>
		  </tr>
		  <tr>
		    <td data-th="zip">Zip</td>
		    <td> '.$Country.'</td>
		  </tr>
		  <tr>
		    <td data-th="zip">Zip</td>
		    <td> '.$PostalCode.'</td>
		  </tr>
		  <tr>
		    <td data-th="email">Email</td>
		    <td> '.$Email.'</td>
		  </tr>
		  <tr>
		    <td data-th="phone">Phone</td>
		    <td> '.$Phone.'</td>
		  </tr>
		  <tr>
		    <td data-th="fax">Fax</td>
		    <td> '.$Fax.'</td>
		  </tr>
		</table>';




        }
        // Free result set
		mysqli_free_result($result);

		mysqli_close($con);
        /* Connection Debugging	
        *else{
            echo "Prepare failed: (" . $con->errno . ") " . $con->error;
        }
        */
    }
    else{
    	echo "Select someone from dropdown";
    }
?>	
	<div id="peopleButtons">
      <button type="modbutton">Send to Modify Person's Information</button>
      <button type="modbutton">Contact Person</button>
    </div> 

<?php
	include('../globalIncludes/footer.php');
	?>