<?php 
	include('includes/header.php');
	?>
<h2 style="text-align:center;"> Media</h2>

<div id = "massiveSearchContainer">

<h3>Search Tracks</h3>
        <div class="search">
        <form style="border:none;" method="post">
            <input type="text" class="searchTracks" name="searchTracks" required placeholder="Tracks">
            <input type="submit" class="searchButton" name="searchSongs" value="Search"></input>
            </form>
          </div>


<h3>Search Tracks and Genre</h3>
        <div class="search">
        <form style="border:none;" method="post">
            <input type="text" class="searchTracks" name="searchTracks" required placeholder="Tracks">
            <input type="text" class="searchGenres" name="searchGenres" required placeholder="Genres">
            <input type="submit" class="searchButton" name="searchSongsGenres" value="Search"></input>
            </form>
        </div>


<h3>Search Album</h3>
<div class="search">
        <form style="border:none;" method="post">
            <input type="text" class="searchAlbums" name="searchAlbums" required placeholder="Albums">
            <input type="submit" class="searchButton" name="searchAlbum" value="Search"></input>
            </form>
          </div>


<h3>Search Album and Genre</h3>
<div class="search">
        <form style="border:none;" method="post">
            <input type="text" class="searchAlbums" name="searchAlbums" required placeholder="Albums">
            <input type="text" class="searchGenres" name="searchGenres" required placeholder="Genres">
            <input type="submit" class="searchButton" name="searchAlbumGenre" value="Search"></input>
            </form>
          </div>

<h3>Search Artists</h3>
<div class="search">
        <form style="border:none;" method="post">
            <input type="text" class="searchArtists" name="searchArtists" required placeholder="Artists">
            <input type="submit" class="searchButton" name="searchArtist" value="Search"></input>
            </form>
          </div>

<h3>Search Artists and Genre</h3>
<div class="search">
        <form style="border:none;" method="post">
            <input type="text" class="searchArtists" name="searchArtists" required placeholder="Artists">
            <input type="text" class="searchGenres" name="searchGenres" required placeholder="Genres">
            <input type="submit" class="searchButton" name="searchArtistGenres" value="Search"></input>
            </form>
          </div>

      <h1>Search Results </h1>
    <table>
      <tr>
        <th>Song</th>
        <th>Artist</th>
        <th>Album</th>
        <th>Time</th>
        <th>Price</th>
        </tr>

