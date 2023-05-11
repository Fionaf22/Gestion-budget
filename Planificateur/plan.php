<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./../styles/plan.css" />
  <link href="./../styles/header.css" rel="stylesheet">
  <title>Depense</title>
</head>

<body>
  <header class="HeaderHomepage">
    <div class="nav_bar">
      <?php include './../scr/menu.php'; ?>
    </div>
    <h1 class="main_title">The worrisome optimist</h1>
    <div class="search_bar">
      <form><input type="text" placeholder="Search.." /></form>
    </div>
    <div class="picture_logo_header"><a href="./../Main/home-page.php"><img src="./../Main/logo_home.png" title="The worrisome optimist" alt="logo du site"> </a></div>
  </header>

  <h1>Planificateur de dépenses</h1>

  <?php $conn = mysqli_connect("localhost", "root", "", "gestion_argent"); ?>
  <!-- Formulaires des dépenses-->
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="GET">
    <label for="month_budget">Retrouver le budget du mois de</label>
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

  function retrieve_budget($type,$mois){
    $conn = mysqli_connect("localhost", "root", "", "gestion_argent");
    $sql = "select $type from budget_marc where mois = '$mois'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                if (mysqli_num_rows($result) < 1) {
                  echo "";
                } else {
                  echo $row["$type"];
                }
  }

  if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER["REQUEST_METHOD"] == 'GET') && isset($_GET['month_budget'])) {
    $mois = test_input($_GET['month_budget']);
    
    $now = test_input(date('Y-m'));
    echo $now;
  }?>

  <form action="./../scr/plan.php" method="post">
    <label for="mois">Pour le mois de</label>
    <input type="month" name="mois" id="mois" value="<?php echo $mois?>"  required />
    <div class="table-depense">
      <!-- Formulaire des dépenses fixes-->
      <table>
        <thead>
          <tr>
            <th colspan="2">
              <label for="detail_depense_text">Dépenses Fixes</label>
            </th>
            <th colspan="1">
              <div>Reste à dépenser</div>
            </th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <th><label for="loyer">Loyer</label></th>
            <td>
              <input type="number" min="0" step="0.01" step="0.01" max="100000" name="loyer" id="loyer" value="<?php retrieve_budget('loyer',$mois)?>" />
            </td>
            <td></td>
          </tr>
          <tr>
            <th><label for="dettes">Remboursement crédit</label></th>
            <td>
              <input type="number" min="0" step="0.01" step="0.01" max="100000" name="dettes" id="dettes" value="<?php retrieve_budget('dettes',$mois)?>" />
            </td>
            <td></td>
          </tr>
          <tr>
            <th><label for="facture">Factures</label></th>
            <td>
              <input type="number" min="0" step="0.01" max="100000" name="facture" id="facture" value="<?php retrieve_budget('facture',$mois)?>" />
            </td>
            <td></td>
          </tr>
          <tr>
            <th><label for="abonnement">Abonnements</label></th>
            <td>
              <input type="number" min="0" step="0.01" max="100000" name="abonnement" id="abonnement" value="<?php retrieve_budget('abonnement',$mois)?>" />
            </td>
            <td></td>
          </tr>
          <tr>
            <th><label for="assurances">Assurances</label></th>
            <td>
              <input type="number" min="0" step="0.01" max="100000" name="assurances" id="assurances" value="<?php retrieve_budget('assurances',$mois)?>" />
            </td>
          </tr>
          <tr>
            <th><label for="ecole">Education</label></th>
            <td>
              <input type="number" min="0" step="0.01" max="100000" name="ecole" id="ecole" value="<?php retrieve_budget('ecole',$mois)?>" />
            </td>
          </tr>
          <tr>
            <th><label for="autreFixes">Autres Dépenses Fixes</label></th>
            <td>
              <input type="number" min="0" step="0.01" max="100000" name="autreFixes" id="autreFixes" value="<?php retrieve_budget('autreFixes',$mois)?>" />
            </td>
          </tr>
        </tbody>
      </table>
      <!-- Formulaire des dépenses courantes-->
      <table>
        <thead>
          <tr>
            <th colspan="2">
              <label for="detail_depense_text">Dépenses Courantes</label>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th><label for="Alimentation">Alimentation</label></th>
            <td>
              <input type="number" min="0" step="0.01" max="100000" name="Alimentation" id="Alimentation" value="<?php retrieve_budget('Alimentation',$mois)?>" />
            </td>
          </tr>
          <tr>
            <th><label for="Essence">Essence</label></th>
            <td>
              <input type="number" min="0" step="0.01" max="100000" name="Essence" id="Essence" value="<?php retrieve_budget('Essence',$mois)?>" />
            </td>
          </tr>
          <tr>
            <th><label for="Pharmacie">Pharmacie</label></th>
            <td>
              <input type="number" min="0" step="0.01" max="100000" name="Pharmacie" id="Pharmacie" value="<?php retrieve_budget('Pharmacie',$mois)?>" />
            </td>
          </tr>
          <tr>
            <th><label for="Garderie">Garderie</label></th>
            <td>
              <input type="number" min="0" step="0.01" max="100000" name="Garderie" id="Garderie" value="<?php retrieve_budget('Garderie',$mois)?>" />
            </td>
          </tr>
          <tr>
            <th><label for="Loisirs">Loisirs</label></th>
            <td>
              <input type="number" min="0" step="0.01" max="100000" name="Loisirs" id="Loisirs" value="<?php retrieve_budget('Loisirs',$mois)?>" />
            </td>
          </tr>
          <tr>
            <th>
              <label for="autreCourantes">Autres Dépenses Courantes</label>
            </th>
            <td>
              <input type="number" min="0" step="0.01" max="100000" name="autreCourantes" id="autreCourantes" value="<?php retrieve_budget('autreCourantes',$mois)?>" />
            </td>
          </tr>
        </tbody>
      </table>
      <!-- Formulaire des dépenses occasionnelles-->
      <table>
        <thead>
          <tr>
            <th colspan="2">
              <label for="detail_depense_text">Dépenses Occasionnelles</label>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th><label for="Vetement">Vetements</label></th>
            <td>
              <input type="number" min="0" step="0.01" max="100000" name="Vetement" id="Vetement" value="<?php retrieve_budget('Vetement',$mois)?>" />
            </td>
          </tr>
          <tr>
            <th><label for="Cadeaux">Cadeaux</label></th>
            <td>
              <input type="number" min="0" step="0.01" max="100000" name="Cadeaux" id="Cadeaux" value="<?php retrieve_budget('Cadeaux',$mois)?>" />
            </td>
          </tr>
          <tr>
            <th>
              <label for="Voiture">Entretien et réparation de son véhicule</label>
            </th>
            <td>
              <input type="number" min="0" step="0.01" max="100000" name="Voiture" id="Voiture" value="<?php retrieve_budget('Voiture',$mois)?>" />
            </td>
          </tr>
          <tr>
            <th><label for="Vacances">Vacances</label></th>
            <td>
              <input type="number" min="0" step="0.01" max="100000" name="Vacances" id="Vacances" value="<?php retrieve_budget('Vacances',$mois)?>" />
            </td>
          </tr>
          <tr>
            <th><label for="Restaurant">Restaurant</label></th>
            <td>
              <input type="number" min="0" step="0.01" max="100000" name="Restaurant" id="Restaurant" value="<?php retrieve_budget('Restaurant',$mois)?>" />
            </td>
          </tr>
          <tr>
            <th><label for="Cinema">Cinema/Theatre</label></th>
            <td>
              <input type="number" min="0" step="0.01" max="100000" name="Cinema" id="Cinema" value="<?php retrieve_budget('Cinema',$mois)?>" />
            </td>
          </tr>
          <tr>
            <th>
              <label for="autreOccasionnelles">Autres Dépenses Occasionnelles</label>
            </th>
            <td>
              <input type="number" min="0" step="0.01" max="100000" name="autreOccasionnelles" id="autreOccasionnelles" value="<?php retrieve_budget('autreOccasionnelles',$mois)?>" />
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div><input type="submit" value="Envoyer" name="bouton_budget_mois" /></div>
  </form>
</body>

</html>