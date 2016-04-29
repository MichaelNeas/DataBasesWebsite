
<div class="list-group">
	<?php 
		foreach($navItems as $item){
			echo "<a href=\"$item[slug] \" class='list-group-item' > $item[title]</a>";
		}
	?>
</div>
