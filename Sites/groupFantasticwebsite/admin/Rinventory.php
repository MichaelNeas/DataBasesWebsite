<?php 
  include('includes/header.php');
  ?>


	   <h2>Inventory Reporting</h2>



	<div>

    <div>
      <h3>Search for Songs</h3>
    </div>

    <div>

      <div>
          <label for="">Song Name: </label>
          <input type="text" id="iSearchName" />
      </div>

      <div >
        <label for="">Song Artist: </label>
        <input type="text" id="iSearchArtist" />
      </div>

      <div >
        <label for="">Album Name: </label>
        <input type="text" id="iSearchAlbum" />
      </div>

      <div>
        <label for="">Genre: </label>
        <input type="text" id="iSearchGenre" />
      </div>
    </div>

    <br>

    <div id="songItem">
      <a href="#" class="list-group-item">
        <div >
          <ol>
            <li id="siName">Song Name: </li>
            <li id="siArtist">Artist Name: </li>
            <li id="siAlbum">Album Name: </li>
            <li id="siGenre">Genre: </li>
            <li id="siType">Media Type: </li>
          </ol>
        </div>
      </a>
    </div>

<?php
  include('../globalIncludes/footer.php');
  ?>