<?php   
    //echo $_POST['personID'];
    if(isset($_POST["searchSongs"])){
        $trackName = $_POST['searchTracks'];
        $trackName = "%" .$trackName. "%";
        //echo $trackName;
            $query = "SELECT Artist.name, album.title, track.name, track.Milliseconds,track.unitprice from track join chinook.album on album.albumid = track.albumid AND track.name LIKE ? join chinook.artist on artist.artistid = album.artistid ORDER BY track.name ASC";
            if($stmt = $con->prepare($query)){
            $stmt->bind_param("s", $trackName); 
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($artistName, $albumTitle, $trackName, $trackTime, $UnitPrice);
            while($stmt->fetch()){

            $input = $trackTime;

            $uSec = $input % 1000;
            $input = floor($input / 1000);

            $seconds = $input % 60;
            $input = floor($input / 60);

            $minutes = $input % 60;
            $input = floor($input / 60);

            echo "<tr>
          <form style=\"border:none;\" method=\"post\">

          <input type=\"hidden\" name=\"buytrackID\" value=\"$TrackID\" />

          <td data-th=\"trackName\" style=\"padding:0;\">
            <input type=\"text\" name=\"buytrackName\" style=\"background:none; border:none; padding-left:0;\" readonly=\"readonly\" value=\"$trackName\" /></td>

          <td data-th=\"trackComposer\">
            <input type=\"text\" name=\"buytrackComposer\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"$artistName\" /></td>

          <td data-th=\"trackAlbum\">
            <input type=\"text\" name=\"buytrackComposer\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"$albumTitle\" /></td>

          <td data-th=\"trackTime\">
            <input type=\"text\" name=\"buytrackTime\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"    $minutes:$seconds\" /></td>

          <td data-th=\"trackCost\">
            <input type=\"text\" name=\"buytrackCost\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"$   $UnitPrice\" /></td>
 
        </form>
      </tr>";

            }

    }
    $con->close();
  }

 
    if(isset($_POST["searchSongsGenres"])){
        $trackName = $_POST['searchTracks'];
        $trackName = "%" .$trackName. "%";
        $genreName = $_POST['searchGenres'];
        $genreName = "%" .$genreName. "%";
        $query ="SELECT Artist.name, album.title, track.name, track.Milliseconds,track.unitprice from track
join chinook.album on album.albumid = track.albumid AND album.title like ?
join chinook.artist on artist.artistid = album.artistid
join chinook.genre on genre.genreid = track.genreid AND genre.name like ?";
            if($stmt = $con->prepare($query)){
            $stmt->bind_param("ss", $trackName, $genreName); 
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($artistName, $albumTitle, $trackName, $trackTime, $UnitPrice);
            while($stmt->fetch()){

            $input = $trackTime;

            $uSec = $input % 1000;
            $input = floor($input / 1000);

            $seconds = $input % 60;
            $input = floor($input / 60);

            $minutes = $input % 60;
            $input = floor($input / 60);

            echo "<tr>
          <form style=\"border:none;\" method=\"post\">

          <input type=\"hidden\" name=\"buytrackID\" value=\"$TrackID\" />

          <td data-th=\"trackName\" style=\"padding:0;\">
            <input type=\"text\" name=\"buytrackName\" style=\"background:none; border:none; padding-left:0;\" readonly=\"readonly\" value=\"$trackName\" /></td>

          <td data-th=\"trackComposer\">
            <input type=\"text\" name=\"buytrackComposer\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"$artistName\" /></td>

          <td data-th=\"trackAlbum\">
            <input type=\"text\" name=\"buytrackComposer\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"$albumTitle\" /></td>

          <td data-th=\"trackTime\">
            <input type=\"text\" name=\"buytrackTime\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"    $minutes:$seconds\" /></td>

          <td data-th=\"trackCost\">
            <input type=\"text\" name=\"buytrackCost\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"$   $UnitPrice\" /></td>  
        </form>
      </tr>";

            }

    }
    $con->close();
  }

 
    if(isset($_POST["searchAlbum"])){
        $trackName = $_POST['searchAlbums'];
        $trackName = "%" .$trackName. "%";
        $query ="SELECT Artist.name, album.title, track.name, track.Milliseconds,track.unitprice from track
join chinook.album on album.albumid = track.albumid AND album.title LIKE ?
join chinook.artist on artist.artistid = album.artistid";
            if($stmt = $con->prepare($query)){
            $stmt->bind_param("s", $trackName); 
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($artistName, $albumTitle, $trackName, $trackTime, $UnitPrice);
            while($stmt->fetch()){

            $input = $trackTime;

            $uSec = $input % 1000;
            $input = floor($input / 1000);

            $seconds = $input % 60;
            $input = floor($input / 60);

            $minutes = $input % 60;
            $input = floor($input / 60);

            echo "<tr>
          <form style=\"border:none;\" method=\"post\">

          <input type=\"hidden\" name=\"buytrackID\" value=\"$TrackID\" />

          <td data-th=\"trackName\" style=\"padding:0;\">
            <input type=\"text\" name=\"buytrackName\" style=\"background:none; border:none; padding-left:0;\" readonly=\"readonly\" value=\"$trackName\" /></td>

          <td data-th=\"trackComposer\">
            <input type=\"text\" name=\"buytrackComposer\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"$artistName\" /></td>

          <td data-th=\"trackAlbum\">
            <input type=\"text\" name=\"buytrackComposer\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"$albumTitle\" /></td>

          <td data-th=\"trackTime\">
            <input type=\"text\" name=\"buytrackTime\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\" $minutes:$seconds\" /></td>

          <td data-th=\"trackCost\">
            <input type=\"text\" name=\"buytrackCost\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"$    $UnitPrice\" /></td>
  
        </form>
      </tr>";

            }

    }
    $con->close();
  }

 
    if(isset($_POST["searchAlbumGenre"])){
        $trackName = $_POST['searchAlbums'];
        $trackName = "%" .$trackName. "%";
        $genreName = $_POST['searchGenres'];
        $genreName = "%" .$genreName. "%";
        $query ="SELECT Artist.name, album.title, track.name, track.Milliseconds,track.unitprice from track
join chinook.album on album.albumid = track.albumid AND album.title like ?
join chinook.artist on artist.artistid = album.artistid
join chinook.genre on genre.genreid = track.genreid AND genre.name like ?";
            if($stmt = $con->prepare($query)){
            $stmt->bind_param("ss", $trackName, $genreName); 
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($artistName, $albumTitle, $trackName, $trackTime, $UnitPrice);
            while($stmt->fetch()){

            $input = $trackTime;

            $uSec = $input % 1000;
            $input = floor($input / 1000);

            $seconds = $input % 60;
            $input = floor($input / 60);

            $minutes = $input % 60;
            $input = floor($input / 60);

            echo "<tr>
          <form style=\"border:none;\" method=\"post\">

          <input type=\"hidden\" name=\"buytrackID\" value=\"$TrackID\" />

          <td data-th=\"trackName\" style=\"padding:0;\">
            <input type=\"text\" name=\"buytrackName\" style=\"background:none; border:none; padding-left:0;\" readonly=\"readonly\" value=\"$trackName\" /></td>

          <td data-th=\"trackComposer\">
            <input type=\"text\" name=\"buytrackComposer\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"$artistName\" /></td>

          <td data-th=\"trackAlbum\">
            <input type=\"text\" name=\"buytrackComposer\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"$albumTitle\" /></td>

          <td data-th=\"trackTime\">
            <input type=\"text\" name=\"buytrackTime\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"    $minutes:$seconds\" /></td>

          <td data-th=\"trackCost\">
            <input type=\"text\" name=\"buytrackCost\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"$    $UnitPrice\" /></td>
       
        </form>
      </tr>";

            }

    }
    $con->close();
  }

 
    if(isset($_POST["searchArtist"])){
        $trackName = $_POST['searchArtists'];
        $trackName = "%" .$trackName. "%";
        $query ="SELECT Artist.name, album.title, track.name, track.Milliseconds,track.unitprice from track
join chinook.album on album.albumid = track.albumid
join chinook.artist on artist.artistid = album.artistid AND artist.name = ?";
            if($stmt = $con->prepare($query)){
            $stmt->bind_param("s", $trackName); 
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($artistName, $albumTitle, $trackName, $trackTime, $UnitPrice);
            while($stmt->fetch()){

            $input = $trackTime;

            $uSec = $input % 1000;
            $input = floor($input / 1000);

            $seconds = $input % 60;
            $input = floor($input / 60);

            $minutes = $input % 60;
            $input = floor($input / 60);

            echo "<tr>
          <form style=\"border:none;\" method=\"post\">

          <input type=\"hidden\" name=\"buytrackID\" value=\"$TrackID\" />

          <td data-th=\"trackName\" style=\"padding:0;\">
            <input type=\"text\" name=\"buytrackName\" style=\"background:none; border:none; padding-left:0;\" readonly=\"readonly\" value=\"$trackName\" /></td>

          <td data-th=\"trackComposer\">
            <input type=\"text\" name=\"buytrackComposer\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"$artistName\" /></td>

          <td data-th=\"trackAlbum\">
            <input type=\"text\" name=\"buytrackComposer\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"$albumTitle\" /></td>

          <td data-th=\"trackTime\">
            <input type=\"text\" name=\"buytrackTime\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"    $minutes:$seconds\" /></td>

          <td data-th=\"trackCost\">
            <input type=\"text\" name=\"buytrackCost\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"'$ $UnitPrice\" /></td>
          
        </form>
      </tr>";

            }

    }
    $con->close();
  }

 
    if(isset($_POST["searchArtistGenres"])){
        $trackName = $_POST['searchArtists'];
        $trackName = "%" .$trackName. "%";
        $genreName = $_POST['searchGenres'];
        $genreName = "%" .$genreName. "%";
        $query ="SELECT Artist.name, album.title, track.name, track.Milliseconds,track.unitprice from track
join chinook.album on album.albumid = track.albumid
join chinook.artist on artist.artistid = album.artistid AND artist.name like ?
join chinook.genre on genre.genreid = track.genreid AND genre.name like ?";
            if($stmt = $con->prepare($query)){
            $stmt->bind_param("ss", $trackName, $genreName); 
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($artistName, $albumTitle, $trackName, $trackTime, $UnitPrice);
            while($stmt->fetch()){

            $input = $trackTime;

            $uSec = $input % 1000;
            $input = floor($input / 1000);

            $seconds = $input % 60;
            $input = floor($input / 60);

            $minutes = $input % 60;
            $input = floor($input / 60);

            echo "<tr>
          <form style=\"border:none;\" method=\"post\">

          <input type=\"hidden\" name=\"buytrackID\" value=\"$TrackID\" />

          <td data-th=\"trackName\" style=\"padding:0;\">
            <input type=\"text\" name=\"buytrackName\" style=\"background:none; border:none; padding-left:0;\" readonly=\"readonly\" value=\"$trackName\" /></td>

          <td data-th=\"trackComposer\">
            <input type=\"text\" name=\"buytrackComposer\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"$artistName\" /></td>

          <td data-th=\"trackAlbum\">
            <input type=\"text\" name=\"buytrackComposer\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"$albumTitle\" /></td>

          <td data-th=\"trackTime\">
            <input type=\"text\" name=\"buytrackTime\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"$minutes:$seconds\" /></td>

          <td data-th=\"trackCost\">
            <input type=\"text\" name=\"buytrackCost\" style=\"background:none; border:none;padding:0px;\" readonly=\"readonly\" value=\"$     $UnitPrice\" /></td>

        </form>
      </tr>";

            }

    }
    $con->close();
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