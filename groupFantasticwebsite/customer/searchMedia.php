<?php 
	include('includes/header.php');
	?>
Search Media
   			<div class="search">
   			<form style="border:none;" method="post">
      			<input type="text" class="searchTracks" name="searchTracks" placeholder="Tracks">
      			<strong>OR</strong>
      			<input type="text" class="searchAlbums" name="searchAlbums" placeholder="Albums">
      			<strong>OR</strong>
      			<input type="text" class="searchArtists" name="searchArtists" placeholder="Artists">
      			<strong>OR</strong>
      			<input type="text" class="searchGenres" name="searchGenres" placeholder="Genres">
      			<input type="submit" class="searchButton" name="searchSongs" value="Search"></input>
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
    if(isset($_POST["searchSongs"])){
        $trackName = $_POST['searchTracks'];
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
        <form style="border:none;" method="post">

          <input type="hidden" name="buytrackID" value="<?php echo $TrackID; ?>" />

		      <td data-th="trackName">
            <input type="text" name="buytrackName" style="background:none; border:none;" readonly="readonly" value="<?php echo $Name; ?>" /></td>

          <td data-th="trackComposer">
            <input type="text" name="buytrackComposer" style="background:none; border:none;" readonly="readonly" value="<?php echo $Composer; ?>" /></td>

          <td data-th="trackTime">
            <input type="text" name="buytrackTime" style="background:none; border:none;" readonly="readonly" value="<?php echo ''.$minutes.':'.$seconds.''; ?>" /></td>

          <td data-th="trackCost">
            <input type="text" name="buytrackCost" style="background:none; border:none;" readonly="readonly" value="<?php echo '$ '.$UnitPrice.''; ?>" /></td>

		      <td data-th="purchaseSong">
            <input type="submit" style="color:black;" name="addtocart" value="Add to Cart"></input></td>

        </form>
		  </tr>
	
	<?php

			}
        }
        // Free result set
		//mysqli_free_result($result);

		$con->close();
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


<?php

  if(isset($_POST["buytrackID"])){

    $sql = "INSERT INTO shoppingcart (SCustomerID, Track, Playlist, Album) VALUES (?,1,0,0)";
    $stmt = $con->prepare($sql);
    $CustomerID = $_SESSION["CustomerId"];
    $stmt->bind_param('i', $CustomerID);
    $stmt->execute();

    echo '<script type="text/javascript">alert("Added to cart!"); </script>';

  }

?>




</table>
</div>

<?php
	include('../globalIncludes/footer.php');
	?>