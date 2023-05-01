<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
	<link href="./../styles/home-page.css" rel="stylesheet">
	<link href="./../styles/header.css" rel="stylesheet">
	<title>Homepage - The worrisome optimist</title>
</head>

<body>
	<header class=HeaderHomepage>
		<div class="nav_bar">
			<?php include './../scr/menu.php';?>
		</div>
		<div class="middle_header">
			<div class="search_bar"><form><input type="text" placeholder="Search.."></form></div>
			<h1 class="main_title">The worrisome optimist</h1>
		</div>
		<div class="picture_logo_header"><a href="./../Main/home-page.php"><img src="./../Main/logo_home.png" title="The worrisome optimist" alt="logo du site" > </a></div>
	</header>


	<section class="ArticleMainpage">
		<h2>Ajouter une dépense</h2>
		<article class="articleHomepage" >
			<div><a href="./../Depenses/ajout_depense.php"> <img src="./../Depenses/notebook.png" alt="Cahier_depense" class="pictureArticle"> </a></div>
		</article>


		<h2>Depense du mois</h2>
		<article class="articleHomepage">
    		<div><a href="./../Depenses/Calendar.php"><img src="Calendrier_date.png" title="titre-article" alt="imageRepresentantArticle" class="pictureArticle"> </a></div>
		</article>

	</section>

	<aside class="AsideHomepage">
		<h2 class="titleAside">Budget mensuel</h2>
		<article class="Goal">Vous avez dépensé ??? € ce mois ci.
			<div><a href="./../Planificateur/prevision.php"><img src="Budget_prevision.png" title="titre-article" alt="imageRepresentantArticle" class="pictureArticle"> </a></div>
		</article>
		<div class="Date_du_jour">  <?php include ('./../scr/home-page-bis.php'); ?></div>
		
		
	</aside>

	<footer class="footerHomepage">
		<p>bas de bage</p>
	</footer>
</body>
</html>