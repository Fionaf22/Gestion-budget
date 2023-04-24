<?php
//session_start();
//$_SESSION['login']=$username;
//$_SESSION['password']=password_hash($password, PASSWORD_DEFAULT);

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'username');
define('DB_PASSWORD', '');
define('DB_NAME', 'gestion_argent');

// check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // check if both fields are not empty
    if (!empty($username) && !empty($password)) {

        // connect to the database
        $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        // query the database to find a matching username and password  ;
        $query = "SELECT * FROM profil WHERE username='$username' AND password='password_hash($password, PASSWORD_DEFAULT)'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            // user found, store user information in session or cookie to keep them logged in
            session_start();
            $_SESSION['username'] = $username;

            // redirect to the main page
            header("Location: main.php");
            exit();
        } else {
            // no match found, display an error message
            echo "Invalid username or password.";
        }

        mysqli_close($conn);

    } else {
        // fields are empty, display an error message
        echo "Please enter a username and password.";
    }
}
?>