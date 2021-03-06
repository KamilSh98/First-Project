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
			
			echo "<p>Witaj ".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj si??!</a> ]</p>';
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
		
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Prze????cznik nawigacji">
				<span class="navbar-toggler-icon"></span>
			</button>
		
		
			<div class="collapse navbar-collapse" id="mainmenu">
			
				<ul class="navbar-nav mr-auto ">
					<li><a class="nav-link" href="Projekt.php">Strona g????wna</a></li>
					<li><a class="nav-link" href="#onas">O firmie</a></li>
					<li><a class="nav-link" href="#Us??ugi">Oferowane us??ugi</a></li>
					<li><a class="nav-link" href="#Przyk??adowe">Przyk??adowe wydruki</a></li>
					<li><a class="nav-link" href="#Wycena">Wycena wydruku</a></li>
					<li><a class="nav-link" href="#Cennik">Cennik</a></li>
					<li><a class="nav-link" href="FAQ.php">Najcz??strze pytania</a></li>						
					<li><a class="nav-link" href="#Kontakt">Kontakt</a>	
				</ul>
				<ul class="navbar-nav mr-5">	
					<li><a class="nav-link" href="konto.php">Zmie?? dane</a></li>
				</ul>
				<form class="form-inline">
				
					<input class="form-control mr-1" type="search" placeholder="Wyszukaj" aria-label="Wyszukaj">
					<button class="btn btn-light" type="submit">Znajd??</button>
				</form>
			
			
			</div>
		
		</nav>
	</header>
	
	<div class="G????wnaZawarto????">
	<article class="Artyku??">
	
		<h1 id="onas" style="border-bottom: 1px solid #000;"> O FIRMIE </h1>
		
		<p class="tekstonas">
			Nasza drukarnia 3D to zesp???? profesjonalist??w z pasj?? do tego, co robimy. Oferowane przez nas us??ugi drukowania 3D to innowacyjne rozwi??zania wraz z pe??nym wsparciem merytorycznym. Zadowolenie klienta jest dla nas najwa??niejsze, dlatego te?? stale si?? rozwijamy wdra??aj??c nowe technologie.
			</br></br>
			Ka??da nasza drukarka to nowoczesny sprz??t, pozwalaj??cy na szybk?? i sprawn?? realizacj?? zlece??. Profesjonalny druk 3D oferowany przez nasz?? firm?? to ??wie??e oraz kreatywne podej??cie do tematu. Wsp????praca ze specjalistami posiadaj??cymi du??e do??wiadczenie daje nam mo??liwo???? tworzenia modeli odpowiadaj??cych potrzebom ka??dego klienta. Jedynym ograniczeniem jest tutaj wyobra??nia.
			</br></br>
			Zakres wykorzystania tr??jwymiarowych element??w jest niemal nieograniczony i obejmuje w??a??ciwie dowoln?? bran????, od przemys??u, przez edukacj??, a?? po handel. Druk 3D umo??liwia mi??dzy innymi przygotowanie prototypu projektowanego rozwi??zania ??? w tym miejscu warto zaznaczy??, ??e nasze us??ugi obejmuj?? r??wnie?? szybkie prototypowanie. Dzi??ki temu, w ??atwy spos??b mo??liwe jest zaprojektowanie konkretnego rozwi??zania, przetestowanie go czy te?? stworzenie szczeg????owych, a jednocze??nie niedrogich makiet architektonicznych. Coraz cz????ciej z zalet tej technologii korzysta r??wnie?? medycyna, tworz??c modele umo??liwiaj??ce przygotowanie si?? do operacji.
			</br></br>
			Chcemy, aby nasze us??ugi druku 3D by??y jak najlepszej jako??ci, dlatego dbamy o ka??dy detal. Korzystamy z nowoczesnego sprz??tu i sprawdzonych materia????w, dzi??ki czemu nasze wydruki s?? niezwykle trwa??e, estetyczne oraz funkcjonalne. Zadowolenie klient??w jest dla nas najwa??niejsze, dlatego staramy si?? sprosta?? ka??demu, nawet najbardziej skomplikowanemu zleceniu.
			</br></br>	
			Dzi??ki zastosowaniu wysokiej jako??ci sprz??tu oraz materia????w, gwarantujemy naszym klientom realizacj?? zam??wie?? zgodnych w stu procentach z oczekiwaniami. Zach??camy wi??c serdecznie do skorzystania z do??wiadczenia naszych specjalist??w, dzi??ki kt??rym druk 3D na zam??wienie oferowany przez nasz?? firm?? wyr????nia si?? znakomit?? jako??ci??. Wszystko to dlatego, ??e druk 3D to nie tylko nasza praca, ale te?? pasja.
			</br></br>
			Wy??lij nam sw??j projekt, a otrzymasz porad?? w wyborze materia??u lub optymalnej technologii oraz szczeg????ow?? wycen?? druku 3D. Gwarantujemy terminow?? realizacj?? zlece?? z zachowaniem najwy??szej staranno??ci.	
		</p>
					
	</article>
	
		<div id="Us??ugi">
			<div class="Artyku??">
				<h1 id="onas" style="color: #fff; margin-top: 0px; border-bottom: 1px solid #fff; background-color: #666;">OFEROWANE US??UGI</h1>
				<p class="oferowane">
				Drukarnia 3D FastPrint oferuje us??ugi druku 3D wysokiej jako??ci w technologii FFF / FDM, DLP, LCD, SLA oraz SLS, kt??re s?? najbardziej optymaln?? metod?? wytwarzania zadanych modeli przy zachowaniu wymaganej tolerancji dla projektu.
				</br></br>
				Dzi??ki zapleczu naszych maszyn, jeste??my w stanie realizowa?? zar??wno pojedyncze zlecenia wydruku 3D, jak i kr??tkie serie produkcyjne.
				</br></br>
				Bardzo szeroki wachlarz mo??liwo??ci, jakie niesie za sob?? druk 3D przek??ada si?? na jego coraz wi??ksz?? popularno????, a co za tym idzie, r????norodno???? jego zastosowa??.
				Wykonujemy r????norodne projekty ??? od element??w wystroju wn??trz, poprzez odtwarzanie cz????ci maszyn i prototyp??w projektowanych przez naszych klient??w, po spersonalizowane gad??ety reklamowe.
				</br></br>
				Serdecznie zapraszamy do zapoznania si?? z nasz?? ofert??. Je??eli nie znale??li Pa??stwo projekt??w spe??niaj??cych Wasze oczekiwania, zapraszamy do kontaktu.
				</br></br>
				Z przyjemno??ci?? zmaterializujemy Wasz?? wizj??!
				</br></br>
				</p>
			</div>
		</div>
	
	<div id="Przyk??adowe">
		<h1 id="onas" style="color: #666; margin-top: 0px; border-bottom: 1px solid #666; background-color: #fff;">PRZYK??ADOWE WYDRUKI</h1>
		<div class="zbi??robr">
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
			<h1 id="onas" style="color: #fff; margin-top: 0px; border-bottom: 1px solid #fff;">WYCE?? KOSZT WYDRUKU</h1>
			<div style="text-align: center; color: #fff;">
				<label> Podaj adres email: <input type="email" name="adres" required></label>
				</br>
				<label> Prze??lij projekt do wyceny: <input type="file"></label>
				</br></br>
				<label> Kolor wyrobu <input type="color" name="kolor" value="#666666"></label>
				</br>
				<textarea name="komentarz" id="komentarz" rows="4" cols="80" maxlength="25" placeholder="Uwagi do wyceny"></textarea>
				</br>
				<input type="submit" value="Wyce??!" class="Wyce??">
			</div>
		</header>
	</div>
	
	<div id="Cennik">
		<h1 id="onas" style="color: #fff; margin-top: 0px; border-bottom: 1px solid #000; color: #000;">CENNIK PROJEKTOWANIA</h1>
		<div style="margin-left: auto; margin-right: auto; text-align: center;">
			<div class="minzam">
				<h3 class="g??ra"> Minimalne zam??wienie </h3>
				</br>
				<h2 class="d????"> 80 Z?? NETTO </h2>
			</div>
			<div class="minzam2">
				<h3 class="g??ra"> Roboczogodzina </h3>
				</br>
				<h2 class="d????"> 40 Z?? NETTO </h2>
			</div>
			<div style="clear:both"></div>
		</div>
		<p class="tekstonas2">Zdecydowanie najta??sz?? opcj?? dla klienta w przypadku wydruku 3D jest posiadanie w??asnego modelu 3D kt??ry mo??emy przygotowa?? i wytworzy??.
		</br></br>
		Cz??sto jednak klienci zg??aszaj?? si?? do nas z pro??b?? o przygotowanie projektu na podstawie realnego elementu, na bazie rysunk??w technicznych lub o przedstawienie w??asnej koncepcji. Oferujemy tego typu us??ugi, mamy za sob?? wiele zlece?? dla firm w formie zar??wno in??ynierii wstecznej, jak r??wnie?? w formie przygotowania w??asnego projektu od postaw.
		</p>
		<h1 id="onas" style="color: #fff; margin-top: 0px; border-bottom: 1px solid #000; color: #000; border-top: 1px solid #000">CENNIK DRUKU 3D </h1>
		<div class="minzam">
			<h3 class="g??ra2" style="margin-top: 10px;"> Minimalne zam??wienie </h3>
			</br>
			<h2 class="d????2"> 40 Z?? NETTO </h2>
		</div>
			<div class="minzam2">
			<h3 class="g??ra2"> Roboczogodzina </h3>
			</br>
			<h2 class="d????2"> 20 Z?? NETTO </h2>
		</div>
		<div class="minzam3">
			<h3 class="g??ra2"> Materia?? z naszych zasob??w </h3>
			</br>
			<h2 class="d????2" style="margin-bottom: 0px;"> W CENIE </h2>
		</div>
	</div>
		
	<div style="clear:both"></div>
	</br></br>
		
	
	
	<div id="Kontakt">
		<div class="contact">
			<header>
				<h1 style="margin-top: 5px; border-bottom: 1px solid #fff;" >KONTAKT Z DRUKARNI?? </h1>
				<p class="kontakt">Je??li masz ochot?? sporzysta?? z naszych us??ug - zapraszam do kontaktu mailowego. Prosz?? czeka?? cierpliwie na odpowied??, zostanie ona wys??ana niebawem. </p>
				</br></br>
			</header>
		</div>
		<div class="greybutton">
			<a href="Kontakt.php">Nawi??zanie wsp????pracy</a>
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
			Wszelkie prawa zastrze??one &copy; 2021 Dzi??kujemy za wizyt??!
	</div>
</footer>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>