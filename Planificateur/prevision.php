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
    <link href="./../styles/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Depense</title>
</head>

<body>
<header class="HeaderHomepage">

<?php include './../scr/menu.php';?>
  
</header>
<?php
$conn = mysqli_connect("localhost","root","","gestion_argent");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>


<?php $depense_fixes = ["loyer" =>  $sql="SELECT montant from $login where type_depense = loyer",
"dette" =>  $sql="SELECT montant from $login where type_depense = dette",
"facture" =>  $sql="SELECT montant from $login where type_depense = facture",
"abonnement" =>  $sql="SELECT montant from $login where type_depense = abonnement",
"assurance" =>  $sql="SELECT montant from $login where type_depense = assurance",
"ecole" =>  $sql="SELECT montant from $login where type_depense = ecole",
"autreFixe" =>  $sql="SELECT montant from $login where type_depense = autreFixe"]; ?>

<?php $depense_Courante = ["alimentation" =>  $sql="SELECT montant from $login where type_depense = alimentation",
"essence" =>  $sql="SELECT montant from $login where type_depense = essence",
"pharmacie" =>  $sql="SELECT montant from $login where type_depense = pharmacie",
"garderie" =>  $sql="SELECT montant from $login where type_depense = garderie",
"loisir" =>  $sql="SELECT montant from $login where type_depense = loisir",
"autreCourante" =>  $sql="SELECT montant from $login where type_depense = autreCourante"]; ?>


<?php $depense_Occasionnelles = ["Vetement" =>  $sql="SELECT montant from $login where type_depense = vetement" ,
"cadeau" =>  $sql="SELECT montant from $login where type_depense = cadeau",
"voiture" =>  $sql="SELECT montant from $login where type_depense = voiture",
"vacances" =>  $sql="SELECT montant from $login where type_depense = vacances",
"restaurant" =>  $sql="SELECT montant from $login where type_depense = restaurant",
"cinema" =>  $sql="SELECT montant from $login where type_depense = cinema",
"autreOccasionnelle" =>  $sql="SELECT montant from $login where type_depense = autreOccasionnelle"]; ?>


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
        <?php if (!isset($mois)){$mois=date('Y-m')."-01"; echo "<br>Dépense du mois en cours";};?>
    </thead>
    <tbody>
        <tr>
            <th>Depenses totales</th>
        <td>
            <?php
           
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
    var_dump($row);
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
            var_dump($decompte);
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
            var_dump($decompte);
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

<!--footer-->
<?php include './../scr/footer.php'; ?>
</body>
</html>