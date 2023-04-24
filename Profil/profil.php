<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../styles/profil.css">
    <link rel="stylesheet" href="./../styles/header.css">
    <title>Profil</title>
</head>
<header class="HeaderHomepage">
		  <div class="nav_bar">
			  <?php include './../scr/menu.php';?>
		  </div>
		  <div class="middle_header">
			  <div class="search_bar"><form><input type="text" placeholder="Search.."></form></div>
			  <h1 class="main_title">The worrisome optimist</h1>
		  </div>
      <div class="picture_logo_header"><a href="./../Main/home-page.php"><img src="./../Main/logo_home.png" title="The worrisome optimist" alt="logo du site" > </a></div>
    </header>
<body>
    <h1>Profil</h1>
    
    <table>
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
        
</body>
</html>