<?php
session_start();
$login= 'yeonwoo';
$_SESSION['login']=  $login;
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gestion_argent');
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


$depFixes = [
  'loyer' => 'Loyer',
  'dette' => 'Rembousement crédit',
  'facture' => 'Factures',
  'abonnement' => 'Abonnements',
  'assurance' => 'Assurances',
  'ecole' => 'Education',
  'autreFixe' => 'Autres Dépenses Fixes'
];
$depCourantes = [
  'alimentation' => 'Alimentation',
  'essence' => 'Essence',
  'pharmacie' => 'Pharmacie',
  'garderie' => 'Garderie',
  'loisir' => 'Loisirs',
  'autreCourante' => 'Autres Dépenses Courantes'
];
$depOccasionnelles = [
  'vetement' => 'Vêtements',
  'cadeau' => 'Cadeaux',
  'voiture' => 'Entretien et réparation de son véhicule',
  'vacances' => 'Vacances',
  'restaurant' => 'Restaurant',
  'cinema' => 'Cinema',
  'autreOccasionnelle' => 'Autres Dépenses Occasionnelles'
];

function gen_table($title,$typeDepense,$login){
  if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER["REQUEST_METHOD"] == 'GET') && isset($_GET['month_budget'])) {
    $mois = test_input($_GET['month_budget']);
    $mois_budget=$mois;
  }

?>



<table class="table table-striped table-inverse table-responsive">
  <thead>
    <tr>
      <th colspan="2">
        <label for="detail_depense_text"><?php echo $title ?></label>
      </th>
      <th <?php if (!isset($mois_budget)) { echo "hidden"; } ?> colspan="1">
        <div>Reste à dépenser</div>
      </th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($typeDepense as $x => $x_value) { ?>
    <tr>
        <th><label for="<?php echo $x;?>"><?php echo $x_value;?></label></th>
        <td><input class="form-control" type="number" min="0" step="0.01" max="100000" name="<?php echo $x; ?>" id="<?php echo $x; ?>" value="<?php echo (retrieve_budget($x,$login)); ?>"/></td>
        <td <?php if (!isset($mois_budget)) { echo "hidden"; } ?>><?php echo(retrieve_budget($x,$login)-retrieve_sum_spent($x,$login));?></td>
    </tr>
<?php } ?>
</tbody>
</table>

<?php
}
function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function retrieve_budget($type,$login){
  if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER["REQUEST_METHOD"] == 'GET') && isset($_GET['month_budget'])) {
    $mois = test_input($_GET['month_budget']);
    $conn = mysqli_connect("localhost", "root", "", "gestion_argent");
    $sql = "select $type from budget_" . $login . " where mois = '$mois'";
    $sum=0;
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                if (mysqli_num_rows($result) < 1) {
                } else {
                  $sum = $row["$type"];
                  //echo $row["$type"];
                }
                mysqli_close($conn);
                return $sum;

}else {return 0;}
}

function retrieve_sum_spent($type,$login){
  if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER["REQUEST_METHOD"] == 'GET') && isset($_GET['month_budget'])) {
    $mois = test_input($_GET['month_budget']);
    $conn = mysqli_connect("localhost", "root", "", "gestion_argent");
    $sql="select SUM(`montant_depense_number`) as depense from gestion_argent." . $login . " where date_depense like '%$mois%' and `type_depense` = '$type';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $sum=0;
    if ((mysqli_num_rows($result) < 1) || ($row["depense"]==NULL)){
    } else {
      $sum = $row["depense"];
      //echo ;
    }
    mysqli_close($conn);
    return $sum;
  }else {return 0;}}
  
?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="./../styles/header.css" rel="stylesheet">
  <link href="./../styles/footer.css" rel="stylesheet">
  <link href="./../styles/plan.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Depense</title>
</head>
<body>
<header class="HeaderHomepage">

<?php include './../scr/menu.php';?>
  
</header>

  <h1>Planificateur de dépenses</h1>

  
  <!-- Formulaires des dépenses-->
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="GET">
    <label for="month_budget">Retrouver le budget du mois de</label>
    <input type="month" name="month_budget" id="month_budget">
    <button type="submit">
      Envoyer
    </button>
  </form>

  <?php if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER["REQUEST_METHOD"] == 'GET') && isset($_GET['month_budget'])) {
    $mois = test_input($_GET['month_budget']);
  }?>

  <form action="./../scr/plan.php" method="post">
    <label for="mois">Pour le mois de</label>
    <input type="month" name="mois" id="mois" value="<?php if (!isset($mois)) { echo "";}else {echo $mois;}; ?>"  required />
    <div class="table-depense">

 <!-- Formulaire des dépenses fixes-->
   <?php gen_table('Dépenses Fixes',$depFixes,$login);?>
    <!-- Formulaire des dépenses courantes-->
   <?php gen_table('Dépenses Courantes',$depCourantes,$login);?>
   <!-- Formulaire des dépenses occasionnelles-->
   <?php gen_table('Dépenses Occasionnelles',$depOccasionnelles,$login);?>
  
    <div><input type="submit" value="Envoyer" name="bouton_budget_mois" /></div>
  </form>

  <!--footer-->
<?php include './../scr/footer.php'; ?>
</body>

</html>