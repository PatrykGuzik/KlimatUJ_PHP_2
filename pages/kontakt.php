<?php
	session_start();
	
	if(isset($_POST['email']))
	{
		$imie = $_POST['imie']; 
		$temat = $_POST['temat']; 
		$email = $_POST['email']; 		 
		$wiad_t = $_POST['wiad_t'];
		$captcha = $_POST['captcha'];
		$is_OK = true;
		
		
		//Sprawdzenie imienia
		if(!(strlen($imie)>=3)||!(strlen($imie)<=20)){
			$_SESSION['e_name']='<span>To pole musi zawierać od 3 do 20 znaków</span>';
			$is_OK = false;
		}else unset($_SESSION['e_name']);
		
		//Sprawdzenie Tematu
		if(!strlen($temat)>=3||!(strlen($temat)<=20)){
			$_SESSION['e_temat']='<span>To pole musi zawierać od 3 do 20 znaków</span>';
			$is_OK = false;
		}else unset($_SESSION['e_temat']);
		
		// Sprawdza poprawność emaila
		$sprawdz = '/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,15}$/';
		if(!preg_match($sprawdz, $email)||!(strlen($email)<=30)){
			$_SESSION['e_email']='<span>Nieprawidłowy email</span>';
			$is_OK = false;
		}else unset($_SESSION['e_email']);
		
		//Sprawdzenie Wiadomości
		if(!strlen($wiad_t)>= 1){
			$_SESSION['e_mess']='<span>To pole nie może być puste</span>';
			$is_OK = false;
		}else unset($_SESSION['e_mess']);
		
		// Sprawdza czy ptaszek jest zaznaczony
		if(!isset($_POST["ptaszek"])){
			$is_OK = false;
			$_SESSION['e_checkbox'] = '<span>Zaznacz ptaszka</span>';
		}else unset($_SESSION['e_checkbox']);
		
		
		
		// Sprawdzenie Captcha
		if(!strlen($captcha)==0){
			$_SESSION['checkCaptcha']='<span>Pozostaw puste pole</span>';
			$is_OK = false;
		}else unset($_SESSION['checkCaptcha']);
		
		
		// RECAPTCHA
		$secret = "6Ld-nMMcAAAAACWHqSVvD-83sq17H1FbRgamqSFq";
		$check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
		
		$response = json_decode($check);
		
		if($response->success==false)
		{
			$is_OK = false;
			$_SESSION['e_bot'] = '<span>Potwierdź, że nie jesteś robotem</span>';
		}else unset($_SESSION['e_bot']);
		
		
		//Wysyłanie maila
		
		$to= "p.guzik772@gmail.com";
		$subject = $temat;
		$messages= "wiadomość od: ".$imie." - ".$email.": ".$wiad_t;
		
		
		if($is_OK == true)
		{
			if( mail($to, $subject, $messages) ) {
				header('Location: index.php?page=send_mail_ok');
			}else{
				header('Location: index.php?page=send_mail_error');
			}
			exit();
		}
		
	}
?>

<div id="kontakt_tresc">
	<p>Będzie nam bardzo miło, jeśli skontaktujecie się z nami w dowolnej sprawie
	   dotyczącej zielonej przyszłości UJ i nie tylko! Jesteśmy otwarte_ci na współpracę
	   z innymi inicjatywami uniwersyteckimi<p/>
</div>

<div id="formularz">
	
	<form method="post">
		<textarea id="captcha" name="captcha"></textarea>
		
		<?php 
			if(isset($_SESSION['e_name'])) echo $_SESSION['e_name'];
			unset($_SESSION['e_name']);
		?>
		<input type="text" name="imie" placeholder="Imię"/>
		
		
		<?php 
			if(isset($_SESSION['e_temat'])) echo $_SESSION['e_temat']; 
			unset($_SESSION['e_temat']);
		?>
		<input type="text" name="temat" placeholder="Temat"/>
		
		
		<?php 
			if(isset($_SESSION['e_email'])) echo $_SESSION['e_email']; 
			unset($_SESSION['e_email']);
		?>
		<input type="text" name="email" placeholder="Email"/> 
		
		
		<?php 
			if(isset($_SESSION['e_mess'])) echo $_SESSION['e_mess']; 
			unset($_SESSION['e_mess']);
		?>		
		<textarea id="wiad" name="wiad_t" placeholder="Wiadomość"></textarea>
		
		
		<?php 
			if(isset($_SESSION['e_checkbox'])) echo $_SESSION['e_checkbox']; 
			unset($_SESSION['e_checkbox']);
		?>
		
		
		<br/>
		<div id="cont_zgoda">
		<div id="fajka"><input type="checkbox" name="ptaszek[]" value="true"/></div>
		<div id="zgoda">Wyrażam zgodę na przetwarzanie moich danych osobowych (adresu e-mail oraz imienia) zawartych w zgłoszeniu w celu otrzymywania odpowiedzi na przekazane zapytanie. </div>
		</div>
			
		<?php 
			if(isset($_SESSION['e_bot'])) echo $_SESSION['e_bot']; 
			unset($_SESSION['e_bot']);
		?>	
		<div id="g_captcha">	
		<div class="g-recaptcha" data-sitekey="6Ld-nMMcAAAAALrGZy8FVOviJCuXSwhu9lsxoafq"></div>
		</div>
		
		
		<input id="buttonSubmit" type="submit" value="wyślij">
	</form>
	
</div>
		