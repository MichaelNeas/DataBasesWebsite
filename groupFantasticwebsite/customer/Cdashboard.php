<?php 
	include('includes/header.php');
	?>
	
	Homescreen of the customer dashboard!

	<div class = "activeOrders">
		<h1>Active Orders | What's in your shopping cart.</h1>
		<table class="rwd-table">
		  <tr>
		    <th>Order ID</th>
		    <th>Topic</th>
		    <th>Total Price</th>
		  </tr>

<?php
$query = "CREATE TEMPORARY TABLE ids (     idname VARCHAR(320), 	itemID INT(11),     Price DECIMAL(10,2) )";
if ($stmt = $con->prepare($query)) {
	$stmt->execute();
	$stmt->bind_result($field1, $field2);
	while ($stmt->fetch()) {
    	//printf("%s, %s\n", $field1, $field2);
	}
	$stmt->close();
}else{
echo "Doesnt work";
}

$personID = $_SESSION['PersonID'];
$query = "INSERT INTO ids ( idname, itemID, Price ) select CONCAT(artist.name,' - ',track.name), shoppingcart.ItemID, track.UnitPrice FROM shoppingcart join chinook.customer on SCustomerID = customer.CustomerId join chinook.person on person.PersonID = customer.CPersonID AND person.PersonID = ? join chinook.trackitem on trackitem.Titemid = shoppingcart.ItemID join chinook.track on track.trackid = trackitem.realtrackid join chinook.album on album.AlbumId = track.AlbumId join chinook.artist on artist.ArtistId = album.ArtistId";

if ($stmt = $con->prepare($query)) {
	$stmt->bind_param("i", $personID); 
	$stmt->execute();
	$stmt->bind_result($name, $ItemID, $UnitPrice);
	unset($params);
	$stmt->close();
}else{
echo "Doesnt work";
}

$personID = $_SESSION['PersonID'];
$query = "INSERT INTO ids ( idname, itemID, Price ) select CONCAT(artist.name,' - ',album.Title) AS albumname, shoppingcart.ItemID, (count(track.name) * track.UnitPrice) AS Price FROM (shoppingcart,album) join chinook.customer on SCustomerID = customer.CustomerId join chinook.person on person.PersonID = customer.CPersonID and person.personid = ? join chinook.albumitem on albumitem.Aitemid = shoppingcart.ItemID and albumitem.realalbumid = album.AlbumId join chinook.track on album.AlbumId = track.AlbumId join chinook.artist on artist.ArtistId = album.ArtistId GROUP BY albumname";


if ($stmt = $con->prepare($query)) {
	$stmt->bind_param("i", $personID); 
	$stmt->execute();
	$stmt->bind_result($albumname, $ItemID, $Price);
	$stmt->fetch();
	unset($params);
	$stmt->close();
}else{
    echo "Prepare failed: (" . $con->errno . ") " . $con->error;
 }


$query = "select idname, itemID, Price from ids";

if ($stmt = $con->prepare($query)) {
	$stmt->execute();
	$stmt->bind_result($idname, $itemID, $Price );
	while ($stmt->fetch()) {
    	?>
    		<tr>
		    <td data-th="orderID"><?php echo '#'.$itemID.''; ?></td>
		    <td data-th="orderTopic"><?php echo $idname; ?></td>
		    <td data-th="orderprice"><?php echo '$ '.$Price.''; ?></td>
		  </tr>
    	<?php
	}
	$stmt->close();
}
else{
echo "Doesnt work";
}

$query = "drop table ids";
if ($stmt = $con->prepare($query)) {
	$stmt->execute();
	$stmt->bind_result($field1, $field2);
	while ($stmt->fetch()) {
    	//printf("%s, %s\n", $field1, $field2);
	}
	$stmt->close();
}
?>
	</table>
</div>

	<div class = "completedOrders">
				<h1>Your Completed Orders </h1>
		<table class="rwd-table">
		  <tr>
		    <th>Invoice ID</th>
		    <th>Date</th>
		    <th>Billing City</th>
		    <th>Total</th>
		    <th>Payment Chosen</th>
		    </tr>
		  <?php   
