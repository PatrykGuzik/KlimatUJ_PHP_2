<div id="cont_artykuly">
	<?php
		include("artykuly_lista.php");
		
		
		
		for ($i = 0; $i <= 5; $i++) {
			include($articles[$i]);
		}
		
		
	?>		
	
	<div id="art_pages">
		<a class="art_pages" href="index.php?page=artykuly" style="color:#F8C129"> 1 </a>
		<a class="art_pages" href="index.php?page=artykuly_2"> 2 </a>
		<a class="art_pages" href="index.php?page=artykuly_3"> 3 </a>
		<a class="art_pages" href="index.php?page=artykuly_4"> 4 </a>
	</div>
</div>		
