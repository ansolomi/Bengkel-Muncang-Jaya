<?php
require_once "config.php";
$posted = false;
$id = $nama = $merk = $stock = $harga = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try 
    {
		$posted = true;
        $jenis = $_POST['iJenis'];
        $merk = $_POST["iMerkBarang"];
        $tipe = $_POST["iTipe"];
        $harga = (float)$_POST["iHarga"];

        $insert_into = "INSERT INTO spareparts(jenis,merk,tipe,harga) VALUES ('$jenis','$merk','$tipe','$harga')";

        pg_query($link, $insert_into);

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
<style>
.nav{
  position: relative;
}
  #left-panel-link {
  position: absolute;
  margin-left: 9.5%;
}
</style>
	
    <meta charset="UTF-8">
    <title>Create Record</title>  
    <link rel="stylesheet" href="theme.css" />  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

 <h1><center>Insert Spareparts<center></h1>
</head>

<body>
	<?php
	if($posted == true)
	{
        echo '<script type="text/javascript">';
        echo 'windows.alert("Data '.$jenis.' Berhasil Dimasukkan")';
        echo '</script>';
	}
	
	?>

<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" METHOD="POST">  
 
   

	   <br>
	
		
			<form class="text-center border border-light p-5" action="#!">
			
			<center>
			<div class="md-form">
            <label for="iJenis">Jenis Spareparts:</label>
            <input name = "iJenis" type="text" class="form-control mb-3 col-5">
            </div>
			</center>

			<center>
			<div class="md-form">
            <label for="iMerkBarang">Merk Barang:</label>
            <input name = "iMerkBarang" type="text" class="form-control mb-3 col-5">
            </div>
            </center>
			
			<center>
			<div class="md-form">
            <label for="iTipe">Tipe Spareparts:</label>
            <input name = "iTipe" type="text" class="form-control mb-3 col-5">
 			</div>
            </center>

			<center>
			<div class="form-group">
            <label for="iHarga">Harga Satuan:</label>
            <input name = "iHarga" type="text" class="form-control mb-3 col-5">
			</div>
			</center>
			

	<br><br>
<center><input type="submit" class="btn btn-primary btn-lg" value="Submit"></center>
</form>
<br>
<center><a type="submit" href="index.php" class="btn btn-outline-primary btn-lg" value="Finish">Finish</a></center>
</body>
</html>
