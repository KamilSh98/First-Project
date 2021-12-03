<!DOCTYPE HTML>
<html lang="pl">
<HEAD>
	<meta charset="Ut-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta http-equiv="X-UA-Compatible" content ="IE=edge,chrome=1" />
	<title>Drukarnia 3D</title>
	
	<meta name="description" content="Drukarnia 3D - Logowanie" />
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
				</ul>
				<ul class="navbar-nav mr-5">	
					<li><a class="nav-link" href="Rejestracja.php">Rejestracja</a></li>
				</ul>
				<form class="form-inline">
				
					<input class="form-control mr-1" type="search" placeholder="Wyszukaj" aria-label="Wyszukaj">
					<button class="btn btn-light" type="submit">Znajdź</button>
				</form>
			
			
			</div>
		
		</nav>
	
	</header>
</div>

	<div class="GłównaZawartość">	
	<?php

		$to      = 'hydrandthedog@gmail.com';
		$name    = $_POST['name'];
		$email   = $_POST['email'];
		$subject = 'Nowy e-mail od ' . $name . ' (' . $email . ')';
		$message = $_POST['message'];
		$headers = 'From: ' . $name . ' (' . $email . ')';
		$headers .= 'Content-Type: text/html; charset=utf-8';

		mail($to, $subject, $message, $headers);
		?>

	</br></br></br></br></br></br>
	<h1 id="onas" style="margin-top: 20px;"> Email został pomyślnie wysłany!</h1>
	</br>
	<h2 style="text-align: center; color: #666;"> <a style="color: #666;" href="Projekt.php">Kliknij, aby powrócić do strony głownej!</a></h2>
	</br></br></br></br></br></br>

</div>

</br>
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
