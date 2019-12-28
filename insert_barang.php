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
        $jenis = $_POST["spJenis"];
        $merk = $_POST["spMerk"];
        $tipe = $_POST["spTipe"];
        $harga = $_POST["spHarga"];
        $stock = $_POST["spStock"];
        
        $new_sparepart = "INSERT INTO spareparts VALUES ('$jenis','$merk','$tipe','$stock','$harga')";
		$update = "INSERT INTO riwayat_restock VALUES ('$tipe','$stock')";
        pg_query($new_sparepart);
		pg_query($update);
		
            echo ("<script>
            alert('Data sudah tercatat');
			window.location.href='#';
            </script>");
      
    }

    catch(Exception $e)
    {
        echo $e;
    }
}
?>


