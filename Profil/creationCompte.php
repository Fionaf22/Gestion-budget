<html>
<head>
<title>Création compte</title>
</head>
<body>
<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'username');
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
  if ($password != $passwords_verif) {
    echo "Passwords do not match.";
    exit();
  }

  // Hash the password
  $password = password_hash($password, PASSWORD_DEFAULT);

	// Insert the user's information into the database
	$sql = "INSERT INTO profils (Lastname, Firstname, Username, Ville, Email, passwords) VALUES (\"$Lastname\" , \"$Firstname\" , \"$Username\" , \"$Ville\" , \"$Email\" , \"$passwords\" );";

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