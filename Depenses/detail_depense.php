<html>
<head>
<title>Ajout depense</title>
</head>
<body>
<?php

$conn = mysqli_connect("localhost","root","","gestion_argent");

// define variables and set to empty values
$Username=$couleur_depense = $detail_depense_text = $date_depense = $type_Loyer = $type_Course = $type_Loisir = "";

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


if(isset($_SERVER['REQUEST_METHOD']) && ($_SERVER["REQUEST_METHOD"] == 'POST')) {
  $Username = test_input($_POST["Username"]);
  $couleur_depense = test_input($_POST["couleur_depense"]);
  $type_Loyer = test_input($_POST["type_Loyer"]);
  $date_depense = test_input($_POST["date_depense"]);
  $detail_depense_text = test_input($_POST["detail_depense_text"]);
  $type_Course = test_input($_POST["type_Course"]);
  $type_Loisir = test_input($_POST["type_Loisir"]);
}



$sqlCreate = "CREATE TABLE if not exists `gestion_argent`.$Username (`detail_depense_text` VARCHAR(100) NOT NULL , `date_depense` VARCHAR(15) NOT NULL , `couleur_depense` INT(15) NOT NULL , `type_Loyer` INT(15) NOT NULL , `type_Course` INT(15) NOT NULL , `type_Loisir` INT(15) NOT NULL , `idDepense` INT NOT NULL AUTO_INCREMENT , PRIMARY KEY (`idDepense`)) ENGINE = InnoDB;";
if (!mysqli_query($conn, $sqlCreate)) {
    echo "Error: " . $sqlCreate . "<br>" . mysqli_error($conn);
  }

$sql = "INSERT INTO $Username (couleur_depense, detail_depense_text, date_depense, type_Loyer, type_Course, type_Loisir) VALUES (\"$couleur_depense\" , \"$detail_depense_text\" , \"$date_depense\" , \"$type_Loyer\" , \"$type_Course\" , \"$type_Loisir\" );";

if (!mysqli_query($conn, $sql)) {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} 

mysqli_close($conn);
?>
</body>
</html>