<div id="cont_artykuly">
	<?php
		include("artykuly_lista.php");
		
		for ($i = 6; $i <= 10; $i++) {
			include($articles[$i]);
		}
	?>		
	
	<div class="art_pages">
		<li><a href="index.php?page=artykuly"> 1 </a></li>
		<li><a href="index.php?page=artykuly_2" style="color:#F8C129"> 2 </a></li>
	</div>
</div>		