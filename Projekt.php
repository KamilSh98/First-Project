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

<!DOCTYPE HTML>
<html lang="pl">
<HEAD>
	<meta charset="Ut-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta http-equiv="X-UA-Compatible" content ="IE=edge,chrome=1" />
	<title>Drukarnia 3D</title>
	
	<meta name="description" content="Drukarnia 3D" />
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
		
			<a class="navbar-brand" href="#"> FastPrint </a>
		
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
				<span class="navbar-toggler-icon"></span>
			</button>
		
		
			<div class="collapse navbar-collapse" id="mainmenu">
			
				<ul class="navbar-nav mr-auto ">
					<li><a class="nav-link" href="Projekt.php">Strona główna</a></li>
					<li><a class="nav-link" href="#onas">O firmie</a></li>
					<li><a class="nav-link" href="#Usługi">Oferowane usługi</a></li>
					<li><a class="nav-link" href="#Przykładowe">Przykładowe wydruki</a></li>
					<li><a class="nav-link" href="#Wycena">Wycena wydruku</a></li>
					<li><a class="nav-link" href="#Cennik">Cennik</a></li>	
					<li><a class="nav-link" href="FAQ.php">Najczęstrze pytania</a></li>	
					<li><a class="nav-link" href="#Kontakt">Kontakt</a>	
				</ul>
				<ul class="navbar-nav mr-5">	
					<li><a class="nav-link" href="Logowanie.php">Logowanie</a></li>
					<li><a class="nav-link" href="Rejestracja.php">Rejestracja</a></li>
				</ul>
				<form class="form-inline">
				
					<input class="form-control mr-1" type="search" placeholder="Wyszukaj" aria-label="Wyszukaj">
					<button class="btn btn-light" type="submit">Znajdź</button>
				</form>
			
			
			</div>
		
		</nav>
	</header>
	
	<div class="GłównaZawartość">
	<article class="Artykuł">
	
		<h1 id="onas" style="border-bottom: 1px solid #000;"> O FIRMIE </h1>
		
		<p class="tekstonas">
			Nasza drukarnia 3D to zespół profesjonalistów z pasją do tego, co robimy. Oferowane przez nas usługi drukowania 3D to innowacyjne rozwiązania wraz z pełnym wsparciem merytorycznym. Zadowolenie klienta jest dla nas najważniejsze, dlatego też stale się rozwijamy wdrażając nowe technologie.
			</br></br>
			Każda nasza drukarka to nowoczesny sprzęt, pozwalający na szybką i sprawną realizację zleceń. Profesjonalny druk 3D oferowany przez naszą firmę to świeże oraz kreatywne podejście do tematu. Współpraca ze specjalistami posiadającymi duże doświadczenie daje nam możliwość tworzenia modeli odpowiadających potrzebom każdego klienta. Jedynym ograniczeniem jest tutaj wyobraźnia.
			</br></br>
			Zakres wykorzystania trójwymiarowych elementów jest niemal nieograniczony i obejmuje właściwie dowolną branżę, od przemysłu, przez edukację, aż po handel. Druk 3D umożliwia między innymi przygotowanie prototypu projektowanego rozwiązania – w tym miejscu warto zaznaczyć, że nasze usługi obejmują również szybkie prototypowanie. Dzięki temu, w łatwy sposób możliwe jest zaprojektowanie konkretnego rozwiązania, przetestowanie go czy też stworzenie szczegółowych, a jednocześnie niedrogich makiet architektonicznych. Coraz częściej z zalet tej technologii korzysta również medycyna, tworząc modele umożliwiające przygotowanie się do operacji.
			</br></br>
			Chcemy, aby nasze usługi druku 3D były jak najlepszej jakości, dlatego dbamy o każdy detal. Korzystamy z nowoczesnego sprzętu i sprawdzonych materiałów, dzięki czemu nasze wydruki są niezwykle trwałe, estetyczne oraz funkcjonalne. Zadowolenie klientów jest dla nas najważniejsze, dlatego staramy się sprostać każdemu, nawet najbardziej skomplikowanemu zleceniu.
			</br></br>	
			Dzięki zastosowaniu wysokiej jakości sprzętu oraz materiałów, gwarantujemy naszym klientom realizację zamówień zgodnych w stu procentach z oczekiwaniami. Zachęcamy więc serdecznie do skorzystania z doświadczenia naszych specjalistów, dzięki którym druk 3D na zamówienie oferowany przez naszą firmę wyróżnia się znakomitą jakością. Wszystko to dlatego, że druk 3D to nie tylko nasza praca, ale też pasja.
			</br></br>
			Wyślij nam swój projekt, a otrzymasz poradę w wyborze materiału lub optymalnej technologii oraz szczegółową wycenę druku 3D. Gwarantujemy terminową realizację zleceń z zachowaniem najwyższej staranności.	
		</p>
					
	</article>
	
		<div id="Usługi">
			<div class="Artykuł">
				<h1 id="onas" style="color: #fff; margin-top: 0px; border-bottom: 1px solid #fff; background-color: #666;">OFEROWANE USŁUGI</h1>
				<p class="oferowane">
				Drukarnia 3D FastPrint oferuje usługi druku 3D wysokiej jakości w technologii FFF / FDM, DLP, LCD, SLA oraz SLS, które są najbardziej optymalną metodą wytwarzania zadanych modeli przy zachowaniu wymaganej tolerancji dla projektu.
				</br></br>
				Dzięki zapleczu naszych maszyn, jesteśmy w stanie realizować zarówno pojedyncze zlecenia wydruku 3D, jak i krótkie serie produkcyjne.
				</br></br>
				Bardzo szeroki wachlarz możliwości, jakie niesie za sobą druk 3D przekłada się na jego coraz większą popularność, a co za tym idzie, różnorodność jego zastosowań.
				Wykonujemy różnorodne projekty – od elementów wystroju wnętrz, poprzez odtwarzanie części maszyn i prototypów projektowanych przez naszych klientów, po spersonalizowane gadżety reklamowe.
				</br></br>
				Serdecznie zapraszamy do zapoznania się z naszą ofertą. Jeżeli nie znaleźli Państwo projektów spełniających Wasze oczekiwania, zapraszamy do kontaktu.
				</br></br>
				Z przyjemnością zmaterializujemy Waszą wizję!
				</br></br>
				</p>
			</div>
		</div>
	
	<div id="Przykładowe">
		<h1 id="onas" style="color: #666; margin-top: 0px; border-bottom: 1px solid #666; background-color: #fff; height: 50px;">PRZYKŁADOWE WYDRUKI</h1>
		<div class="zbiórobr">
			<div class="obrazy">
				<a><img src="img/P1.jpg" style="margin-left: 250px;"></a>
			</div>
			<div class="obrazy">
				<a><img src="img/P4.jpg" style="margin-left: 250px;"></a>
			</div>
			<div style="clear: both"></div>
			<div class="obrazy">
				<a><img src="img/P3.jpg" style="margin-left: 250px;"></a>
			</div>
			<div class="obrazy">
				<a><img src="img/P2.jpg" style="margin-left: 250px;"></a>
			</div>
			<div style="clear: both"></div>
		</div>
	</div>
	
	<div id="Wycena">
		<header>
			<h1 id="onas" style="color: #fff; margin-top: 0px; border-bottom: 1px solid #fff;">WYCEŃ KOSZT WYDRUKU</h1>
			<div style="text-align: center; color: #fff;">
			<form method="post">
				<label> Podaj adres email: <input type="email" name="email"  value="<?php
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
				?></label>
				
				</br>
				
				<label> Prześlij projekt do wyceny: <input type="file" value="<?php
					if (isset($_SESSION['fr_projekt']))
					{
						echo $_SESSION['fr_projekt'];
						unset($_SESSION['fr_projekt']);
					}
				?>" name="projekt" /><br />
				
				<?php
					if (isset($_SESSION['e_projekt']))
					{
						echo '<div class="error">'.$_SESSION['e_projekt'].'</div>';
						unset($_SESSION['e_projekt']);
					}
				?></label>
				
				</br>
				
				<textarea id="uwagi" rows="3" cols="80" maxlength="25" placeholder="Uwagi do wyceny" value="<?php
					if (isset($_SESSION['fr_uwagi']))
					{
						echo $_SESSION['fr_uwagi'];
						unset($_SESSION['fr_uwagi']);
					}
				?>" name="uwagi" />
				
				<?php
					if (isset($_SESSION['e_uwagi']))
					{
						echo '<div class="error">'.$_SESSION['e_uwagi'].'</div>';
						unset($_SESSION['e_uwagi']);
					}
				?> </textarea>
				</br>
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
				
				</br>
				
				<input type="submit" value="Wyceń!" class="Wyceń" name="submit">
			</form>
			</div>
		</header>
	</div>
	
	<div id="Cennik">
		<h1 id="onas" style="color: #fff; margin-top: 0px; border-bottom: 1px solid #000; color: #000;">CENNIK PROJEKTOWANIA</h1>
		<div style="margin-left: auto; margin-right: auto; text-align: center;">
			<div class="minzam">
				<h3 class="góra" style="text-align: center;"> Minimalne zamówienie </h3>
				</br>
				<h2 class="dół" style="text-align: center;"> 80 ZŁ NETTO </h2>
			</div>
			<div class="minzam2">
				<h3 class="góra" style="text-align: center;"> Roboczogodzina </h3>
				</br>
				<h2 class="dół" style="text-align: center; margin-bottom: 15px;"> 40 ZŁ NETTO </h2>
			</div>
			<div style="clear:both"></div>
		</div>
		<p class="tekstonas2">Zdecydowanie najtańszą opcją dla klienta w przypadku wydruku 3D jest posiadanie własnego modelu 3D który możemy przygotować i wytworzyć.
		</br></br>
		Często jednak klienci zgłaszają się do nas z prośbą o przygotowanie projektu na podstawie realnego elementu, na bazie rysunków technicznych lub o przedstawienie własnej koncepcji. Oferujemy tego typu usługi, mamy za sobą wiele zleceń dla firm w formie zarówno inżynierii wstecznej, jak również w formie przygotowania własnego projektu od postaw.
		</p>
		<h1 id="onas" style="color: #fff; margin-top: 0px; border-bottom: 1px solid #000; color: #000; border-top: 1px solid #000">CENNIK DRUKU 3D </h1>
		<div class="minzam">
			<h3 class="góra2" style="margin-top: 10px; text-align: center;"> Minimalne zamówienie </h3>
			</br>
			<h2 class="dół2" style="text-align: center;"> 40 ZŁ NETTO </h2>
		</div>
			<div class="minzam2">
			<h3 class="góra2" style="text-align: center;"> Roboczogodzina </h3>
			</br>
			<h2 class="dół2" style="text-align: center;"> 20 ZŁ NETTO </h2>
		</div>
		<div class="minzam3">
			<h3 class="góra2" style="text-align: center;"> Materiał z naszych zasobów </h3>
			</br>
			<h2 class="dół2" style="margin-bottom: 0px; text-align: center;"> W CENIE </h2>
		</div>
	</div>
		
	<div style="clear:both"></div>
	</br></br>
		
	
	
	<div id="Kontakt" style="height: 250px;">
		<div class="contact">
			<header>
				<h1 style="margin-top: 5px; border-bottom: 1px solid #fff;" >KONTAKT Z DRUKARNIĄ </h1>
				<p class="kontakt">Jeśli masz ochotę sporzystać z naszych usług - zapraszam do kontaktu mailowego. Proszę czekać cierpliwie na odpowiedź, zostanie ona wysłana niebawem. </p>
				</br>
			</header>
		</div>
		<div>
		<a href="Kontakt.php" class="kontakt1" style="color: #fff; text-decoration:none; background-color: #fff; font-size: 20px; ">
		<p class="kontakt2" style="width: 200px; border-radius: 15px; border: 3px solid #fff; margin-left: auto; margin-right: auto; letter-spacing: 1px; outline: none;">Nawiązanie współpracy</p></a>
		</div>
	</div>
</div>

<div style="clear: both;"></div>
<footer id="stopka">
	<div class="social">
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
	<div class="info">
			Ta strona została odwiedzona
		<?php
		$fp = fopen("licznik.txt", "r+");
		$count = fgets($fp);
		$count = $count + 1;
		fseek($fp, 0);
		fputs($fp, $count);
		fclose($fp);
		echo(" $count ");
		?>
		razy od 04 listopada 2009 roku.
			Wszelkie prawa zastrzeżone &copy; 2021 Dziękujemy za wizytę!
	</div>
</footer>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>