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

          <input type="hidden" name="deletetrackID" value="<?php echo $TrackID; ?>" />

          <td data-th="trackName">
            <input type="text" name="trackName" style="background:none; border:none;" readonly="readonly" value="<?php echo $Name; ?>" /></td>

          <td data-th="trackComposer">
            <input type="text" name="trackComposer" style="background:none; border:none;" readonly="readonly" value="<?php echo $Composer; ?>" /></td>

          <td data-th="trackTime">
            <input type="text" name="trackTime" style="background:none; border:none;" readonly="readonly" value="<?php echo ''.$minutes.':'.$seconds.''; ?>" /></td>

          <td data-th="trackCost">
            <input type="text" name="trackCost" style="background:none; border:none;" readonly="readonly" value="<?php echo '$ '.$UnitPrice.''; ?>" /></td>

          <td data-th="purchaseSong">
            <input type="submit" style="color:black;" name="delete" value="Delete"></input></td>

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

  if(isset($_POST["deletetrackID"])){

    $TrackID = $_POST["deletetrackID"];

    $sql = "SELECT 1 FROM trackitem WHERE realtrackid = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('i', $TrackID);
    $stmt->execute();

    $row=$stmt->fetch();
    $ItemID=$row['ItemID'];

    $sql = "DELETE FROM shoppingcart WHERE ItemID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('i', $ItemID);
    $stmt->execute();

    $sql = "DELETE FROM trackitem WHERE realtrackid = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('i', $TrackID);
    $stmt->execute();

    $sql = "DELETE FROM track WHERE TrackId = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('i', $TrackID);
    $stmt->execute();

    $sql = "DELETE FROM playlisttrack WHERE TrackId = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('i', $TrackID);
    $stmt->execute();

    echo '<script type="text/javascript">alert("Track deleted!"); </script>';

  }

?>

</table>
</div>

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