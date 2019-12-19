<?php
require_once "config.php";
$posted = false;
$jenis = $merk = '';

// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     try 
//     {
// 		$posted = true;
//         $nama = $_POST['iNama'];
//         $merk = $_POST["iMerkBarang"];

//         $insert_into = "INSERT INTO spareparts(jenis,merk,tipe,harga) VALUES ('$jenis','$merk','$tipe','$harga')";
        
//         pg_query($link, $insert_into);

//     }
//     catch(Exception $e)
//     {
//         echo $e;
//     }
// }
?>
<?php
  require('login.php');
  if(isset($_SESSION['login_user']))
 {?>

<!DOCTYPE html>
<html lang="en">
<head>
	
    <meta charset="UTF-8">
    <title>Delete Record</title>   
    <link rel="stylesheet" href="theme.css" />  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <form class="text-center border border-light p-5" action = "sale_conf.php" METHOD="POST">  
  
    <center>
    <div class="md-form">
        <br><br><br>
		<div class="form-group">
        <label for="iid">Merk Sparepart   :</label>
        <input name = "iMerk" type="text" class="form-control mb-3 col-5" placeholder="Ketik Merk Barang Disini...">
    </div>
    <center>

    <center>
    <div class="md-form">
        <br>
		<div class="form-group">
        <label for="iid">Nama Sparepart   :</label>
        <input name = "iNama" type="text" class="form-control mb-3 col-5" placeholder="Ketik Nama Barang Disini...">
    </div>
    <center>

    <center>
    <div class="md-form">
        <br>
		<div class="form-group">
        <label for="iid">Jumlah  :</label>
        <input name = "iJumlah" type="text" class="form-control mb-3 col-5" placeholder="Ketik Jumlah yang dijual...">
    </div>
    <center>
 
    </div>
<br><br>

<center><input type="submit" class="btn btn-primary btn-lg" value="DELETE"></center>
<br>
<center><a type="submit" href="home.php" class="btn btn-lg" value="CANCEL">Cancel</a></center>
<br>
</body>
</html>

 <?php }

else 
{
    header("Location: index.php");
}
