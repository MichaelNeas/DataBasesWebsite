<?php 
	include('includes/header.php');
	?>
	
	Homescreen of the customer dashboard!

	<div class = "activeOrders">
		<h1>Active Orders | What's in your shopping cart.</h1>
		<table class="rwd-table">
		  <tr>
		    <th>Order Id</th>
		    <th>Track Name</th>
		    <th>Artist Name</th>
		    <th>Album Name</th>
		    <th>Price</th>
		  </tr>

<?php
$query = "CREATE TEMPORARY TABLE ids ( artistname VARCHAR(60), 	albumname VARCHAR(120),     trackname VARCHAR(60), 	itemID INT(11),     Price DECIMAL(10,2), 	trackid INT(11) )";
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
$query = "INSERT INTO ids ( artistname, albumname, trackname, itemID, Price, trackid ) select artist.name, album.title, track.name, shoppingcart.ItemID, track.UnitPrice, track.trackid FROM shoppingcart join chinook.customer on SCustomerID = customer.CustomerId join chinook.person on person.PersonID = customer.CPersonID AND person.PersonID = ? join chinook.trackitem on trackitem.Titemid = shoppingcart.ItemID join chinook.track on track.trackid = trackitem.realtrackid join chinook.album on album.AlbumId = track.AlbumId join chinook.artist on artist.ArtistId = album.ArtistId";

if ($stmt = $con->prepare($query)) {
	$stmt->bind_param("i", $personID); 
	$stmt->execute();
	$stmt->bind_result($name, $title, $name1, $ItemID, $UnitPrice, $trackid);
	while ($stmt->fetch()) {
    	//printf("%s, %s, %s, %s, %s, %s\n", $name, $title, $name1, $ItemID, $UnitPrice, $trackid);
	}
	$stmt->close();
}else{
echo "Track not here";
}


$personID = $_SESSION['PersonID'];
$query = "INSERT INTO ids ( artistname, albumname, trackname, itemID, Price, trackid ) select artist.name, album.title, track.name, shoppingcart.ItemID, track.UnitPrice, track.trackid FROM (shoppingcart,album) join chinook.customer on SCustomerID = customer.CustomerId join chinook.person on person.PersonID = customer.CPersonID and person.personid = ? join chinook.albumitem on albumitem.Aitemid = shoppingcart.ItemID and albumitem.realalbumid = album.AlbumId join chinook.track on album.AlbumId = track.AlbumId join chinook.artist on artist.ArtistId = album.ArtistId";

if ($stmt = $con->prepare($query)) {
	$stmt->bind_param("i", $personID); 
	$stmt->execute();
	$stmt->bind_result($name, $title, $name1, $ItemID, $UnitPrice, $trackid);
	while ($stmt->fetch()) {
    	//printf("%s, %s, %s, %s, %s, %s\n", $name, $title, $name1, $ItemID, $UnitPrice, $trackid);
	}
	$stmt->close();
}else{
echo "Albums not there";
}


$personID = $_SESSION['PersonID'];
$query = "INSERT INTO ids ( artistname, albumname, trackname, itemID, Price, trackid ) select DISTINCT artist.name, album.title, track.name, shoppingcart.ItemID, track.UnitPrice, track.trackid FROM (shoppingcart,playlist) join chinook.customer on shoppingcart.SCustomerID = customer.CustomerID AND shoppingcart.ScustomerID = customer.customerID join chinook.person on person.PersonID = customer.CPersonID and person.personid = ? join chinook.playlistitem on playlistitem.pitemid = shoppingcart.ItemID join chinook.playlisttrack on playlisttrack.PlaylistId = playlistitem.realplaylistid join chinook.track on track.trackid = playlisttrack.trackid join chinook.album on album.albumid = track.albumid join chinook.artist on album.artistid = artist.artistid";


if ($stmt = $con->prepare($query)) {
	$stmt->bind_param("i", $personID); 
	$stmt->execute();
	$stmt->bind_result($name, $title, $name1, $ItemID, $UnitPrice, $trackid);
	while ($stmt->fetch()) {
    	//printf("%s, %s, %s, %s, %s, %s\n", $name, $title, $name1, $ItemID, $UnitPrice, $trackid);
	}
	$stmt->close();
}else{
echo "Playlist not there";
}

