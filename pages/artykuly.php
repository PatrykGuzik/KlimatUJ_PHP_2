<div id="cont_artykuly">
	<?php
		include("artykuly_lista.php");
		
		
		
		for ($i = 0; $i <= 5; $i++) {
			include($articles[$i]);
		}
		
		
	?>		
	
	<div class="art_pages">
		<li><a href="index.php?page=artykuly" style="color:#F8C129"> 1 </a></li>
		<li><a href="index.php?page=artykuly_2"> 2 </a></li>
	</div>
</div>		
