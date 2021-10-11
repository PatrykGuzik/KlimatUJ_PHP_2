<?php
	session_start();
?>


<div id="wyslany">
	<?php
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
	
	//Sprawdzenie Wiadomości
	if(!strlen($wiad_t)>= 1){
		$_SESSION['e_mess']='<span>To pole nie może być puste</span>';
		$is_OK = false;
	}else unset($_SESSION['e_mess']);
	
	// Sprawdza czy ptaszek jest zaznaczony
	if(!isset($_POST["e_checkbox"])){
		$_SESSION['e_checkbox'] = '<span>Zaznacz ptaszka</span>';
		$is_OK = false;
	}else unset($_SESSION['e_checkbox']);
	
	// Sprawdza poprawność emaila
	$sprawdz = '/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,15}$/';
	if(!preg_match($sprawdz, $email)||!(strlen($email)<=30)){
		$_SESSION['e_email']='<span>Nieprawidłowy email</span>';
		$is_OK = false;
	}else unset($_SESSION['e_email']);
	
	// Sprawdzenie Captcha
	if(!strlen($captcha)==0){
		$_SESSION['checkCaptcha']='<span>Pozostaw puste pole</span>';
		$is_OK = false;
	}else unset($_SESSION['checkCaptcha']);
	
	
	
	//Wysyłanie maila
	
	$to= "p.guzik772@gmail.com";
	$subject = $temat;
	$messages= "wiadomość od: ".$imie." - ".$email.": ".$wiad_t;
	
	
	if($is_OK == true)
	{
		if( mail($to, $subject, $messages) ) {
			echo "Wiadomość wysłana!";
		}else{
			echo "Wysyłanie wiadomości nie powiodło się";
		}
			
	}else{
		header('Location: index.php?page=kontakt');
	}
	exit();
		
	?>
</div>
		
	
		
