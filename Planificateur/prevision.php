<?php
session_start();
$_SESSION['username'] = 'shin';

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
$Username='shin';
?>


<?php $depense_fixes = ["Loyer" =>  $sql="SELECT montant from $Username where type_depense = loyer",
"Dettes" =>  $sql="SELECT montant from $Username where type_depense = dettes",
"Facture" =>  $sql="SELECT montant from $Username where type_depense = facture",
"Abonnement" =>  $sql="SELECT montant from $Username where type_depense = abonnement",
"Assurances" =>  $sql="SELECT montant from $Username where type_depense = assurances",
"Ecole" =>  $sql="SELECT montant from $Username where type_depense = ecole",
"autreFixes" =>  $sql="SELECT montant from $Username where type_depense = autreFixes"]; ?>

<?php $depense_Courante = ["Alimentation" =>  $sql="SELECT montant from $Username where type_depense = Alimentation",
"Essence" =>  $sql="SELECT montant from $Username where type_depense = Essence",
"Pharmacie" =>  $sql="SELECT montant from $Username where type_depense = Pharmacie",
"Garderie" =>  $sql="SELECT montant from $Username where type_depense = Garderie",
"Loisirs" =>  $sql="SELECT montant from $Username where type_depense = Loisirs",
"autreCourantes" =>  $sql="SELECT montant from $Username where type_depense = autreCourantes"]; ?>


<?php $depense_Occasionnelles = ["Vetement" =>  $sql="SELECT montant from $Username where type_depense = Vetement" ,
"Cadeaux" =>  $sql="SELECT montant from $Username where type_depense = Cadeaux",
"Voiture" =>  $sql="SELECT montant from $Username where type_depense = Voiture",
"Vacances" =>  $sql="SELECT montant from $Username where type_depense = Vacances",
"Restaurant" =>  $sql="SELECT montant from $Username where type_depense = Restaurant",
"Cinema" =>  $sql="SELECT montant from $Username where type_depense = Cinema",
"autreOccasionnelles" =>  $sql="SELECT montant from $Username where type_depense = autreOccasionnelles"]; ?>

<?php 
//ajouter condition sur mois dans where pour que qu'on ait le total par date (mois)
?>

<table>
    <thead>
        resultat des requetes sur plan.html avec php
    </thead>
    <tbody>
        <tr>
            <th>Depenses totales</th>
        <td>
            <?php
        $sql = "select SUM(montant_depense_number) as montant_total from $Username  ;";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            echo $row['montant_total'];
        } else {
            echo "0";
        }
            ?>
        </td>
        </tr>
        <tr>
            <th>Depenses fixes</th>
        <td>
            <?php
$sql="select distinct type_depense as fixe from $Username;";
$result = mysqli_query($conn, $sql);
$sum=0.0;
$decompte = mysqli_num_rows($result);
while ($decompte > 0) {
    $row = mysqli_fetch_assoc($result);
    foreach ($depense_fixes as $key => $value_type) {
        if ($row['fixe']==$key){
            $sqlbis = "select SUM(montant_depense_number) as somme_fixe from $Username where type_depense = \"$row[fixe]\" ;";                   
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
            $sql="select distinct type_depense as courant from $Username;";
            $result = mysqli_query($conn, $sql);
            $sum=0.0;
            $decompte = mysqli_num_rows($result);
            while ($decompte > 0) {
                $row = mysqli_fetch_assoc($result);
                foreach ($depense_Courante as $key => $value_type) {
                    if ($row['courant']==$key){
                        $sqlbis = "select SUM(montant_depense_number) as somme_courant from $Username where type_depense = \"$row[courant]\" ;";                   
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
            $sql="select distinct type_depense as occasionnel from $Username;";
            $result = mysqli_query($conn, $sql);
            $sum=0.0;
            $decompte = mysqli_num_rows($result);
            while ($decompte > 0) {
                $row = mysqli_fetch_assoc($result);
                foreach ($depense_Occasionnelles as $key => $value_type) {
                    if ($row['occasionnel']==$key){
                        $sqlbis = "select SUM(montant_depense_number) as somme_occasionnel from $Username where type_depense = \"$row[occasionnel]\" ;";                   
                        $resultbis = mysqli_query($conn, $sqlbis);
                        $value= mysqli_fetch_assoc($resultbis)['somme_occasionnel'];
                        $sum=$sum+floatval($value);  
                    }  
                }
                $decompte--;
                }
            echo $sum;  
/*                             $sql="select distinct type_depense as occasionnel from $Username;";
                            $result = mysqli_query($conn, $sql);
                            $sum=0.0;
                            $decompte = mysqli_num_rows($result);
                            while ($decompte > 0) {
                                $row = mysqli_fetch_assoc($result);
                                $decompte--;
                                $sqlbis = "select SUM(montant_depense_number) as somme_occasionnel from $Username where type_depense = \"$row[occasionnel]\" ;";                    $resultbis = mysqli_query($conn, $sqlbis);
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