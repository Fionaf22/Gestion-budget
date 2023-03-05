<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Creation de compte</title>
</head>
<body>
<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gestion_argent');

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

// Les données du formulaire
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
} 

// define variables and set to empty values
/*$userpic = */$Lastname = $Firstname = $Username = $Ville = $Email = $passwords = $passwords_verif = "";

$sql = "CREATE TABLE IF NOT EXISTS profil (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Lastname VARCHAR (100),
  Firstname VARCHAR (100),
  Username VARCHAR (100),
  Ville VARCHAR (100),
  Email VARCHAR (100),
  passwords VARCHAR (100),
)";

if(isset($_SERVER['REQUEST_METHOD']) && ($_SERVER["REQUEST_METHOD"] == 'POST')) {
  //$userpic = test_input($_POST["userpic"]);
  $Lastname = test_input($_POST["Lastname"]);
  $Ville = test_input($_POST["Ville"]);
  $Username = test_input($_POST["Username"]);
  $Firstname = test_input($_POST["Firstname"]);
  $Email = test_input($_POST["Email"]);
  $passwords = test_input($_POST["passwords"]);
  $passwords_verif = test_input($_POST["passwords_verif"]);

  // Check if the passwords match
  if ($passwords != $passwords_verif) {
    echo "Passwords do not match.";
    exit();
  }

  // Hash the password
  $passwords = password_hash($passwords, PASSWORD_DEFAULT);

  $_SESSION['login']=$Username;
  $_SESSION['password']=$passwords;

  $sql= "CREATE TABLE if not exists profil (`Lastname` VARCHAR(100) NOT NULL, `Firstname` VARCHAR(100) NOT NULL, `Username` VARCHAR(100) NOT NULL, `Ville` VARCHAR(100) NOT NULL, `Email` VARCHAR(100) NOT NULL, `passwords` VARCHAR(100) NOT NULL,  `idProfil` INT NOT NULL AUTO_INCREMENT , PRIMARY KEY (`idProfil`)) ENGINE = InnoDB;";
  mysqli_query($conn, $sql);

	// Insert the user's information into the database
	$sql = "INSERT INTO profil (Lastname, Firstname, Username, Ville, Email, passwords) VALUES (\"$Lastname\" , \"$Firstname\" , \"$Username\" , \"$Ville\" , \"$Email\" , \"$passwords\" );";

	if (mysqli_query($conn, $sql)) {
		echo "User registered successfully.";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

}

mysqli_close($conn);
?>
</body>
</html>