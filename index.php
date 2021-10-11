<?php
	(empty($_GET['page'])) ?  $url = "home" : $url = $_GET['page'];
	$file = "pages/".$url.".php";
	

	include("modules/main_header.php");

	
	if(file_exists($file))
	{
		include($file);
	}else{
		
		Echo "Error, strona nie istnieje";
	}
	
	
	include("modules/main_footer.php");
?>