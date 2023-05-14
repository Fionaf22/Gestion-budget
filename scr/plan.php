<?php
session_start();
// Les informations de connexion à la base de données

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gestion_argent');
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$login= 'yeonwoo';
$_SESSION['login']=  $login;
// Les données du formulaire

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



//if(isset($_SERVER['REQUEST_METHOD']) && ($_SERVER["REQUEST_METHOD"] == 'POST') && isset($_POST["bouton_budget_mois"])) {
$mois = test_input($_POST['mois']);
$loyer = test_input($_POST['loyer']);
$dette = test_input($_POST['dette']);
$facture = test_input($_POST['facture']);
$abonnement = test_input($_POST['abonnement']);
$assurance = test_input($_POST['assurance']);
$ecole = test_input($_POST['ecole']);
$autreFixe = test_input($_POST['autreFixe']);

$alimentation = test_input($_POST['alimentation']);
$essence = test_input($_POST['essence']);
$pharmacie = test_input($_POST['pharmacie']);
$garderie = test_input($_POST['garderie']);
$loisir = test_input($_POST['loisir']);
$autreCourante = test_input($_POST['autreCourante']);


$vetement = test_input($_POST['vetement']);
$cadeau = test_input($_POST['cadeau']);
$voiture = test_input($_POST['voiture']);
$vacances = test_input($_POST['vacances']);
$restaurant = test_input($_POST['restaurant']);
$cinema = test_input($_POST['cinema']);
$autreOccasionnelle = test_input($_POST['autreOccasionnelle']);

//}

// Connexion à la base de données
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}


// Création d'une table pour stocker les données du formulaire
$sql = "CREATE TABLE IF NOT EXISTS budget_" . $login . " (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    mois varchar (100) NOT NULL,
    loyer decimal(6,2),
    dette decimal(6,2),
    facture decimal(6,2),
    abonnement decimal(6,2),
    assurance decimal(6,2),
    ecole decimal(6,2),
    autreFixe decimal(6,2),
    alimentation decimal(6,2),
    essence decimal(6,2),
    pharmacie decimal(6,2),
    garderie decimal(6,2),
    loisir decimal(6,2),
    autreCourante decimal(6,2),
    vetement decimal(6,2),
    cadeau decimal(6,2),
    voiture decimal(6,2),
    vacances decimal(6,2),
    restaurant decimal(6,2),
    cinema decimal(6,2),
    autreOccasionnelle decimal(6,2),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!mysqli_query($conn, $sql)) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//$sql = "SELECT GROUP_CONCAT(CONCAT(\'`\', COLUMN_NAME, \'`\')) INTO @cols\n"
//  . "FROM information_schema.columns\n"
//. "WHERE table_name = \'gestion_argent.budget_" . $login . "\' AND COLUMN_NAME LIKE \'%_list\';\n"
//.SET @query = CONCAT(\'SELECT \', @cols, \' FROM gestion_argent.budget_" . $login . "\');PREPARE stmt FROM @query;EXECUTE stmt;DEALLOCATE PREPARE stmt;"


// Insertion des données du formulaire dans la table depenses
    $sqlMonth = "select mois from budget_" . $login . " where mois = '$mois'";
    $resultAll = $conn->query($sqlMonth);

    if (mysqli_num_rows($resultAll) > 0) {
        echo mysqli_num_rows($resultAll);
        $sql = "UPDATE `budget_" . $login . "` SET`mois`='$mois',`loyer`= $loyer,`dette`=$dette,`facture`=$facture,`abonnement`=$abonnement,`assurance`=$assurance,`ecole`=$ecole,
    `autreFixe`=$autreFixe,`alimentation`=$alimentation,`essence`=$essence,`pharmacie`=$pharmacie,`garderie`=$garderie,`loisir`=$loisir,
    `autreCourante`=$autreCourante,`vetement`=$vetement, `cadeau`=$cadeau,`voiture`=$voiture,`vacances`=$vacances,
    `restaurant`=$restaurant,`cinema`= $cinema,`autreOccasionnelle`= $autreOccasionnelle WHERE mois = '$mois';";
    } else {
        $sql = "INSERT INTO `gestion_argent`.budget_" . $login . " (mois, loyer, dette, facture, abonnement, assurance, ecole, autreFixe, alimentation, essence, pharmacie, garderie, loisir, autreCourante, vetement, cadeau, voiture, vacances, restaurant, cinema, autreOccasionnelle) VALUES ('$mois',$loyer,$dette,$facture, $abonnement, $assurance, $ecole, $autreFixe, $alimentation, $essence, $pharmacie, $garderie, $loisir, $autreCourante, $vetement, $cadeau, $voiture, $vacances, $restaurant, $cinema, $autreOccasionnelle)";
    }
    


    if (!mysqli_query($conn, $sql)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    header('Location: ./../Planificateur/plan.php');


mysqli_close($conn);
?>
</body>

</html>