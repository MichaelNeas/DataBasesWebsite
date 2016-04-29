<?php 
	include('includes/header.php');
?>

	<h2>Shopping Cart</h2>
	<div>
		<div>
			<input type="submit" name="cartCheckout" value="Process Shopping Cart" />
			<input type="submit" name="cartDelete" value="Delete Selected" />
		</div>
	

<!-- This is the baseline for a single song listing -->
		<div id="songItem">
			<a href="#" class="list-group-item">
				<div>
					<ol>
						<li id="sName">Song Name: Clear As Day</li>
						<li id="sArtist">Artist: Clairity </li>
						<li id="sAlbum">Album Name: Singing Alone</li>
						<li id="sGenre">Genre: Alternative</li>
						<li id="sPrice">Price: $1.99</li>
					</ol>
				</div>

				<div>
					<input type="checkbox" id="songDelete"> Mark for Deletion<br>
				</div>
			</a>
		</div>
	</div>

<?php
	include('../globalIncludes/footer.php');
	?>