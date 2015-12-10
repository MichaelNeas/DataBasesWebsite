<?php 
	include('includes/header.php');
	?>
<h2>Search Media</h2>
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
		    <!--<td data-th="trackID"><?php //echo $TrackID; ?></td>-->
		    <td data-th="tackName"><?php echo $Name; ?></td>
		    <td data-th="trackComposer"><?php echo $Composer; ?></td>
		    <td data-th="trackTime"><?php echo ''.$minutes.':'.$seconds.''; ?></td>
		    <td data-th="trackCost"><?php echo '$ '.$UnitPrice.''; ?></td>
		    <td data-th="purchaseSong"><button id="purchaseSong" style="color:black;">Buy</button></td>
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

	
<h2>Add Media To Database</h2>

	<script type="text/javascript">
		$('#chooseFile').bind('change', function () {
 			 var filename = $("#chooseFile").val();
  			if (/^\s*$/.test(filename)) {
   			$(".file-upload").removeClass('active');
    		$("#noFile").text("No file chosen..."); 
  			}
  			else {
  			  $(".file-upload").addClass('active');
   			  $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
 			 }
		});
	</script>

<div class="file-upload">
  <div class="file-select">
    <div class="file-select-button" id="fileName">Choose File</div>
    <div class="file-select-name" id="noFile">No file chosen...</div> 
    <input type="file" name="chooseFile" id="chooseFile">
  </div>
</div>



<?php
	include('../globalIncludes/footer.php');
	?>