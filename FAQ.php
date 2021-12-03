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

<div>
	<h1 id="onas" style="border-bottom: 1px solid #000;"> NAJCZĘSTRZE PYTANIA </h1>
	
	<div>
<?php

include('arrays.php');
?>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<script>
$(document).ready(function() {

    $('.faq_question').click(function() {

        if ($(this).parent().is('.open')){
            $(this).closest('.faq').find('.faq_answer_container').animate({'height':'0'},500);
            $(this).closest('.faq').removeClass('open');

            }else{
                var newHeight =$(this).closest('.faq').find('.faq_answer').height() +'px';
                $(this).closest('.faq').find('.faq_answer_container').animate({'height':newHeight},500);
                $(this).closest('.faq').addClass('open');
            }

    });

});
</script>
<style>
.faq_question {
    padding: 0px 0px 0px 0px;
    display: inline-block;
    cursor: pointer;
	margin-left: 50px;
	font-size: 10px;
	letter-spacing: 2px;
	font-size: 15px;
}

.faq_answer_container {
	height: 0px;
	padding: 0px 0px 10px 0px;
    overflow: hidden;
	color: #444;
	margin-left: 100px;
	margin-bottom: 15px;
	margin-top: 15px;
}

</style>

<div class="faq_container">
   <div class="faq">
      <div class="faq_question"> <?php
        foreach($faqArrays as $faqArray){

            echo "<h1>$faqArray[question]</h1>";
        }
       ;?>
      </div>
           <div class="faq_answer_container">
				<div class="faq_answer"><?php
    foreach($faqArrays as $faqArray){

        echo "<h1>$faqArray[answer]</h1>";
    }
   ;?>			</div>
           </div>        
    </div>

	<div class="faq">
      <div class="faq_question"> <?php
        foreach($faqArrays2 as $faqArray2){

            echo "<h1>$faqArray2[question]</h1>";

        }
       ;?>
      </div>
           <div class="faq_answer_container">
				<div class="faq_answer"><?php
    foreach($faqArrays2 as $faqArray2){

        echo "<h1>$faqArray2[answer]</h1>";

    }
   ;?>			</div>
           </div>        
    </div>
	
		<div class="faq">
      <div class="faq_question"> <?php
        foreach($faqArrays3 as $faqArray3){

            echo "<h1>$faqArray3[question]</h1>";

        }
       ;?>
      </div>
           <div class="faq_answer_container">
				<div class="faq_answer"><?php
    foreach($faqArrays3 as $faqArray3){

        echo "<h1>$faqArray3[answer]</h1>";

    }
   ;?>			</div>
           </div>        
    </div>
	
		<div class="faq">
      <div class="faq_question"> <?php
        foreach($faqArrays4 as $faqArray4){

            echo "<h1>$faqArray4[question]</h1>";

        }
       ;?>
      </div>
           <div class="faq_answer_container">
				<div class="faq_answer"><?php
    foreach($faqArrays4 as $faqArray4){

        echo "<h1>$faqArray4[answer]</h1>";

    }
   ;?>			</div>
           </div>        
    </div>
	
		<div class="faq">
      <div class="faq_question"> <?php
        foreach($faqArrays5 as $faqArray5){

            echo "<h1>$faqArray5[question]</h1>";

        }
       ;?>
      </div>
           <div class="faq_answer_container">
				<div class="faq_answer">
	<?php foreach($faqArrays5 as $faqArray5){

        echo "<h1>$faqArray5[answer]</h1>";

    }
   ;?>			</div>
           </div>        
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