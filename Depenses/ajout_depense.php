<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../styles/ajout_depense.css">
    <link href="./../styles/header.css" rel="stylesheet">
    <title>Depense</title>
</head>

<body>
    <header class=HeaderHomepage>
        <div class="nav_bar">
            <?php include './../scr/menu.php'; ?>
        </div>
        <div class="middle_header">
            <div class="search_bar">
                <form><input type="text" placeholder="Search.."></form>
            </div>
            <h1 class="main_title">The worrisome optimist</h1>
        </div>
        <div class="picture_logo_header"><a href="./../Main/home-page.php"><img src="./../Main/logo_home.png" title="The worrisome optimist" alt="logo du site"> </a></div>
    </header>



    <form action="./../scr/ajout_depense.php" method="post" class="form_depense">
        <fieldset>
            <legend>Ajouter une dépense</legend>
            <div class="table-color-radio">
                <table>
                    <tr>
                        <td style="background-color: rgba(230, 0, 0, 0.650)">
                            <input type="radio" id="red" name="drone" value="red" checked>
                            <label for="red">red</label>
                        </td>

                        <td style="background-color: rgba(0, 0, 230, 0.700)">
                            <input type="radio" id="blue" name="drone" value="blue">
                            <label for="blue">blue</label>
                        </td>
                        <td style="background-color: rgba(0, 230, 0, 0.650)">
                            <input type="radio" id="green" name="drone" value="green">
                            <label for="green">green</label>
                        </td>
                        <td style="background-color: rgba(150, 0, 230, 0.65)">
                            <input type="radio" id="violet" name="drone" value="violet">
                            <label for="violet">violet</label>
                        </td>
                        <td style="background-color: rgba(255, 130, 41, 0.65)">
                            <input type="radio" id="orange" name="drone" value="orange">
                            <label for="orange">orange</label>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <div>
                <label for="detail_depense_text">Titre de la dépense</label>
                <input type="text" name="detail_depense_text" id="detail_depense_text" size="31" required>
            </div>
            <div>
                <label for="date_depense">Date de la dépense</label>
                <input type="date" name="date_depense" id="date_depense" required>
            </div>

            <div class="input_optgroup">
                <label for="Type-depense-select">Type de dépense</label>
                <select id="Type-depense-select" name="Type-depense-select" required data-optgroup="">
                    <optgroup label="Dépense fixes">
                        <option value="Loyer">Loyer</option>
                        <option value="Remboursements">Remboursements crédit</option>
                        <option value="Factures">Factures</option>
                        <option value="Abonnements">Abonnements</option>
                        <option value="Education">Education</option>
                        <option value="Autres">Autres Dépenses Fixes</option>
                    </optgroup>
                    <optgroup label="Dépense courantes">
                        <option value="Alimentation">Alimentation</option>
                        <option value="Essence">Essence</option>
                        <option value="Pharmacie">Pharmacie</option>
                        <option value="Garderie">Garderie</option>
                        <option value="Loisirs">Loisirs</option>
                        <option value="Autres">Autres Dépenses Courantes</option>
                    </optgroup>
                    <optgroup label="Dépense occasionnelles">
                        <option value="Vetements">Vetements</option>
                        <option value="Cadeaux">Cadeaux</option>
                        <option value="Voiture">Entretien et réparation de son véhicule</option>
                        <option value="Vacances">Vacances</option>
                        <option value="Restaurants">Restaurants</option>
                        <option value="Cinema">Cinema/Theatre</option>
                        <option value="Autres">Autres Dépenses Occasionnelles</option>
                    </optgroup>
                </select>
            </div>
            <div>
                <label for="montant_depense">Montant de la dépense</label>
                <input type="number" name="montant_depense_number" id="montant_depense_number" min="0" max="999999" step="0.01" required>
            </div>
            <div>
                <label for="note_depense">Informations complémentaires</label>
                <div><textarea id="note_depense" name="note_depense" rows="5" cols="48" maxlength="200"></textarea></div>
            </div>
            <div>
                <label for="envoi"></label>
                <input type="reset" value="Reset">
                <input type="submit" name="bouton_depense" value="Envoyer">
            </div>
        </fieldset>
    </form>

    <div class="list_depense"> <a href="./../scr/ajout_depense.php"> Liste des dépenses</a></div>
</body>

</html>