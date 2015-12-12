<?php 
  include('includes/header.php');
  ?>

	   <h2>Inventory Report</h2>
	<div>
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
        <th>Date Added</th>
        <th>Uploaded By</th>

      </tr>
      <tr>
        <td data-th="trackInv">Zither</td>
        <td data-th="albumInv">My Way Home</td>
        <td data-th="artistInv">Zithering</td>
        <td data-th="genreInv">Rock</td>
        <td data-th="priceInv">$460,935,665</td>
        <td data-th="dateInv">1974</td>
        <td data-th="uploadedBy">Mike</td>
      </tr>

    </table>

  </div>

<?php
  include('../globalIncludes/footer.php');
  ?>