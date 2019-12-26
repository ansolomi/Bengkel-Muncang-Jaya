<?php
require_once "config.php";
require_once "insert_own.php";
$posted = false;
$jenis = $tipe = $namaMotor = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try 
    {   
        $posted = true;
        $namaMotor = $_POST["motorCompat"];
        $jenis = $_POST["iJenis"];
        $merk = $_POST["iMerk"];
        $tipe = $_POST["iTipe"];
        $harga = $_POST["iHarga"];
        $stock = $_POST["iStock"];
        
        $new_sparepart = "INSERT INTO spareparts (jenis,merk,tipe,harga) VALUES ('$jenis','$merk','$tipe',$harga)";
		$new_stock = "INSERT INTO stock(id_tipe, stock) VALUES ((SELECT id_tipe FROM spareparts WHERE jenis = $jenis AND merk = $merk AND tipe = $tipe AND harga = $harga), $stock)";
        pg_query($new_sparepart);
        pg_query($new_stock);
		
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