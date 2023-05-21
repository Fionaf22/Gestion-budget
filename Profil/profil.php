<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../styles/profil.css">
    <link rel="stylesheet" href="./../styles/header.css">
    <link href="./../styles/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Profil</title>
</head>

<body>
<header class="HeaderHomepage">

<?php include './../scr/menu.php';?>
  
</header>
    <h1>Profil</h1>
    
    <table class="table">
        <thead></thead>
        <tbody>
          <tr>
            <th><label for="userpic">Modifier la photo de profil</label></th>
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
            <th><label class="labels">Nom</label></th>
            <td>
              <input
                type="text"
                class="form-control"
                placeholder="first name"
                value=""
                readonly
              />
            </td>
          </tr>
          <tr>
            <th><label class="labels">Prénom</label></th>
            <td>
              <input
                type="text"
                class="form-control"
                value=""
                placeholder="surname"
                readonly
              />
            </td>
          </tr>
          <tr>
            <th><label class="labels">Nom d'utilisateur</label></th>
            <td>
              <input
                type="text"
                class="form-control"
                value=""
                placeholder="username"
                readonly
              />
            </td>
          </tr>
          <tr>
            <th><label class="labels">Ville</label></th>
            <td>
              <input
                type="text"
                class="form-control"
                placeholder="Paris"
                value=""
                readonly
              />
            </td>
          </tr>
          <tr>
            <th><label class="labels">Adresse E-mail</label></th>
            <td>
              <input
                type="text"
                class="form-control"
                placeholder="abc59.@xxx.com"
                value=""
                readonly
              />
            </td>
          </tr>
          <tr>
            <th><label for="envoi">Validation</label></th>
            <td><input type="submit" value="Envoyer" /></td>
          </tr>
        </tbody>
      </table>
 
      <!--footer-->
<?php include './../scr/footer.php'; ?>
</body>
</html>