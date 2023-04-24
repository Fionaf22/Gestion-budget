<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./../styles/plan.css" />
    <link href="./../styles/header.css" rel="stylesheet">
    <title>Depense</title>
  </head>
  <header class="HeaderHomepage">
		<div class="nav_bar">
			<?php include './../scr/menu.php';?>
		</div>
    <h1 class="main_title">The worrisome optimist</h1>
    <div class="search_bar">
      <form><input type="text" placeholder="Search.." /></form>
    </div>
    <div class="picture_logo_header"><a href="./../Main/home-page.php"><img src="./../Main/logo_home.png" title="The worrisome optimist" alt="logo du site" > </a></div>
</header>
  <body>
    <h1>Planificateur de dépenses</h1>

    
    <!-- Formulaires des dépenses-->
    <form action="plan.php" method="post">
      <label for="mois">Pour le mois de</label>
      <input type="month" name="mois" id="mois" required />
      <div class="table-depense">
        <!-- Formulaire des dépenses fixes-->
        <table>
          <thead>
            <tr>
              <th colspan="2">
                <label for="detail_depense_text">Dépenses Fixes</label>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th><label for="loyer">Loyer</label></th>
              <td>
                <input type="number" min="0" max="100000" name="loyer" id="loyer" />
              </td>
            </tr>
            <tr>
              <th><label for="dettes">Remboursement crédit</label></th>
              <td>
                <input type="number" min="0" max="100000" name="dettes" id="dettes" />
              </td>
            </tr>
            <tr>
              <th><label for="facture">Factures</label></th>
              <td>
                <input
                  type="number"
                  min="0"
                  max="100000"
                  name="facture"
                  id="facture"
                />
              </td>
            </tr>
            <tr>
              <th><label for="abonnement">Abonnements</label></th>
              <td>
                <input
                  type="number"
                  min="0"
                  max="100000"
                  name="abonnement"
                  id="abonnement"
                />
              </td>
            </tr>
            <tr>
              <th><label for="assurances">Assurances</label></th>
              <td>
                <input
                  type="number"
                  min="0"
                  max="100000"
                  name="assurances"
                  id="assurances"
                />
              </td>
            </tr>
            <tr>
              <th><label for="ecole">Education</label></th>
              <td>
                <input type="number" min="0" max="100000" name="ecole" id="ecole" />
              </td>
            </tr>
            <tr>
              <th><label for="autreFixes">Autres Dépenses Fixes</label></th>
              <td>
                <input
                  type="number"
                  min="0"
                  max="100000"
                  name="autreFixes"
                  id="autreFixes"
                />
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
                <input
                  type="number"
                  min="0"
                  max="100000"
                  name="Alimentation"
                  id="Alimentation"
                />
              </td>
            </tr>
            <tr>
              <th><label for="Essence">Essence</label></th>
              <td>
                <input
                  type="number"
                  min="0"
                  max="100000"
                  name="Essence"
                  id="Essence"
                />
              </td>
            </tr>
            <tr>
              <th><label for="Pharmacie">Pharmacie</label></th>
              <td>
                <input
                  type="number"
                  min="0"
                  max="100000"
                  name="Pharmacie"
                  id="Pharmacie"
                />
              </td>
            </tr>
            <tr>
              <th><label for="Garderie">Garderie</label></th>
              <td>
                <input
                  type="number"
                  min="0"
                  max="100000"
                  name="Garderie"
                  id="Garderie"
                />
              </td>
            </tr>
            <tr>
              <th><label for="Loisirs">Loisirs</label></th>
              <td>
                <input
                  type="number"
                  min="0"
                  max="100000"
                  name="Loisirs"
                  id="Loisirs"
                />
              </td>
            </tr>
            <tr>
              <th>
                <label for="autreCourantes">Autres Dépenses Courantes</label>
              </th>
              <td>
                <input
                  type="number"
                  min="0"
                  max="100000"
                  name="autreCourantes"
                  id="autreCourantes"
                />
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
                <input
                  type="number"
                  min="0"
                  max="100000"
                  name="Vetement"
                  id="Vetement"
                />
              </td>
            </tr>
            <tr>
              <th><label for="Cadeaux">Cadeaux</label></th>
              <td>
                <input
                  type="number"
                  min="0"
                  max="100000"
                  name="Cadeaux"
                  id="Cadeaux"
                />
              </td>
            </tr>
            <tr>
              <th>
                <label for="Voiture"
                  >Entretien et réparation de son véhicule</label
                >
              </th>
              <td>
                <input
                  type="number"
                  min="0"
                  max="100000"
                  name="Voiture"
                  id="Voiture"
                />
              </td>
            </tr>
            <tr>
              <th><label for="Vacances">Vacances</label></th>
              <td>
                <input
                  type="number"
                  min="0"
                  max="100000"
                  name="Vacances"
                  id="Vacances"
                />
              </td>
            </tr>
            <tr>
              <th><label for="Restaurant">Restaurant</label></th>
              <td>
                <input
                  type="number"
                  min="0"
                  max="100000"
                  name="Restaurant"
                  id="Restaurant"
                />
              </td>
            </tr>
            <tr>
              <th><label for="Cinema">Cinema/Theatre</label></th>
              <td>
                <input
                  type="number"
                  min="0"
                  max="100000"
                  name="Cinema"
                  id="Cinema"
                />
              </td>
            </tr>
            <tr>
              <th>
                <label for="autreOccasionnelles"
                  >Autres Dépenses Occasionnelles</label
                >
              </th>
              <td>
                <input
                  type="number"
                  min="0"
                  max="100000"
                  name="autreOccasionnelles"
                  id="autreOccasionnelles"
                />
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div><input type="submit" value="Envoyer" /></div>
    </form>
  </body>
</html>
