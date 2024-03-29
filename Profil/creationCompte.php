<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link href="./../styles/creationCompte.css" rel="stylesheet" />
    <link href="./../styles/header.css" rel="stylesheet"/>
    <link href="./../styles/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Sign up - The worrisome optimist</title>
  </head>

  <body>
  <header class="HeaderHomepage">

<?php include './../scr/menu.php';?>
  
</header>

    <div>
      <h2>Configuration utilisateur</h2>
    </div>
    <form action="creationCompte.php" method="post">
      <table>
        <thead></thead>
        <tbody>
          <tr>
            <th><label for="userpic" class="labels">Ajouter une photo de profil</label></th>
            <td>
              <input
                type="file"
                name="userpic"
                id="userpic"
                accept=".png,.jpeg"
              />
            </td>
          </tr>
          <tr>
            <th><label for="Lastname" class="labels">Nom</label></th>
            <td>
              <input
                type="text"
                name="Lastname"
                class="form-control"
                placeholder="Nom de famille"
                value=""
                required
              />
            </td>
          </tr>
          <tr>
            <th><label for="Firstname" class="labels">Prénom</label></th>
            <td>
              <input
                type="text"
                name="Firstname"
                class="form-control"
                value=""
                placeholder="Prenom"
                required
              />
            </td>
          </tr>
          <tr>
            <th><label for="Username" class="labels">Nom d'utilisateur</label></th>
            <td>
              <input
                type="text"
                name="Username"
                class="form-control"
                value=""
                placeholder="Nom d'utilisateur"
                required
              />
            </td>
          </tr>
          <tr>
            <th><label for="passwords">Mot de passe (doit contenir entre 8 et 16 caractères dont au moins un chiffre et une lettre majuscule et minuscule)</label></th>
            <td>
                <input type="password" name="passwords" id="passwords" minlength="8" maxlength="16" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" required>
            </td>
          </tr>
          <tr>
            <th><label for="passwords_verif">Mot de passe (doit contenir entre 8 et 16 caractères dont au moins un chiffre et une lettre majuscule et minuscule)</label></th>
            <td>
                <input type="password" name="passwords_verif" id="passwords_verif" minlength="8" maxlength="16" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" required>
            </td>
          </tr>
          <tr>
            <th><label for="Ville" class="labels">Ville</label></th>
            <td>
              <input
                type="text"
                name="Ville"
                class="form-control"
                placeholder="Paris"
                value=""
                required
              />
            </td>
          </tr>
          <tr>
            <th><label for="Email" class="labels">Adresse E-mail</label></th>
            <td>
              <input
                type="text"
                name="Email"
                class="form-control"
                placeholder="abc59.@xxx.com"
                value=""
                required
              />
            </td>
          </tr>
          <tr>
            <th><label for="envoi">Validation</label></th>
            <td><input type="submit" value="Envoyer" /></td>
          </tr>
        </tbody>
      </table>
    </form>


<!--footer-->
<?php include './../scr/footer.php'; ?>
  </body>
</html>
