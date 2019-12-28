<?php
require_once "config.php";
require_once "insert_own.php";
$posted = false;
$jenis = $tipe = $namajenis = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try 
    {   
        $posted = true;
        $namajenis = $_POST["iNamaJenis"];
        
        $new_jenis = "INSERT INTO jenis (nama_jenis) VALUES ('$namajenis')";
        pg_query($new_jenis);

      
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