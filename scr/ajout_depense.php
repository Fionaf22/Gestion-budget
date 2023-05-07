<?php
session_start();
$_SESSION['username'] = 'shin';

?>
<html>

<head>
  <title>Ajout depense</title>
  <link href="./../styles/depense_list.css" rel="stylesheet" />
  <link href="./../styles/header.css" rel="stylesheet" />
</head>

<body>
  <header class="HeaderHomepage">
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
  <?php

  $conn = mysqli_connect("localhost", "root", "", "gestion_argent");

  // define variables and set to empty values
  $Username = $couleur_depense = $detail_depense_text = $date_depense = $type_depense = $note_depense = $montant_depense_number = "";


  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  //echo "Connected successfully";

  if (isset($_POST['Type-depense-select'])) {
    $typeDepense = $_POST['Type-depense-select'];
    echo "Le type de dépense sélectionné est : " . $typeDepense;
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
  //$Username = $_SESSION['login'];
  $Username = 'shin';
  $sqlCreate = "CREATE TABLE if not exists `gestion_argent`.$Username ( `idDepense` INT NOT NULL AUTO_INCREMENT ,`detail_depense_text` VARCHAR(100) NOT NULL , `date_depense` VARCHAR(15) NOT NULL , `montant_depense_number` DECIMAL(10, 2) NOT NULL , `couleur_depense` VARCHAR(30) NOT NULL , `type_depense` VARCHAR(100) NOT NULL, `note_depense` VARCHAR(250) NOT NULL  ,  PRIMARY KEY (`idDepense`)) ENGINE = InnoDB;";
  if (!mysqli_query($conn, $sqlCreate)) {
    echo "Error: " . $sqlCreate . "<br>" . mysqli_error($conn);
    echo "<br>Liste de dépense vide <br>";
  }

  if (isset($_POST['bouton_depense'])) {
    if (!isset($_SESSION['form_submitted'])) {
      if (!empty($montant_depense_number)) {
        $sql = "INSERT INTO `gestion_argent`.$Username (couleur_depense, detail_depense_text,montant_depense_number, date_depense,type_depense,optgroup_label, note_depense) VALUES (\"$couleur_depense\" , \"$detail_depense_text\" ,\"$montant_depense_number\", \"$date_depense\",   \"$type_depense\", \"$note_depense\" );";
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
  $sql = "SELECT * FROM $Username ORDER BY couleur_depense, type_depense";
  $result = mysqli_query($conn, $sql);
  ?>
  <div class="depense_list ">
    <?php
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $couleur_depense = $row['couleur_depense'];
    ?>
        <form action="./../view/details_depenses.php?idDepense" method="get">
          <a href="./..//view/details_depenses.php?idDepense=<?php echo $row['idDepense']; ?>">
            <div class="depense_item  <?php echo $row['couleur_depense']; ?>-border">
              <?php
              echo "Date : " . $row["date_depense"] . "<br>";
              echo "Nom : " . $row["detail_depense_text"] . "<br>";
              echo "Montant : " . $row["montant_depense_number"] . "<br>";
              echo "Type : " . $row["type_depense"] . "<br>";
              ?>
            </div>
          </a>
          <input type="hidden" name="idDepense" value="<?php echo $row['idDepense']; ?>">
        </form>
    <?php
      }
    } else {
      echo "0 results";
    }

    mysqli_close($conn);
    ?>

</body>

</html>