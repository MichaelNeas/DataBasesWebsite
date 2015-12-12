<?php 
	include('includes/header.php');
	?>

	<h2>Sales Report</h2>
	
	<div id="quickReports">
	<h3>Quick Reports</h3>
		<div id="totals">
			<button id="totalDownloads">Total Downloads</button>
			<button id="totalPlays">Total Plays</button>
			<button id="totalSales">Total Sales</button>
		</div>
		<br>
		<div id="tops">
			<button id="topSongs">Top Songs</button>
			<button id="topArtists">Top Artists</button>
			<button id="topGenres">Top Genres</button>
			<button id="topAlbums">Top Albums</button>
			<button id="topPlaylists">Top Playlists</button>
		</div>
		<br>
		<div id="worst">
			<button id="worstSongs">Worst Songs</button>
			<button id="worstArtists">Worst Artists</button>
			<button id="worstGenres">Worst Genres</button>
			<button id="worstAlbums">Worst Albums</button>
			<button id="worstPlaylists">Worst Playlists</button>
		</div>
	</div>	


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
		    <th>Amount Sold</th>
		    <th>Total Revenue</th>
		    <th>Most Recently Sold</th>
		    <th>Rating</th>

		  </tr>
		  <tr>
		    <td data-th="trackReport">Juicy</td>
		    <td data-th="albumReport">Be Like Biggie</td>
		    <td data-th="artistReport">Biggie Smalls</td>
		    <td data-th="genreReport">Rap</td>
		    <td data-th="amountSold">999,999</td>
		    <td data-th="totalRevenue">$1,000,000</td>
		   	<td data-th="mostRecent">Today</td>
		    <td data-th="rating">5 stars</td>
		  </tr>
		</table>

	</div>

	
<?php
	include('../globalIncludes/footer.php');
	?>