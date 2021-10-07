<div id="cont_artykuly">
	<?php
		include("artykuly_lista.php");
		
		
		
		for ($i = 6; $i <= 10; $i++) {
			include($articles[$i]);
		}
		
		
	?>		
	
	<div id="art_pages">
		<a class="art_pages" href="index.php?page=artykuly"> 1 </a>
		<a class="art_pages" href="index.php?page=artykuly_2" style="color:#F8C129"> 2 </a>
		<a class="art_pages" href="index.php?page=artykuly_3"> 3 </a>
		<a class="art_pages" href="index.php?page=artykuly_4"> 4 </a>
	</div>
</div>		