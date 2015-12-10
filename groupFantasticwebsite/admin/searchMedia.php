<?php 
	include('includes/header.php');
	?>
<h2>Search Media</h2>
   			<div class="search">
   			<form style="border:none;">
      			<input type="text" class="searchTracks" placeholder="Tracks">
      			<input type="text" class="searchAlbums" placeholder="Albums">
      			<input type="text" class="searchArtists" placeholder="Artists">
      			<input type="text" class="searchGenres" placeholder="Genres">
      			<input type="submit" class="searchButton" value="Search"></input>
      			</form>
      		</div>

      		<div class = "searchResults">
				<h1>Search Results </h1>
		<table class="rwd-table">
		  <tr>
		    <th>Track</th>
		    <th>Album</th>
		    <th>Artist</th>
		    <th>Genre</th>
		    <th>Price</th>

		  </tr>
		  <tr>
		    <td data-th="Movie Title">Star Wars</td>
		    <td data-th="Genre">Adventure, Sci-fi</td>
		    <td data-th="Year">1977</td>
		    <td data-th="Year">1977</td>
		    <td data-th="Gross">$460,935,665</td>
		    <td data-th="removeSong"><button id="removeSong" style="color:black;">Delete</button></td>
		  </tr>
		  <tr>
		    <td data-th="Movie Title">Howard The Duck</td>
		    <td data-th="Genre">"Comedy"</td>
		    <td data-th="Year">1977</td>
		    <td data-th="Year">1986</td>
		    <td data-th="Gross">$16,295,774</td>
		    <td data-th="removeSong"><button id="removeSong" style="color:black;">Delete</button></td>
		  </tr>
		  <tr>
		    <td data-th="Movie Title">American Graffiti</td>
		    <td data-th="Genre">Comedy, Drama</td>
		    <td data-th="Year">1977</td>
		    <td data-th="Year">1973</td>
		    <td data-th="Gross">$115,000,000</td>
		    <td data-th="removeSong"><button id="removeSong" style="color:black;">Delete</button></td>
		  </tr>
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