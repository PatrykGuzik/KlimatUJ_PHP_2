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
	
	
	
	//Sprawdzenie imienia
	if(!(strlen($imie)>=3)){
		$_SESSION['checkName']='<span>To pole musi zawierać conajmiej 3 znaki</span>';
	}else unset($_SESSION['checkName']);
	
	//Sprawdzenie Tematu
	if(!strlen($temat)>=3){
		$_SESSION['checkTemat']='<span>To pole musi zawierać conajmiej 3 znaki</span>';
	}else unset($_SESSION['checkTemat']);
	
	//Sprawdzenie Wiadomości
	if(!strlen($wiad_t)>= 1){
		$_SESSION['checkMess']='<span>To pole nie może być puste</span>';
	}else unset($_SESSION['checkMess']);
	
	// Sprawdza czy ptaszek jest zaznaczony
	if(!isset($_POST["ptaszek"])){
		$_SESSION['ptaszek'] = '<span>Zaznacz ptaszka</span>';
	}else unset($_SESSION['ptaszek']);
	
	// Sprawdza poprawność emaila
	$sprawdz = '/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,15}$/';
	if(!preg_match($sprawdz, $email)){
		$_SESSION['checkEmail']='<span>Nieprawidłowy email</span>';
	}else unset($_SESSION['checkEmail']);
	
	// Sprawdzenie Captcha
	if(!strlen($captcha)==0){
		$_SESSION['checkCaptcha']='<span>Pozostaw puste pole</span>';
	}else unset($_SESSION['checkCaptcha']);
	
	
	
	//Wysyłanie maila
	
	$to= "p.guzik772@gmail.com";
	$subject = $temat;
	$messages= "wiadomość od: ".$imie." - ".$email.": ".$wiad_t;
	
	
	if(	!(isset($_SESSION['ptaszek']))&&
		!(isset($_SESSION['checkCaptcha']))&&
		!(isset($_SESSION['checkName']))&&
		!(isset($_SESSION['checkTemat']))&&
		!(isset($_SESSION['checkMess']))&&
		!(isset($_SESSION['checkEmail'])))
	{
		if( mail($to, $subject, $messages) ) {
			echo "Wiadomość wysłana!";
		}else{
			echo "Wysyłanie wiadomości nie powiodło się";
		}
			
	}else{
		header('Location: index.php?page=kontakt');
	}
		
	?>
</div>
		
	
		
