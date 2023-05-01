<?php
session_start();
// Les informations de connexion à la base de données

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gestion_argent');
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Les données du formulaire

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  } 

$mois = test_input($_POST['mois']);
$loyer = test_input($_POST['loyer']);
$dettes = test_input($_POST['dettes']);
$facture = test_input($_POST['facture']);
$abonnement = test_input($_POST['abonnement']);
$assurances = test_input($_POST['assurances']);
$ecole = test_input($_POST['ecole']);
$autreFixes = test_input($_POST['autreFixes']);

$depFixes=[
    'mois' => $mois, 
    'loyer'=> $loyer ,
    'dettes'=> $dettes,
    'facture'=> $facture,
    'abonnement'=> $abonnement, 
    'assurances'=> $assurances, 
    'ecole'=> $ecole,
    'autreFixes'=> $autreFixes
];

$Alimentation = test_input($_POST['Alimentation']);
$Essence = test_input($_POST['Essence']);
$Pharmacie = test_input($_POST['Pharmacie']);
$Garderie = test_input($_POST['Garderie']);
$Loisirs = test_input($_POST['Loisirs']);
$autreCourantes = test_input($_POST['autreCourantes']);

$depCourantes=[
    'Alimentation' => $Alimentation, 
    'Essence'=> $Essence ,
    'Pharmacie'=> $Pharmacie,
    'Garderie'=> $Garderie,
    'Loisirs'=> $Loisirs, 
    'autreCourantes'=> $autreCourantes
];


$Vetement = test_input($_POST['Vetement']);
$Cadeaux = test_input($_POST['Cadeaux']);
$Voiture = test_input($_POST['Voiture']);
$Vacances = test_input($_POST['Vacances']);
$Restaurant = test_input($_POST['Restaurant']);
$Cinema = test_input($_POST['Cinema']);
$autreOccasionnelles = test_input($_POST['autreOccasionnelles']);

$depFixes=[
    'Vetement' => $Vetement, 
    'Cadeaux'=> $Cadeaux ,
    'Voiture'=> $Voiture,
    'Vacances'=> $Vacances,
    'Restaurant'=> $Restaurant, 
    'Cinema'=> $Cinema,
    'autreOccasionnelles'=> $autreOccasionnelles
];

// Connexion à la base de données
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}


$_SESSION['login']='shin';
$user=$_SESSION['login'];
// Création d'une table pour stocker les données du formulaire
$sql = "CREATE TABLE IF NOT EXISTS depense_" . $user . "(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    mois varchar (100) NOT NULL,
    loyer decimal(6,2),
    dettes decimal(6,2),
    facture decimal(6,2),
    abonnement decimal(6,2),
    assurances decimal(6,2),
    ecole decimal(6,2),
    autreFixes decimal(6,2),
    Alimentation decimal(6,2),
    Essence decimal(6,2),
    Pharmacie decimal(6,2),
    Garderie decimal(6,2),
    Loisirs decimal(6,2),
    autreCourantes decimal(6,2),
    Vetement decimal(6,2),
    Cadeaux decimal(6,2),
    Voiture decimal(6,2),
    Vacances decimal(6,2),
    Restaurant decimal(6,2),
    Cinema decimal(6,2),
    autreOccasionnelles decimal(6,2),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table créée avec succès";
} else {
    echo "Erreur de création de table: " . $conn->error;
}


//a modifier, chaque utilisateur à sa table et pour chaque utilisateur on cree une table,
// il y a une entree par mois à chaque modif de la tableon update le contenue. 
//à la base toue est zero mais quand on remplie le form une fois les valeurs de base 
//sont celle dernierement indiqué et chaque modif des valeur = update de la table.
//. "where depense_" . $user. ".mois =  2035"
$sqlMonth="select mois from depense_" . $user;
$resultAll = $conn->query($sqlMonth);

if (mysqli_num_rows($resultAll) > 0) {
	while($rowData = mysqli_fetch_array($resultAll)){
  		echo $rowData["mois"].'<br>';
	}
}


// Insertion des données du formulaire dans la table depenses
$sql = "INSERT INTO depense_" . $user . " (mois, loyer, dettes, facture, abonnement, assurances, ecole, autreFixes, Alimentation, Essence, Pharmacie, Garderie, Loisirs, autreCourantes, Vetement, Cadeaux, Voiture, Vacances, Restaurant, Cinema, autreOccasionnelles) VALUES ( \"$mois\", $loyer, $dettes, $facture, $abonnement, $assurances, $ecole, $autreFixes, $Alimentation, $Essence, $Pharmacie, $Garderie, $Loisirs, $autreCourantes, $Vetement, $Cadeaux, $Voiture, $Vacances, $Restaurant, $Cinema, $autreOccasionnelles)";
if (!mysqli_query($conn, $sql)) {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


// à chaque modif du formulaire, il faut update la table des données, nouvelle entree seulement si c'est pour un nouveau mois.
// faire un trigger after update, if new month = old month alors data are modified

//afficher les données dans un tableau



mysqli_close($conn);
?>
</body>
</html>
