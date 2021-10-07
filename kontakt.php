<?php
	session_start();
?>

<div id="kontakt_tresc">
	<p>Będzie nam bardzo miło, jeśli skontaktujecie się z nami w dowolnej sprawie
	   dotyczącej zielonej przyszłości UJ i nie tylko! Jesteśmy otwarte_ci na współpracę
	   z innymi inicjatywami uniwersyteckimi<p/>
</div>

<div id="formularz">
	
	<form action="index.php?page=send_mail" method="post">
		<textarea id="captcha" name="captcha"></textarea>
		
		<?php if(isset($_SESSION['checkName'])) {echo $_SESSION['checkName'];} ?>
		<input type="text" name="imie" placeholder="Imie"/>
		
		
		<?php if(isset($_SESSION['checkTemat'])) echo $_SESSION['checkTemat']; ?>
		<input type="text" name="temat" placeholder="Temat"/>
		
		
		<?php if(isset($_SESSION['checkEmail'])) echo $_SESSION['checkEmail']; ?>
		<input type="text" name="email" placeholder="Email"/> 
		
		
		<?php if(isset($_SESSION['checkMess'])) echo $_SESSION['checkMess']; ?>		
		<textarea id="wiad" name="wiad_t" placeholder="Wiadomość"></textarea>
		
		
		<?php if(isset($_SESSION['ptaszek'])) echo $_SESSION['ptaszek']; ?><br/>
		<div id="cont_zgoda">
		<div id="fajka"><input type="checkbox" name="ptaszek[]" value="true"/></div>
		<div id="zgoda">Wyrażam zgodę na przetwarzanie danyh osobo wychheg wuegwe ghwo rg wuhwrg wroighw orgw ble ble ble dfgdgfg  fgdfgd fg dfg gfg dfg gfdffd</div>
		</div>
			
		
		
		<input id="buttonSubmit" type="submit" value="wyślij">
	</form>
	
</div>
		