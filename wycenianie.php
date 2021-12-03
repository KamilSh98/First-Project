<?php

	session_start();
	
	if (isset($_POST['email']))
	{
		$wszystko_OK=true;
		
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Prosze podać poprawny adres e-mail!";
		}
		
		$wszystko_OK=true;
		
		$projekt = $_POST['projekt'];
		$uwagi = $_POST['uwagi'];
		
		
		if (!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Potwierdź regulamin!";
		}				
			
		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_projekt'] = $projekt;
		$_SESSION['fr_uwagi'] = $uwagi;
		
		if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
		
		require_once "wycena.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				
				$rezultat = $polaczenie->query("SELECT id FROM wycena WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Możliwe jest wykonanie tylko jednej oceny na przypisany adres e-mail!";
				}						
				
				if ($wszystko_OK==true) 
				{
					if ($polaczenie->query("INSERT INTO wycena (email,projekt,uwagi) VALUES ('" . $email . "', '" . $projekt . "', '" . $uwagi . "')"))
					{
						$_SESSION['udanawycena']=true;
						header('Location: Wykonane.php');
					}
					else
					{
						throw new Exception($polaczenie->error);	
					}
				}
							
				$polaczenie->close();
			}
		
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
	}
	
?>