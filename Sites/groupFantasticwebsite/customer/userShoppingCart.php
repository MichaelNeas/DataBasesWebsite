<?php 
	include('includes/header.php');
?>

	<h2>Shopping Cart</h2>
	<div>
		<div>
			<input type="submit" name="cartCheckout" value="Go to Checkout" />
			<input type="submit" name="cartDelete" value="Delete Selected" />
		</div>
	

<!-- This is the baseline for a single song listing -->
		<div id="songItem">
			<a href="#" class="list-group-item">
				<div>
					<ol>
						<li id="sName">Song Name: </li>
						<li id="sArtist">Artist: </li>
						<li id="sAlbum">Album Name: </li>
						<li id="sGenre">Genre: </li>
						<li id="sPrice">Price: </li>
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