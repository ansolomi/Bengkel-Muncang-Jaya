<?php
    include_once 'config.php';
    session_start();// Starting Session
    // Storing Session
    $user_check = $_SESSION['login_user'];
    // SQL Query To Fetch Complete Information Of User
    $query = "SELECT username from login where username = '$user_check'";
    $ses_sql = pg_query($link, $query);
    $row = pg_fetch_assoc($ses_sql);
    $login_session = $row['username'];
    ?>