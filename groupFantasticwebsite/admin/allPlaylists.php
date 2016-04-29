<?php 
	include('includes/header.php');
	?>

	<h2>Employee Generated Playlists</h2>
		<button id="makePlaylist">Create New Global Playlist</button>
	
			<button id="makePlaylist">Create New Playlist</button>
			<button id="destroyPlaylist">Remove Playlist</button>
		<h5> Click object to show songs</h5>
		<div id="playlistItem">
			<a href="#" class="list-group-item">
				<div>
					<ol>
						<li id="pName">Playlist Name: Awesome Playlist</li>
						<li id="pCreator">Creator: Leonie</li>
						<li id="pMadeTime">Made: Yesterday</li>
						<li id="pTheme">Theme: Feeling Good</li>
						<li id="pPrice">Total Price: $5.99</li>
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
		    <td data-th="Movie Title">Let's Go</td>
		    <td data-th="Genre">Greatest Hits</td>
		    <td data-th="Year">Lil Jon</td>
		    <td data-th="Year">Rap</td>
		    <td data-th="Gross">$0.99</td>
		    <td data-th="removeSongPlaylist"><button id="removeSongPlaylist" style="color:black;">Remove</button></td>
		  </tr>
		  <tr>
		    <td data-th="Movie Title">Gone</td>
		    <td data-th="Genre">Mess It</td>
		    <td data-th="Year">MGK</td>
		    <td data-th="Year">RAP</td>
		    <td data-th="Gross">$1.99</td>
		    <td data-th="removeSongPlaylist"><button id="removeSongPlaylist" style="color:black;">Remove</button></td>
		  </tr>
		  <tr>
		    <td data-th="Movie Title">Lose Yourself</td>
		    <td data-th="Genre">Behind A Curtain</td>
		    <td data-th="Year">Eminem</td>
		    <td data-th="Year">Hip-Hop</td>
		    <td data-th="Gross">$2.99</td>
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
		    <td data-th="Movie Title">Greatest Day</td>
		    <td data-th="Genre">Greatest Hits</td>
		    <td data-th="Year">Beatles</td>
		    <td data-th="Year">Rock</td>
		    <td data-th="Gross">$0.99</td>
		    <td data-th="addToPlaylist"><button id="addToPlaylist" style="color:black;">Add To Playlist</button></td>
		  </tr>
		  <tr>
		    <td data-th="Movie Title">Find Me</td>
		    <td data-th="Genre">Everyone Has Another</td>
		    <td data-th="Year">Silverstein</td>
		    <td data-th="Year">Rock</td>
		    <td data-th="Gross">FREE</td>
		    <td data-th="addToPlaylist"><button id="addToPlaylist" style="color:black;">Add To Playlist</button></td>
		  </tr>
		  <tr>
		    <td data-th="Movie Title">Box of Rain</td>
		    <td data-th="Genre">Steal your Face</td>
		    <td data-th="Year">Grateful Dead</td>
		    <td data-th="Year">Rock</td>
		    <td data-th="Gross">$1.99</td>
		    <td data-th="addToPlaylist"><button id="addToPlaylist" style="color:black;">Add To Playlist</button></td>
		  </tr>
		</table>

	</div>
	<!--Songs in playlist-->

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