<html>
<head>
<title>Création compte</title>
</head>
<body>
<?php

$conn = mysqli_connect("localhost","root","","gestion_argent");

// define variables and set to empty values
/*$userpic = */$Lastname = $Firstname = $Username = $Ville = $Email = $passwords = "";

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";


if(isset($_SERVER['REQUEST_METHOD']) && ($_SERVER["REQUEST_METHOD"] == 'POST')) {
  //$userpic = test_input($_POST["userpic"]);
  $Lastname = test_input($_POST["Lastname"]);
  $Ville = test_input($_POST["Ville"]);
  $Username = test_input($_POST["Username"]);
  $Firstname = test_input($_POST["Firstname"]);
  $Email = test_input($_POST["Email"]);
  $passwords = test_input($_POST["passwords"]);
}



$sql = "INSERT INTO profils (Lastname, Firstname, Username, Ville, Email, passwords) VALUES (\"$Lastname\" , \"$Firstname\" , \"$Username\" , \"$Ville\" , \"$Email\" , \"$passwords\" );";

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