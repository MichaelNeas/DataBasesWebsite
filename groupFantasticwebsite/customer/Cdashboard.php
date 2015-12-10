<?php 
	include('includes/header.php');
	?>

	Homescreen of the customer dashboard!

	<div class = "activeOrders">
		<h1>Active Orders </h1>
		<table class="rwd-table">
		  <tr>
		    <th>Order ID</th>
		    <th>Topic</th>
		    <th>Order Date</th>
		    <th>Total Price</th>
		  </tr>
		  <tr>
		    <td data-th="orderID">#12312312</td>
		    <td data-th="orderTopic">Star Wars Theme Songs</td>
		    <td data-th="orderDate">Today</td>
		    <td data-th="orderprice">$0.99</td>
		  </tr>
		</table>

	</div>

	<div class = "completedOrders">
				<h1>Completed Orders </h1>
		<table class="rwd-table">
		  <tr>
		    <th>Order ID</th>
		    <th>Topic</th>
		    <th>Order Date</th>
		    <th>Total Price</th>
		  </tr>
		  <tr>
		    <td data-th="orderID">#1209876</td>
		    <td data-th="orderTopic">Super Awesome Playlist</td>
		    <td data-th="orderDate">Yesterday</td>
		    <td data-th="orderprice">$460,935,665</td>
		  </tr>
		</table>

	</div>

	<div class = "quickSearch">
	<h3> Search for songs </h3>
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
		mysqli_free_result($result);

		mysqli_close($con);
        /* Connection Debugging	
        *else{
            echo "Prepare failed: (" . $con->errno . ") " . $con->error;
        }
        */
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