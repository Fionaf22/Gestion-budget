<?php
session_start();
$login = 'yeonwoo';
$_SESSION['login'] =  $login;
$conn = mysqli_connect("localhost", "root", "", "gestion_argent");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


if (isset($_SESSION['login'])) {
  echo "Your session is running " . $_SESSION['login'];
}

?>
<html>

<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./../styles/header.css" rel="stylesheet"/>
    <link href="./../styles/footer.css" rel="stylesheet">
    <link href="./../styles/depense_list.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Liste dépense</title>
</head>
</head>

<body>
<header class="HeaderHomepage">

<?php include './../scr/menu.php';?>
  
</header>
  <?php

  // define variables and set to empty values
  $couleur_depense = $detail_depense_text = $date_depense = $type_depense = $montant_depense_number = "";
  if (isset($_GET['color-tag'])) {
    $couleur_depense = $_GET['color-tag'];
    $sql = "SELECT * FROM $login WHERE `couleur_depense`='$couleur_depense';";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $couleur_depense = $row['couleur_depense'];
  ?>
        <div class="depense_item  <?php echo $row['couleur_depense']; ?>-border">
          <?php
          echo "Date : " . $row["date_depense"] . "<br>";
          echo "Nom : " . $row["detail_depense_text"] . "<br>";
          echo "Montant : " . $row["montant_depense_number"] . " €<br>";
          echo "Type : " . $row["type_depense"] . "<br>";
          echo "Information complémentaire : " . $row["note_depense"] . "<br>";
          ?>
        </div>
  <?php
      }
    } else {
      echo "0 results";
    }
    //header("Location: ./../scr/ajout_depense.php");
  }

  if (isset($_GET['id_to_delete_depense'])) {
    $idDepense = $_GET['id_to_delete_depense'];
    $sql = "DELETE FROM $login WHERE `$login`.idDepense = $idDepense";
    $result = mysqli_query($conn, $sql);
    header("Location: ./../scr/ajout_depense.php");
  }

   if (isset($_GET['idDepense'])) {
    $idDepense = $_GET['idDepense'];
    $sql = "SELECT * FROM $login where idDepense = $idDepense";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $couleur_depense = $row['couleur_depense'];
  ?>
        <div class="depense_item  <?php echo $row['couleur_depense']; ?>-border">
          <?php
          echo "Date : " . $row["date_depense"] . "<br>";
          echo "Nom : " . $row["detail_depense_text"] . "<br>";
          echo "Montant : " . $row["montant_depense_number"] . " €<br>";
          echo "Type : " . $row["type_depense"] . "<br>";
          echo "Information complémentaire : " . $row["note_depense"] . "<br>";
          ?>
        </div>
  <?php
      }
    } else {
      echo "0 results";
    }
  }

  if (isset($_GET['price'])) {
    $sql = "SELECT * FROM $login ORDER BY montant_depense_number";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $couleur_depense = $row['couleur_depense'];
  ?>
        <div class="depense_item  <?php echo $row['couleur_depense']; ?>-border">
          <?php
          echo "Date : " . $row["date_depense"] . "<br>";
          echo "Nom : " . $row["detail_depense_text"] . "<br>";
          echo "Montant : " . $row["montant_depense_number"] . " €<br>";
          echo "Type : " . $row["type_depense"] . "<br>";
          ?>
        </div>
  <?php
      }
    } else {
      echo "0 results";
    }
    //header("Location: ./../scr/ajout_depense.php");
  }

  if (isset($_GET['date'])) {
    $sql = "SELECT * FROM $login ORDER BY date_depense";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $couleur_depense = $row['couleur_depense'];
  ?>
        <div class="depense_item  <?php echo $row['couleur_depense']; ?>-border">
          <?php
          echo "Date : " . $row["date_depense"] . "<br>";
          echo "Nom : " . $row["detail_depense_text"] . "<br>";
          echo "Montant : " . $row["montant_depense_number"] . " €<br>";
          echo "Type : " . $row["type_depense"] . "<br>";
          ?>
        </div>
  <?php
      }
    } else {
      echo "0 results";
    }
    //header("Location: ./../scr/ajout_depense.php");
  }

  if (isset($_GET['type'])) {
    $sql = "SELECT * FROM $login ORDER BY type_depense";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $couleur_depense = $row['couleur_depense'];
  ?>
        <div class="depense_item  <?php echo $row['couleur_depense']; ?>-border">
          <?php
          echo "Date : " . $row["date_depense"] . "<br>";
          echo "Nom : " . $row["detail_depense_text"] . "<br>";
          echo "Montant : " . $row["montant_depense_number"] . " €<br>";
          echo "Type : " . $row["type_depense"] . "<br>";
          ?>
        </div>
  <?php
      }
    } else {
      echo "0 results";
    }
    //header("Location: ./../scr/ajout_depense.php");
  }


  mysqli_close($conn);

  ?>

  <!--footer-->
<?php include './../scr/footer.php'; ?>
</body>
</html>