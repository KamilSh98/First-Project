<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: Projekt.php');
		exit();
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
	<script type="text/javascript" src="timer.js"></script>
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
<BODY onload="odliczanie();">


	<a href="#" class="scrollup"></a>

	
	<header>
		<div class="ZdjNaglowek">
			<a href="Projekt.php" class="linknag"><img src="img/Logostrony.png" style="margin-top: 25px; margin-left: 100px;"></a>
		</div>
	
		<div class="NazwaNaglowek">
			<a href="Projekt.php" class="linknag"><p style="border-bottom: 5px double #000;"> FastPrint3D </a>
		</div>
		
		<div style="text-align: right;">
		<?php
			
			echo "<p>Witaj ".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
		?>
			<div id="zegar">
	
			</div>
		<?php
			echo "<p><b>E-mail</b>: ".$_SESSION['email'].'<br>';		
				
		?>
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
					<li><a class="nav-link" href="konto.php">Zmień dane</a></li>
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
		<h1 id="onas" style="color: #666; margin-top: 0px; border-bottom: 1px solid #666; background-color: #fff;">PRZYKŁADOWE WYDRUKI</h1>
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
				<label> Podaj adres email: <input type="email" name="adres" required></label>
				</br>
				<label> Prześlij projekt do wyceny: <input type="file"></label>
				</br></br>
				<label> Kolor wyrobu <input type="color" name="kolor" value="#666666"></label>
				</br>
				<textarea name="komentarz" id="komentarz" rows="4" cols="80" maxlength="25" placeholder="Uwagi do wyceny"></textarea>
				</br>
				<input type="submit" value="Wyceń!" class="Wyceń">
			</div>
		</header>
	</div>
	
	<div id="Cennik">
		<h1 id="onas" style="color: #fff; margin-top: 0px; border-bottom: 1px solid #000; color: #000;">CENNIK PROJEKTOWANIA</h1>
		<div style="margin-left: auto; margin-right: auto; text-align: center;">
			<div class="minzam">
				<h3 class="góra"> Minimalne zamówienie </h3>
				</br>
				<h2 class="dół"> 80 ZŁ NETTO </h2>
			</div>
			<div class="minzam2">
				<h3 class="góra"> Roboczogodzina </h3>
				</br>
				<h2 class="dół"> 40 ZŁ NETTO </h2>
			</div>
			<div style="clear:both"></div>
		</div>
		<p class="tekstonas2">Zdecydowanie najtańszą opcją dla klienta w przypadku wydruku 3D jest posiadanie własnego modelu 3D który możemy przygotować i wytworzyć.
		</br></br>
		Często jednak klienci zgłaszają się do nas z prośbą o przygotowanie projektu na podstawie realnego elementu, na bazie rysunków technicznych lub o przedstawienie własnej koncepcji. Oferujemy tego typu usługi, mamy za sobą wiele zleceń dla firm w formie zarówno inżynierii wstecznej, jak również w formie przygotowania własnego projektu od postaw.
		</p>
		<h1 id="onas" style="color: #fff; margin-top: 0px; border-bottom: 1px solid #000; color: #000; border-top: 1px solid #000">CENNIK DRUKU 3D </h1>
		<div class="minzam">
			<h3 class="góra2" style="margin-top: 10px;"> Minimalne zamówienie </h3>
			</br>
			<h2 class="dół2"> 40 ZŁ NETTO </h2>
		</div>
			<div class="minzam2">
			<h3 class="góra2"> Roboczogodzina </h3>
			</br>
			<h2 class="dół2"> 20 ZŁ NETTO </h2>
		</div>
		<div class="minzam3">
			<h3 class="góra2"> Materiał z naszych zasobów </h3>
			</br>
			<h2 class="dół2" style="margin-bottom: 0px;"> W CENIE </h2>
		</div>
	</div>
		
	<div style="clear:both"></div>
	</br></br>
		
	
	
	<div id="Kontakt">
		<div class="contact">
			<header>
				<h1 style="margin-top: 5px; border-bottom: 1px solid #fff;" >KONTAKT Z DRUKARNIĄ </h1>
				<p class="kontakt">Jeśli masz ochotę sporzystać z naszych usług - zapraszam do kontaktu mailowego. Proszę czekać cierpliwie na odpowiedź, zostanie ona wysłana niebawem. </p>
				</br></br>
			</header>
		</div>
		<div class="greybutton">
			<a href="Kontakt.php">Nawiązanie współpracy</a>
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
			Wszelkie prawa zastrzeżone &copy; 2021 Dziękujemy za wizytę!
	</div>
</footer>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>