//$personID = $_SESSION['PersonID'];
$query = "select artistname,albumname,trackname,itemid,Price from ids";

if ($stmt = $con->prepare($query)) {
	$stmt->execute();
	$stmt->store_result(); //<-- This needs to be called here!
   	$num_of_rows = $stmt->num_rows;  

	$stmt->bind_result($artistname, $albumname, $trackname, $itemid, $Price);
	 //printf("Result set has %d rows.\n", $num_of_rows);
	if($num_of_rows != 0){
	while ($stmt->fetch()) {
    	//printf("%s, %s, %s, %s, %s\n", $artistname, $albumname, $trackname, $itemid, $Price);
    	?>
		<tr>
		    <td data-th="invoiceID"><?php echo '#'.$itemid.''; ?></td>
		    <td data-th="artistShopping"><?php echo $artistname;?></td>
		    <td data-th="artistShoppingCart"><?php echo $artistname; ?></td>
		    <td data-th="albumShoppingCart"><?php echo $albumname; ?></td>
		    <td data-th="totalPrice"><?php echo '$ '.$Price.''; ?></td>
		  </tr>

    	<?php
	}
			}
			else{
				echo "No items in your shopping cart!";
			}
	$stmt->close();
}else{
echo "Selecting doesnt work";
}

$query = "drop table ids";
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

?>
	</table>
</div>

	<div class = "completedOrders">
				<h1>Your Completed Orders </h1>
		<table class="rwd-table">
		  <tr>
		    <th>Invoice ID</th>
		    <th>Date Ordered</th>
		    <th>Track Name</th>
		    <th>Artist</th>
		    <th>Album</th>
		    <th>Total</th>
		    <th>Payment Chosen</th>
		    </tr>
		  <?php   
/* Connection Debugging	
    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }*/ 
 
       	$personID = $_SESSION['PersonID'];
        //echo $personID;
        //Select invoice.CustomerId, InvoiceDate, BillingAddress, BillingCity, BillingState, BillingCountry, BillingPostalCode , Total, PaymentOption from (invoice,person,customer) where person.PersonID = customer.CPersonID and customer.CustomerId = invoice.CustomerId and personID = ?;
           $query = "select artist.name, album.title, track.name, invoice.invoiceid, invoice.InvoiceDate, invoice.total, invoice.paymentoption from person join chinook.customer on person.PersonID = customer.CPersonID and person.personid = ? join chinook.invoice on customer.CustomerId = invoice.CustomerId join chinook.invoiceline on invoiceline.InvoiceId = invoice.InvoiceId join chinook.track on invoiceline.trackid = track.trackid join chinook.album on track.albumid = album.albumid join chinook.artist on artist.ArtistId = album.ArtistId";
            
            if ($stmt = $con->prepare($query)) {
            $stmt->bind_param("i", $personID); 
			
			$stmt->execute();
			$stmt->store_result(); //<-- This needs to be called here!
    		$num_of_rows = $stmt->num_rows;  
			$stmt->bind_result($name, $title, $name1, $invoiceid, $InvoiceDate, $total, $paymentoption);
    		//printf("Result set has %d rows.\n", $num_of_rows);
			if($num_of_rows != 0){
			while ($stmt->fetch()) {

    	//printf("%s, %s, %s, %s, %s, %s, %s\n", $name, $title, $name1, $invoiceid, $InvoiceDate, $total, $paymentoption);
			?>		  
		  <tr>
		    <td data-th="invoiceID"><?php echo '#'.$invoiceid.''; ?></td>
			<td data-th="invoiceDate"><?php echo date( "m-d-Y", strtotime( $InvoiceDate ) );?></td>
		    <td data-th="trackOrdered"><?php echo $name1; ?></td>
		    <td data-th="artistOrdered"><?php echo $name; ?></td>
		    <td data-th="albumOrdered"><?php echo $title; ?></td>
		    <td data-th="totalpaid"><?php echo '$ '.$total.''; ?></td>
		    <td data-th="paymentOptions"><?php echo $paymentoption; ?></td>
		  </tr>
	<?php

			}
		}
			else{
				echo "You have no previous orders";
			}
			$stmt->close();
    		unset($params);
        }
        else{
        	echo "Query Broke";
        }
        /* Connection Debugging	
        *else{
            echo "Prepare failed: (" . $con->errno . ") " . $con->error;
        }
       */ 
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