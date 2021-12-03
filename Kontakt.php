<!DOCTYPE HTML>
<html lang="pl">
<HEAD>
	<meta charset="Ut-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta http-equiv="X-UA-Compatible" content ="IE=edge,chrome=1" />
	<title>Drukarnia 3D - Kontakt</title>
	
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
	var NavY = $('#Nawigacja').offset().top;
	 
	var stickyNav = function(){
	var ScrollY = $(window).scrollTop();
		  
	if (ScrollY > NavY) { 
		$('#Nawigacja').addClass('sticky');
	} else {
		$('#Nawigacja').removeClass('sticky'); 
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
	<h1 id="onas" style="border-bottom: 1px solid #000;"> KONTAKT </h1>
	
	<div style="border-bottom: 50px;">
	
			<form method="post" name="contactform" action="mail.php">
									<div class="field half first">
										<label for="name"></label>
										<input style="margin-left: 800px;" type="text" name="name" id="name" placeholder="Imię i nazwisko" required/>
									</div>
									<div class="field half">
										<label for="email"></label>
										<input style="margin-left: 800px;" type="email" name="email" id="email" placeholder="Email" required/>
									</div>
									<div class="field">
										<label for="message"></label>
										<textarea style="margin-left: 800px;" name="message" id="message" rows="6" cols="40" placeholder="Wiadomość" required></textarea>
									</div>
									<ul class="actions">
										<li><input style="margin-left: 800px;" type="submit" name="submit" value="Wyślij" class="special" /></li>
										<li><input style="margin-left: 800px;" type="reset" value="Reset" /></li>
									</ul>
			</form>
	</div>
	<div style="border-top: 2px solid #666;">
		<div id="kontakty" style="margin-left: 470px; margin-top: 20px;">
			<p class="kontaktowo">
				<h2> Siedziba Rzeszów </h2>
				ul. Htmlowa 321
				</br></br>
				35-317 Rzeszów
				</br></br>
				Polska
				</br></br>	
				NIP: 7642143783
				</br></br>
				fastprint3d@info.pl
				</br></br>
				<h3>tel: +48 643 219 876</h3>
			</p>
		</div>
			
		<div id="kontakty" style="margin-left: 100px; margin-top: 20px;">
			<p class="kontaktowo">
				<h2> Siedziba Jarosław </h2>
				ul. Projektowa 357
				</br></br>
				22-317 Jarosław
				</br></br>
				Polska
				</br></br>	
				NIP: 7642143783
				</br></br>
				fastprint3d@info.pl
				</br></br>
				<h3>tel: +48 231 232 865</h3>
			</p>
		</div>
			
		<div id="kontakty" style="margin-left: 100px; margin-top: 20px;">
			<p class="kontaktowo" >
				<h2> Siedziba Przemyśl	</h2>
				ul. Cssowa 123
				</br></br>
				15-317 Przemyśl
				</br></br>
				Polska
				</br></br>	
				NIP: 7642143783
				</br></br>
				fastprint3d@info.pl
				</br></br>
				<h3>tel: +48 723 232 821</h3>
			</p>
		</div>
	</div>
		<div style="clear:both" style="margin-bottom: 20px;"></div>
		</br>
	</div>
</div>
	

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