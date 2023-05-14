<?php
session_start();
$login= 'yeonwoo';
$_SESSION['login']=  $login;

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../styles/plan.css">
    <link href="./../styles/header.css" rel="stylesheet">
    <title>Depense</title>
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
<?php
$conn = mysqli_connect("localhost","root","","gestion_argent");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$login='shin';
?>


<?php $depense_fixes = ["Loyer" =>  $sql="SELECT montant from $login where type_depense = loyer",
"Dettes" =>  $sql="SELECT montant from $login where type_depense = dettes_fixes",
"Facture" =>  $sql="SELECT montant from $login where type_depense = facture_fixes",
"Abonnement" =>  $sql="SELECT montant from $login where type_depense = abonnement_fixes",
"Assurances" =>  $sql="SELECT montant from $login where type_depense = assurances_fixes",
"Ecole" =>  $sql="SELECT montant from $login where type_depense = ecole_fixes",
"autreFixes" =>  $sql="SELECT montant from $login where type_depense = autreFixes_fixes"]; ?>

<?php $depense_Courante = ["Alimentation" =>  $sql="SELECT montant from $login where type_depense = Alimentation_fixes",
"Essence" =>  $sql="SELECT montant from $login where type_depense = Essence_fixes",
"Pharmacie" =>  $sql="SELECT montant from $login where type_depense = Pharmacie_fixes",
"Garderie" =>  $sql="SELECT montant from $login where type_depense = Garderie_fixes",
"Loisirs" =>  $sql="SELECT montant from $login where type_depense = Loisirs_fixes",
"autreCourantes" =>  $sql="SELECT montant from $login where type_depense = autreCourantes_fixes"]; ?>


<?php $depense_Occasionnelles = ["Vetement" =>  $sql="SELECT montant from $login where type_depense = Vetement_fixes" ,
"Cadeaux" =>  $sql="SELECT montant from $login where type_depense = Cadeaux_fixes",
"Voiture" =>  $sql="SELECT montant from $login where type_depense = Voiture_fixes",
"Vacances" =>  $sql="SELECT montant from $login where type_depense = Vacances_fixes",
"Restaurant" =>  $sql="SELECT montant from $login where type_depense = Restaurant_fixes",
"Cinema" =>  $sql="SELECT montant from $login where type_depense = Cinema_fixes",
"autreOccasionnelles" =>  $sql="SELECT montant from $login where type_depense = autreOccasionnelles_fixes"]; ?>


<form action="prevision.php" method="GET">
    <label for="month_budget">Saisir mois pour budget</label>
    <input type="month" name="month_budget" id="month_budget">
    <button type="submit">
        Envoyer
    </button>
</form>

<?php 
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER["REQUEST_METHOD"] == 'GET') && isset($_GET['month_budget'])) {
    $mois = test_input($_GET['month_budget']);
    $mois = $mois . '-01';
    echo $mois;
}
    
//ajouter condition sur mois dans where pour que qu'on ait le total par date (mois)
?>
<table>
    <thead>
        Details des depenses mensuelles
    </thead>
    <tbody>
        <tr>
            <th>Depenses totales</th>
        <td>
            <?php
            if (!isset($mois)){$mois="";};
         $sql = "select SUM(montant_depense_number) as montant_total from $login where date_depense between '$mois' AND '$mois'+INTERVAL 1 MONTH;";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row['montant_total'] == null){
            echo "0";
        }else{
            echo $row['montant_total'];
        }
        
            ?>
        </td>
        </tr>
        <tr>
            <th>Depenses Fixes</th>
        <td>
            <?php
$sql="select distinct type_depense as fixe from $login where date_depense between '$mois' AND '$mois'+INTERVAL 1 MONTH;";
$result = mysqli_query($conn, $sql);
$sum=0.0;
$decompte = mysqli_num_rows($result);
while ($decompte > 0) {
    $row = mysqli_fetch_assoc($result);
    foreach ($depense_fixes as $key => $value_type) {
        if ($row['fixe']==$key){
            $sqlbis = "select SUM(montant_depense_number) as somme_fixe from $login where type_depense = \"$row[fixe]\" ;";                   
            $resultbis = mysqli_query($conn, $sqlbis);
            $value= mysqli_fetch_assoc($resultbis)['somme_fixe'];
            $sum=$sum+floatval($value);  
        }  
    }
    $decompte--;
    }
echo $sum;   
            ?>
        </td>
        </tr>
        <tr>
            <th>Depenses Courantes</th>
        <td>
            <?php
            $sql="select distinct type_depense as courant from $login where date_depense between '$mois' AND '$mois'+INTERVAL 1 MONTH;";
            $result = mysqli_query($conn, $sql);
            $sum=0.0;
            $decompte = mysqli_num_rows($result);
            while ($decompte > 0) {
                $row = mysqli_fetch_assoc($result);
                foreach ($depense_Courante as $key => $value_type) {
                    if ($row['courant']==$key){
                        $sqlbis = "select SUM(montant_depense_number) as somme_courant from $login where type_depense = \"$row[courant]\" ;";                   
                        $resultbis = mysqli_query($conn, $sqlbis);
                        $value= mysqli_fetch_assoc($resultbis)['somme_courant'];
                        $sum=$sum+floatval($value);  
                    }  
                }
                $decompte--;
                }
            echo $sum;   
            ?>
        </td>
        </tr>
        <tr>
            <th>Depenses Occasionnelles</th>
        <td>
            <?php
            $sql="select distinct type_depense as occasionnel from $login where date_depense between '$mois' AND '$mois'+INTERVAL 1 MONTH;";
            $result = mysqli_query($conn, $sql);
            $sum=0.0;
            $decompte = mysqli_num_rows($result);
            while ($decompte > 0) {
                $row = mysqli_fetch_assoc($result);
                foreach ($depense_Occasionnelles as $key => $value_type) {
                    if ($row['occasionnel']==$key){
                        $sqlbis = "select SUM(montant_depense_number) as somme_occasionnel from $login where type_depense = \"$row[occasionnel]\" ;";                   
                        $resultbis = mysqli_query($conn, $sqlbis);
                        $value= mysqli_fetch_assoc($resultbis)['somme_occasionnel'];
                        $sum=$sum+floatval($value);  
                    }  
                }
                $decompte--;
                }
            echo $sum;  
/*                             $sql="select distinct type_depense as occasionnel from $login;";
                            $result = mysqli_query($conn, $sql);
                            $sum=0.0;
                            $decompte = mysqli_num_rows($result);
                            while ($decompte > 0) {
                                $row = mysqli_fetch_assoc($result);
                                $decompte--;
                                $sqlbis = "select SUM(montant_depense_number) as somme_occasionnel from $login where type_depense = \"$row[occasionnel]\" ;";                    $resultbis = mysqli_query($conn, $sqlbis);
                                $value= mysqli_fetch_assoc($resultbis)['somme_occasionnel'];
                                $sum=$sum+floatval($value);
                                }
                            echo $sum;  */
            ?>
        </td>
        </tr>
        
    </tbody>
</table>
<div><a href="plan.php"> Modifier le budget mensuel </a></div>
	
</body>
</html>