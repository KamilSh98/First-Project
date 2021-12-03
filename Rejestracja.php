<?php

	session_start();
	
	if (isset($_POST['email']))
	{
		$wszystko_OK=true;
		$nick = $_POST['nick'];
		
		if ((strlen($nick)<8) || (strlen($nick)>25))
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nazwa login musi posiadać od 8 do 25 znaków!";
		}
	
		if (ctype_alnum($nick)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nazwa login może składać się tylko z liter i cyfr";
		}
		
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Prosze podać poprawny adres e-mail!";
		}
		
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>25))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 25 znaków!";
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}	

		$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
		
		$wszystko_OK=true;
		
		$phone = $_POST['phone'];
		
		if ((strlen($phone)<9) || (strlen($phone)>9))
		{
			$wszystko_OK=false;
			$_SESSION['e_phone']="Numer telefonu musi posiadać 9 liczb!";
		}
		
		if (!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Potwierdź regulamin!";
		}				
			
		$_SESSION['fr_nick'] = $nick;
		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_haslo1'] = $haslo1;
		$_SESSION['fr_haslo2'] = $haslo2;
		$_SESSION['fr_phone'] = $phone;
		
		if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
		
		require_once "connect.php";
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
				
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}		

				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_nick']="Istnieje już użytkownik o takim nicku! Wybierz inny.";
				}
				
				
				if ($wszystko_OK==true)
				{
					
					if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$haslo_hash', '$email', '$phone')"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: witamy.php');
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

<!DOCTYPE HTML>
<html lang="pl">
<HEAD>
	<meta charset="Ut-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta http-equiv="X-UA-Compatible" content ="IE=edge,chrome=1" />
	<title>Drukarnia 3D</title>
	
	<meta name="description" content="Drukarnia 3D - Rejestracja" />
	<meta name="keywords" content="drukarnia, druk, skan, drukarnia 3d, 3d" />
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<link rel="stylesheet" href="css/fontello.css" type="text/css"/>
	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script src="jquery.scrollTo.min.js"></script>
	
<script>
	jQuery(function($)
		{
			$.scrollTo(0);
	
			$('.scrollup').click(function() { $.scrollTo($('body'), 500); });
		}
		);
		
			$(window).scroll(function()
		{
			if($(this).scrollTop()>200) $('.scrollup').fadeIn();
			else $('.scrollup').fadeOut();		
		}
		);
</script>

<script src="jquery-1.11.3.min.js"></script>


<script>

	$(document).ready(function() {
	var NavY = $('#mainmenu').offset().top;
	 
	var stickyNav = function(){
	var ScrollY = $(window).scrollTop();
		  
	if (ScrollY > NavY) { 
		$('#mainmenu').addClass('sticky');
	} else {
		$('#mainmenu').removeClass('sticky'); 
	}
	};
	 
	stickyNav();
	 
	$(window).scroll(function() {
		stickyNav();
	});
	});
	
</script>

