<?php
    session_start(); // Starting Session
    $error = ''; // Variable To Store Error Message
    if (isset($_POST['submit'])) 
    {
        if (empty($_POST['username']) || empty($_POST['password'])) 
        {
            $error = "Username or Password is invalid";
        }
        else
        {
            $username = $_POST['username'];
            $passraw = $_POST['password'];
            $password = md5("$passraw");
            require_once 'config.php';
            $query = "SELECT username, password from login where username= '$username' AND password= '$password' LIMIT 1";
            $stmt = pg_prepare($link, "my_query",$query);
            $stmt=pg_execute($link,"my_query",array());
            $param = pg_fetch_result($stmt,1);
            if($param == TRUE)
            {
            $_SESSION['login_user'] = $username; // Initializing Session
            header("location: home.php"); // Redirecting To Home Page
            }

            echo $password;
        }
    }
?>