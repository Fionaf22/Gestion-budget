<?php
session_start();
$login = 'yeonwoo';
$_SESSION['login'] =  $login;
$conn = mysqli_connect("localhost", "root", "", "gestion_argent");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

?>
<html>

<head>
  <title>Ajout depense</title>
  <link href="./../styles/depense_list.css" rel="stylesheet" />
  <link href="./../styles/header.css" rel="stylesheet" />
  <link href="./../styles/footer.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <header class="HeaderHomepage">

    <?php include './../scr/menu.php'; ?>

  </header>



  <br>
  <div class="container">
    <div class="btn-group">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Filtrer par couleur
        <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="./../view/details_depenses.php?color-tag=blue">Bleu</a></li>
        <li><a href="./../view/details_depenses.php?color-tag=orange">Orange</a></li>
        <li><a href="./../view/details_depenses.php?color-tag=red">Rouge</a></li>
        <li><a href="./../view/details_depenses.php?color-tag=green">Vert</a></li>
        <li><a href="./../view/details_depenses.php?color-tag=violet">Violet</a></li>
      </ul>
    </div>
    <div class="btn-group">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Trier les dépenses
        <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="./../view/details_depenses.php?price">Par montant</a></li>
        <li><a href="./../view/details_depenses.php?date">Par date</a></li>
        <li><a href="./../view/details_depenses.php?type">Par type</a></li>
      </ul>
    </div>
  </div>

  <div class="container p-4">
  <?php
  // define variables and set to empty values
  $couleur_depense = $detail_depense_text = $date_depense = $type_depense = $note_depense = $montant_depense_number = "";
  $sqlCreate = "CREATE TABLE if not exists `gestion_argent`.$login ( `idDepense` INT NOT NULL AUTO_INCREMENT ,`detail_depense_text` VARCHAR(100) NOT NULL , `date_depense` VARCHAR(15) NOT NULL , `montant_depense_number` DECIMAL(10, 2) NOT NULL , `couleur_depense` VARCHAR(30) NOT NULL , `type_depense` VARCHAR(100) NOT NULL, `note_depense` VARCHAR(250) NOT NULL  ,  PRIMARY KEY (`idDepense`)) ENGINE = InnoDB;";
  if (!mysqli_query($conn, $sqlCreate)) {
    echo "Error: " . $sqlCreate . "<br>" . mysqli_error($conn);
    echo "<br>Liste de dépense vide <br>";
  }

  if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER["REQUEST_METHOD"] == 'POST') && isset($_POST["bouton_depense"])) {
    unset($_SESSION['form_submitted']);
    $couleur_depense = test_input($_POST["drone"]);
    $type_depense = test_input($_POST["Type-depense-select"]);
    $date_depense = test_input($_POST["date_depense"]);
    $montant_depense_number = test_input($_POST["montant_depense_number"]);
    $detail_depense_text = test_input($_POST["detail_depense_text"]);
    $note_depense = test_input($_POST["note_depense"]);
  }



  if (isset($_POST['bouton_depense'])) {
    if (!isset($_SESSION['form_submitted'])) {
      if (!empty($montant_depense_number)) {
        $sql = "INSERT INTO `gestion_argent`.$login (couleur_depense, detail_depense_text,montant_depense_number, date_depense,type_depense, note_depense) VALUES (\"$couleur_depense\" , \"$detail_depense_text\" ,\"$montant_depense_number\", \"$date_depense\",   \"$type_depense\", \"$note_depense\" );";
        if (!mysqli_query($conn, $sql)) {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
      $_SESSION['form_submitted'] = true;
      header("Location:" . $_SERVER['PHP_SELF']);
      //exit();
    }
  }









  //foreach($depense as $key => $value) {
  //  echo $key . ": " . $value . "<br>";
  //} 

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>


  <?php
  $sql = "SELECT * FROM $login ORDER BY couleur_depense, type_depense";
  $result = mysqli_query($conn, $sql);
  ?>
  <div class="depense_list ">
    <?php
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $couleur_depense = $row['couleur_depense'];
    ?>
        <form action="./../view/details_depenses.php?idDepense" method="get">
          <a href="./../view/details_depenses.php?idDepense=<?php echo $row['idDepense']; ?>">
            <div class="depense_item  <?php echo $row['couleur_depense']; ?>-border">
              <?php
              echo "Date : " . $row["date_depense"] . "<br>";
              echo "Nom : " . $row["detail_depense_text"] . "<br>";
              echo "Montant : " . $row["montant_depense_number"] . "<br>";
              echo "Type : " . $row["type_depense"] . "<br>";
              ?>
            </div>
          </a>
          <button name="id_to_delete_depense" value=<?php echo $row['idDepense']; ?>>Supprimer</button>
        </form>
    <?php
      }
    } else {
      echo "0 results";
    }

    mysqli_close($conn);
    ?>
</div>
</div>
<!--footer-->
<?php include './../scr/footer.php'; ?>
</body>

</html>