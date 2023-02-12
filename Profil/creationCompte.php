<html>
<head>
<title>Création compte</title>
</head>
<body>
<?php

echo '<p>Hello World</p>'; 
$con = mysqli_connect("localhost"," root@localhost","","gesion_argent");

// define variables and set to empty values
/*$userpic = */$Lastname = $Firstname = $Username = $ville = $Email = $password = "";

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //$userpic = test_input($_POST["userpic"]);
  $Lastname = test_input($_POST["Lastname"]);
  $ville = test_input($_POST["ville"]);
  $Username = test_input($_POST["Username"]);
  $Firstname = test_input($_POST["Firstname"]);
  $Email = test_input($_POST["Email"]);
  $password = test_input($_POST["password"]);
}



$sql = "INSERT INTO profils (/*userpic, */Lastname, Firstname, Username, ville, Email, 'Password')
VALUES (/*$userpic , */$Lastname , $Firstname , $Username , $ville , $Email , $password )";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
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