/* Connection Debugging	
    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    else{
        echo "connected";
    }*/
    //echo $_POST['personID'];
        $personID = $_SESSION['PersonID'];
        //echo $trackName;
        //Select invoice.CustomerId, InvoiceDate, BillingAddress, BillingCity, BillingState, BillingCountry, BillingPostalCode , Total, PaymentOption from (invoice,person,customer) where person.PersonID = customer.CPersonID and customer.CustomerId = invoice.CustomerId and personID = ?;
            $query = "Select InvoiceID, InvoiceDate, BillingAddress, BillingCity, BillingState, BillingCountry, BillingPostalCode , Total, PaymentOption
 						from (invoice,person,customer) where person.PersonID = customer.CPersonID
 						and customer.CustomerId = invoice.CustomerId and person.PersonID = ?";
        	if ($stmt = $con->prepare($query)) {
            $stmt->bind_param("i", $personID); 
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($InvoiceID, $InvoiceDate, $BillingAddress, $BillingCity, $BillingState, $BillingCountry, $BillingPostalCode, $Total, $PaymentOption);
            if($stmt->num_rows != 0){
            while($stmt->fetch()){
			?>		  
		  <tr>
		    <td data-th="invoiceID"><?php echo '#'.$InvoiceID.''; ?></td>
		    <td data-th="invoiceDate"><?php echo date( "m-d-Y", strtotime( $InvoiceDate ) );?></td>
		    <td data-th="billingCity"><?php echo $BillingCity; ?></td>
		    <td data-th="paymentOptions"><?php echo '$ '.$Total.''; ?></td>
		    <td data-th="total"><?php echo $PaymentOption; ?></td>
		  </tr>
	<?php

			}
        }
        else{
        	echo "You have no order history";
        }
        // Free result set
		//mysqli_free_result($result);
    $stmt->close();
    unset($params);
        /* Connection Debugging	
        *else{
            echo "Prepare failed: (" . $con->errno . ") " . $con->error;
        }
        */
    }
    else{
    	echo "fail";
    }
   
?>	
		</table>

	</div>






<!--Quick Search-->
	<div class = "quickSearch">
	<h3> Quick search for songs </h3>
   			<div class="search">
   			<form style="border:none;" method="post">
      			<input type="text" class="searchTerm" name="searchTerm" placeholder="Search our database for tracks?">
      			<input type="submit" class="searchButton" name="quickSubmit" value="Search"></input>
      		</form>			
     		</div>
<?php   
/* Connection Debugging	
    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    else{
        echo "connected";
    }*/
    //echo $_POST['personID'];
    if(isset($_POST["quickSubmit"])){
        $trackName = $_POST['searchTerm'];
        $trackName = "%" .$trackName. "%";
        //echo $trackName;
            $query = "SELECT TrackID,Name,Composer,MilliSeconds,UnitPrice FROM track where Name LIKE ? ORDER BY Name ASC";
        if ($stmt = $con->prepare($query)) {
            $stmt->bind_param("s", $trackName); 
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($TrackID, $Name, $Composer, $MilliSeconds, $UnitPrice);
            ?>
      		<div class = "searchResults">
				<h1>Search Results </h1>
			<table class="rwd-table">
		  	<tr>
		    <!--<th>TrackID</th>-->
		    	<th>Name</th>
		    	<th>Composer</th>
		    	<th>Time</th>
		    	<th>Price</th>
		    </tr>

		    <?php
            while($stmt->fetch()){

            $input = $MilliSeconds;

			$uSec = $input % 1000;
			$input = floor($input / 1000);

			$seconds = $input % 60;
			$input = floor($input / 60);

			$minutes = $input % 60;
			$input = floor($input / 60); 
?>		  
		  <tr>
		    <!--<td data-th="trackID"><?php //echo $TrackID; ?></td>-->
		    <td data-th="tackName"><?php echo $Name; ?></td>
		    <td data-th="trackComposer"><?php echo $Composer; ?></td>
		    <td data-th="trackTime"><?php echo ''.$minutes.':'.$seconds.''; ?></td>
		    <td data-th="trackCost"><?php echo '$ '.$UnitPrice.''; ?></td>
		    <td data-th="playSong"><button id="playSong" style="color:black;">Play</button></td>
		  </tr>
	

	
	<?php

			}
        }
        // Free result set
		//mysqli_free_result($result);

		//$con->close();
         /*Connection Debugging	*/
        else{
            echo "Prepare failed: (" . $con->errno . ") " . $con->error;
        }
        
    }
    else{
    	echo "Search Something!";
    }
?>	
	</table>
   </div>
</div>
	

<?php
	include('../globalIncludes/footer.php');
	?>