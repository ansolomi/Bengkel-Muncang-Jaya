
<?php
    include('login.php'); // Includes Login Script
        if(isset($_SESSION['login_user']))
        {
            header("location: home.php"); // Redirecting To Profile Page
        }
?>

<!DOCTYPE html>
<html>
<head>
<title>Login ke Bengkel</title>
</head>

<body>
<div id="login">
<h2>Login Form</h2>

<form action="login.php" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password"><br><br>
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</body>
</html>
