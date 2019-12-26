<?php
require_once "config.php";
require_once "insert_own.php";
$posted = false;
$jenis = $tipe = $namaMotor = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try 
    {   
        $posted = true;
        $namaMotor = $_POST["iNamaMotor"];
        
        $new_motor = "INSERT INTO list_motor (nama_motor) VALUES ('$namaMotor')";
        pg_query($new_motor);

      
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