<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./../styles/header.css" rel="stylesheet"/>
    <link href="./../styles/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Sign in</title>
</head>
<body>

<header class="HeaderHomepage">

<?php include './../scr/menu.php';?>
  
</header>
<form method="post" action="login.php">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username">

    <label for="password">Password:</label>
    <input type="password" name="password" id="password">

    <input type="submit" value="Log in">
</form>

<!--footer-->
<?php include './../scr/footer.php'; ?>
</body>
</html>