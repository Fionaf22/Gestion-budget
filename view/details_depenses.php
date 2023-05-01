<?php
session_start();
if(isset($_SESSION['username'])) {
    echo "Your session is running " . $_SESSION['username'];
    }

?>
<html>
<head>
<title>Ajout depense</title>
<link href="./../styles/depense_list.css" rel="stylesheet"/>
<link href="./../styles/header.css" rel="stylesheet"/>
</head>
<body>
<header class="HeaderHomepage">
		  <div class="nav_bar">
			  <?php include './../scr/menu.php';?>
		  </div>
		  <div class="middle_header">
			  <div class="search_bar"><form><input type="text" placeholder="Search.."></form></div>
			  <h1 class="main_title">The worrisome optimist</h1>
		  </div>
      <div class="picture_logo_header"><a href="./../Main/home-page.php"><img src="./../Main/logo_home.png" title="The worrisome optimist" alt="logo du site" > </a></div>
    </header>
<?php

$conn = mysqli_connect("localhost","root","","gestion_argent");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

// define variables and set to empty values
//$Username=$couleur_depense = $detail_depense_text = $date_depense = $type_depense = $montant_depense_number = "";
$Username='shin';
$idDepense = $_GET['idDepense'];
$sql="SELECT * FROM $Username where idDepense = $idDepense";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $couleur_depense = $row['couleur_depense'];
?>
    <div class="depense_item  <?php echo $row['couleur_depense']; ?>-border">
    <?php
    echo "Date : ".$row["date_depense"]."<br>";
    echo "Nom : ".$row["detail_depense_text"]."<br>";
    echo "Montant : ".$row["montant_depense_number"]." €<br>";
    echo "Type : ".$row["type_depense"]."<br>";
    echo "Information complémentaire : ".$row["note_depense"]."<br>";
    ?>
    </div>
    <?php
  }
}
      else {
        echo "0 results";
    }


   

mysqli_close($conn);

?>