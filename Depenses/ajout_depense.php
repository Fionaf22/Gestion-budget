<?php
session_start();
$login = 'yeonwoo';
$_SESSION['login'] =  $login; ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./../styles/ajout_depense.css">
    <link href="./../styles/header.css" rel="stylesheet">
    <link href="./../styles/footer.css" rel="stylesheet">
    <title>Depense</title>
</head>

<body>
    <header class="HeaderHomepage">

        <?php include './../scr/menu.php'; ?>

    </header>



    <!-- faire une fonction et bouble pour form comme plan.php -->
    <div class="container p-4">
        <br>
        <div class="row g-3 form_depense">
            <fieldset>
                <legend>Ajouter une dépense</legend>
                <form action="./../scr/ajout_depense.php" method="post" class="form_depense">
                    <div class="form-check">
                        <table>
                            <tr>
                                <td style="background-color: rgba(230, 0, 0, 0.650)">
                                    <input class="form-check-input" type="radio" id="red" name="drone" value="red" checked>
                                    <label class="form-check-label" for="red">red</label>
                                </td>

                                <td style="background-color: rgba(0, 0, 230, 0.700)">
                                    <input class="form-check-input" type="radio" id="blue" name="drone" value="blue">
                                    <label class="form-check-label" for="blue">blue</label>
                                </td>
                                <td style="background-color: rgba(0, 230, 0, 0.650)">
                                    <input class="form-check-input" type="radio" id="green" name="drone" value="green">
                                    <label class="form-check-label" for="green">green</label>
                                </td>
                                <td style="background-color: rgba(150, 0, 230, 0.65)">
                                    <input class="form-check-input" type="radio" id="violet" name="drone" value="violet">
                                    <label class="form-check-label" for="violet">violet</label>
                                </td>
                                <td style="background-color: rgba(255, 130, 41, 0.65)">
                                    <input class="form-check-input" type="radio" id="orange" name="drone" value="orange">
                                    <label class="form-check-label" for="orange">orange</label>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-label" for="detail_depense_text">Titre de la dépense</label>
                        <input class="form-control" type="text" name="detail_depense_text" id="detail_depense_text" size="31" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="date_depense">Date de la dépense</label>
                        <input class="form-control" type="date" name="date_depense" id="date_depense" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="Type-depense-select">Type de dépense</label>
                        <select class="form-select form-control" id="Type-depense-select" name="Type-depense-select" required data-optgroup="">
                            <optgroup label="Dépense fixes">
                                <option value="loyer">Loyer</option>
                                <option value="remboursements">Remboursements crédit</option>
                                <option value="facture">Factures</option>
                                <option value="abonnement">Abonnements</option>
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
                    <div class="form-group">
                        <label class="form-label" for="montant_depense">Montant de la dépense</label>
                        <input class="form-control" type="number" name="montant_depense_number" id="montant_depense_number" min="0" max="999999" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="note_depense">Informations complémentaires</label>
                        <div><textarea id="note_depense" name="note_depense" rows="5" cols="48" maxlength="200"></textarea></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="envoi"></label>
                        <input class="form-control" type="reset" value="Reset">
                        <input class="form-control" type="submit" name="bouton_depense" value="Envoyer">
                    </div>
            </fieldset>
            </form>
        </div>

    </div>
<!--footer-->
        <?php include './../scr/footer.php'; ?>

</body>

</html>