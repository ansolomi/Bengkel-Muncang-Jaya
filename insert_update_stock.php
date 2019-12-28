<?php
require_once "config.php";
require_once "insert_own.php";
$posted = false;
$jenis = $tipe = $namaMotor = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try 
    {   
        $posted = true;
        $tipe_2 = $_POST['iTipe_2'];
        $stock = $_POST['iStock_update'];
        
        $new_stock = "UPDATE spareparts SET stock = stock + $stock WHERE id_tipe = $tipe_2";
        $update_date = "INSERT INTO riwayat_restock (id_tipe,jumlah) VALUES ($tipe_2,$stock)";
        pg_query($new_stock);
        pg_query($update_date);

      
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