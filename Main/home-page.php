<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
	<link href="./../styles/home-page.css" rel="stylesheet">
	<link href="./../styles/header.css" rel="stylesheet">
	<link href="./../styles/footer.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title>Homepage - The worrisome optimist</title>
</head>

<body>
<header class="HeaderHomepage">

<?php include './../scr/menu.php';?>
  
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

<!--footer-->
<?php include './../scr/footer.php'; ?>
</body>
</html>