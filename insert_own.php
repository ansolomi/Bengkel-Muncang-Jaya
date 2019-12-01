<?php
require_once "config.php";

$id = $nama = $merk = $stock = $harga = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try 
    {
        $jenis = $_POST['iJenis'];
        $merk = $_POST["iMerkBarang"];
        $tipe = $_POST["iTipe"];
        $harga = (float)$_POST["iHarga"];

        $insert_into = "INSERT INTO spareparts(jenis,merk,tipe,harga) VALUES ('$jenis','$merk','$tipe','$harga')";

        pg_query($link, $insert_into);
        echo '<script type="text/javascript">';
        echo ' alert("Data"'.$jenis.'"Berhasil Dimasukkan")';  //not showing an alert box.
        echo '</script>';
    }
    catch(Exception $e)
    {
        echo $e;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
    <meta charset="UTF-8">
    <title>Create Record</title>  
    <link rel="stylesheet" href="theme3.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" METHOD="POST">  
  
     <div class="container">
        
            <br><br><br>
			<div class="form-group">
            <label for="iJenis">Jenis Spareparts:</label>
            <input name = "iJenis" type="text" class="form-control">
            </div>
            

			<div class="form-group">
            <label for="iMerkBarang">Merk Barang:</label>
            <input name = "iMerkBarang" type="text" class="form-control">
            </div>
            
			
			<div class="form-group">
            <label for="iTipe">Tipe Spareparts:</label>
            <input name = "iTipe" type="text" class="form-control">
 			</div>
            

			<div class="form-group">
            <label for="iHarga">Harga Satuan:</label>
            <input name = "iHarga" type="text" class="form-control">
			</div>
    </div>
	<br><br>
<center><input type="submit" class="btn btn-primary btn-lg" value="Submit"></center>
<br>
<center><a type="submit" href="index.php" class="btn btn-lg" value="Finish">Finish</a></center>
</body>
</html>
