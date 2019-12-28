<?php
require_once "config.php";
require_once "insert_own.php";
$posted = false;
$jenis = $tipe = $motor = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try 
    {   
        $posted = true;
        $tipe = $_POST["comTipe"];
        $motor = $_POST["comMotor"];
        
        $new_compat = "INSERT INTO compatibility VALUES ($tipe,$motor)";
        pg_query($new_compat);

      
            echo ("<script>
            alert('Data sudah tercatat');
            window.location.href='insert_own.php';
            </script>");
       
    }

    catch(Exception $e)
    {
        echo $e;
    }
}
?>