<style>
{
	color:red;
	margin-top: 10px;
	margin-bottom: 10px;
}	
</style>
</HEAD>
<BODY>

	<a href="#" class="scrollup"></a>

	
	<header>
	
		<div class="ZdjNaglowek">
			<a href="Projekt.php" class="linknag"><img src="img/Logostrony.png" style="margin-top: 25px; margin-left: 100px;"></a>
		</div>
	
		<div class="NazwaNaglowek">
			<a href="Projekt.php" class="linknag"><p style="border-bottom: 5px double #000;"> FastPrint3D </a>
		</div>
	
		<div style="clear: both;"></div>
	
		<nav class="navbar navbar-dark bg-jumpers navbar-expand-lg">
		
			<a class="navbar-brand" href="Projekt.php"> FastPrint </a>
		
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
				<span class="navbar-toggler-icon"></span>
			</button>
		
		
			<div class="collapse navbar-collapse" id="mainmenu">
			
				<ul class="navbar-nav mr-auto ">
					<li><a class="nav-link" href="Projekt.php">Strona główna</a></li>
				</ul>
				<ul class="navbar-nav mr-5">	
					<li><a class="nav-link" href="Logowanie.php">Logowanie</a></li>
				</ul>
				<form class="form-inline">
				
					<input class="form-control mr-1" type="search" placeholder="Wyszukaj" aria-label="Wyszukaj">
					<button class="btn btn-light" type="submit">Znajdź</button>
				</form>
			
			
			</div>
		++
		</nav>
	
	</header>
	
	<div class="GłównaZawartość">
	<h1 id="onas" style="border-bottom: 1px solid #000;"> REJESTRACJA </h1>
		<div id="zaloguj" style="text-align: center; margin-top: 15px;">
			<form method="post">
			
				<input type="text" placeholder="Login" onfocus="this.placeholder=' '" onblur="this.placeholder='Login'" value="<?php
					if (isset($_SESSION['fr_nick']))
					{
						echo $_SESSION['fr_nick'];
						unset($_SESSION['fr_nick']);
					}
				?>" name="nick" /><br />
				
				<?php
					if (isset($_SESSION['e_nick']))
					{
						echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
						unset($_SESSION['e_nick']);
					}
				?>
				
				<input type="text" placeholder="Email" onfocus="this.placeholder=' '" onblur="this.placeholder='Email'"  value="<?php
					if (isset($_SESSION['fr_email']))
					{
						echo $_SESSION['fr_email'];
						unset($_SESSION['fr_email']);
					}
				?>" name="email" /><br />
				
				<?php
					if (isset($_SESSION['e_email']))
					{
						echo '<div class="error">'.$_SESSION['e_email'].'</div>';
						unset($_SESSION['e_email']);
					}
				?>
				
				<input type="password"  placeholder="Twoje hasło" onfocus="this.placeholder=' '" onblur="this.placeholder='Twoje hasło'" value="<?php
					if (isset($_SESSION['fr_haslo1']))
					{
						echo $_SESSION['fr_haslo1'];
						unset($_SESSION['fr_haslo1']);
					}
				?>" name="haslo1" /><br />
				
				<?php
					if (isset($_SESSION['e_haslo']))
					{
						echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
						unset($_SESSION['e_haslo']);
					}
				?>		
				
				<input type="password" placeholder="Powtórz hasło" onfocus="this.placeholder=' '" onblur="this.placeholder='Powtórz hasło'" value="<?php
					if (isset($_SESSION['fr_haslo2']))
					{
						echo $_SESSION['fr_haslo2'];
						unset($_SESSION['fr_haslo2']);
					}
				?>" name="haslo2" /><br />
				
				<input type="text" placeholder="Numer telefonu" onfocus="this.placeholder=' '" onblur="this.placeholder='Numer telefonu'" value="<?php
					if (isset($_SESSION['fr_phone']))
					{
						echo $_SESSION['fr_phone'];
						unset($_SESSION['fr_phone']);
					}
				?>" name="phone" /><br />
				
				<?php
					if (isset($_SESSION['e_phone']))
					{
						echo '<div class="error">'.$_SESSION['e_phone'].'</div>';
						unset($_SESSION['e_phone']);
					}
				?>
				
				<label>
					<input type="checkbox" name="regulamin" <?php
					if (isset($_SESSION['fr_regulamin']))
					{
						echo "checked";
						unset($_SESSION['fr_regulamin']);
					}
						?>/> Akceptuję regulamin
				</label>
				</br>
				
				<?php
					if (isset($_SESSION['e_regulamin']))
					{
						echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
						unset($_SESSION['e_regulamin']);
					}
				?>	
				
				<input type="submit" value="Zarejestruj się" />
				<input type="reset" value="Wyczyść formularz"></input>
				
			</form>
		</div>
	</div>

	<footer id="stopka">
		<div class="social">
			<div class="col-sm-12">
				<div class="fb">
					<a href="http://facebook.com" target= "_blank" class="sociallink">
					<i class="icon-facebook"></i>
				</div>
				<div class="yt">
					<a href="http://youtube.com" target= "_blank" class="sociallink">
					<i class="icon-youtube"></i>
				</div>
				<div class="tw">
					<a href="http://twitter.com" target= "_blank" class="sociallink">
					<i class="icon-twitter"></i>
				</div>
				<div class="gplus">
					<a href="http://google.com" target= "_blank" class="sociallink">
					<i class="icon-gplus"></i>
				</div>
				<div style="clear:both"></div>
			</div>
		</div>
		<div class="info">
				Wszelkie prawa zastrzeżone &copy; 2021 Dziękujemy za wizytę!
		</div>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
	
	
</BODY>
</html>