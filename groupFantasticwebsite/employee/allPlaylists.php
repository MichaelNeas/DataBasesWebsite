<?php 
	include('includes/header.php');
	?>

	<h2>Employee Generated Playlists</h2>
		<button id="makePlaylist">Create New Global Playlist</button>
		<h5> Click object to show songs</h5>
		<div id="playlistItem">
			<a href="#" class="list-group-item">
				<div>
					<ol>
						<li id="pName">Playlist Name: </li>
						<li id="pCreator">Creator: </li>
						<li id="pMadeTime">Made: </li>
						<li id="pTheme">Theme: </li>
						<li id="pPrice">Total Price: </li>
					</ol>
				</div>

				<div id="modifyButtons">
					<button id="addSongs">Add Songs</button>
					<button id="editPlaylist">Edit Playlist Creditials</button>
					<button id="deletePlaylist">Delete Playlist</button>
				</div>
			</a>
		</div>

		<!--Songs in playlists-->
	<div class = "playListSongs" style="margin-left:40px; margin-right:40px; padding-top:0px; margin-top:-15px;">
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
		    <td data-th="removeSongPlaylist"><button id="removeSongPlaylist" style="color:black;">Remove</button></td>
		  </tr>
		  <tr>
		    <td data-th="Movie Title">Howard The Duck</td>
		    <td data-th="Genre">"Comedy"</td>
		    <td data-th="Year">1977</td>
		    <td data-th="Year">1986</td>
		    <td data-th="Gross">$16,295,774</td>
		    <td data-th="removeSongPlaylist"><button id="removeSongPlaylist" style="color:black;">Remove</button></td>
		  </tr>
		  <tr>
		    <td data-th="Movie Title">American Graffiti</td>
		    <td data-th="Genre">Comedy, Drama</td>
		    <td data-th="Year">1977</td>
		    <td data-th="Year">1973</td>
		    <td data-th="Gross">$115,000,000</td>
		    <td data-th="removeSongPlaylist"><button id="removeSongPlaylist" style="color:black;">Remove</button></td>
		  </tr>
		</table>
	</div>
	<!--Songs in playlist-->

	<!--add songs to playlist-->
	   			<div class="search">
   			<form style="border:none;">
      			<input type="text" class="searchTracks" placeholder="Tracks">
      			<input type="text" class="searchAlbums" placeholder="Albums">
      			<input type="text" class="searchArtists" placeholder="Artists">
      			<input type="text" class="searchGenres" placeholder="Genres">
      			<input type="submit" class="searchButton" value="Search"></input>
      			</form>
      		</div>

      		<div class = "searchResults"style="margin-left:40px; margin-right:40px; padding-top:0px; margin-top:-15px;">
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
		    <td data-th="addToPlaylist"><button id="addToPlaylist" style="color:black;">Add To Playlist</button></td>
		  </tr>
		  <tr>
		    <td data-th="Movie Title">Howard The Duck</td>
		    <td data-th="Genre">"Comedy"</td>
		    <td data-th="Year">1977</td>
		    <td data-th="Year">1986</td>
		    <td data-th="Gross">$16,295,774</td>
		    <td data-th="addToPlaylist"><button id="addToPlaylist" style="color:black;">Add To Playlist</button></td>
		  </tr>
		  <tr>
		    <td data-th="Movie Title">American Graffiti</td>
		    <td data-th="Genre">Comedy, Drama</td>
		    <td data-th="Year">1977</td>
		    <td data-th="Year">1973</td>
		    <td data-th="Gross">$115,000,000</td>
		    <td data-th="addToPlaylist"><button id="addToPlaylist" style="color:black;">Add To Playlist</button></td>
		  </tr>
		</table>

	</div>


	<h2>All Customer Created Playlists</h2>
		<div id="customerMyPlaylistItem">
			<a href="#" class="list-group-item">
				<div>
					<ol>
						<li id="pName">Playlist Name: </li>
						<li id="pCreator">Creator: </li>
						<li id="pMadeTime">Made: </li>
						<li id="pTheme">Genre: </li>
						<li id="pPrice">Total Price: </li>
					</ol>
				</div>

				<div id="modifyButtons">
					<button id="addSongs">Add Songs</button>
					<button id="editPlaylist">Edit Playlist Creditials</button>
					<button id="deletePlaylist">Delete Playlist</button>
				</div>
			</a>
		</div>
<?php
	include('../globalIncludes/footer.php');
	?>