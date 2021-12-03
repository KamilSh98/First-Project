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
		
		$projekt = $_POST['projekt'];
		$kolor = $_POST['kolor'];
		$uwagi = $_POST['uwagi'];
				
			
		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_projekt'] = $projekt;
		$_SESSION['fr_kolor'] = $kolor;
		$_SESSION['fr_uwagi'] = $uwagi;
		
		require_once "wycena.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
				if ($wszystko_OK==true)
				{
					
					if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$email', '$projekt', '$kolor', '$uwagi')"))
					{
						$_SESSION['udanarejestracja']=true;
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
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności, proszę spróbować za chwilę!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	}
	
	
?>