<?php
require_once "config.php";
$posted = false;
$jenis = $tipe = $namaMotor = '';
$sql = "SELECT DISTINCT nama_motor FROM list_motor";
$result = pg_query($sql);

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
        
        $new_sparepart = "INSERT INTO spareparts (jenis,tipe,nama_motor) VALUES ('$jenis','$merk','$tipe','$harga')";
        $new_stock = "INSERT INTO stock(stock) VALUES ('$stock')";
        pg_query($new_sparepart);
        pg_query($new_stock);

        //Checklist for Insert Motor Baru
        $check = "SELECT nama_motor FROM list_motor where nama_motor = '$namaMotor' LIMIT 1";
        $stmt = pg_prepare($link, "my_query",$check);
        $stmt=pg_execute($link,"my_query",array());
        @$param = pg_fetch_result($stmt,1);

        if($param == FALSE)
        {
        //For Add Motor
        $insert_into = "INSERT INTO list_motor (nama_motor) VALUES ('$namaMotor')";
        $insert_into = pg_query($insert_into);
        }

        else
        {
            echo ("<script>
            alert('Data sudah tercatat');
            window.location.href='insert_own.php';
            </script>");
        }
    }

    catch(Exception $e)
    {
        echo $e;
    }
}
?>

<HTML>
<head>

<nav class="nav nav-pills" id = "left-panel-link">
        <a href="home.php" class="nav-item nav-link active">
          <i class="fa fa-home" ></i> Home
        </a>&nbsp;&nbsp;
</nav>

<style>
  #logout
  {
  position: absolute;
  left: 17px;
  top: 5px;
  }

</style>
    <meta charset="utf-8">
    <title>HomePage Bengkel</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="theme.css" />  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="dynamic.js"></script>
    <br>
</head>

<body>
<!-- <?php
	if($posted == true)
	{
        echo '<script type="text/javascript">';
        echo 'windows.alert("Data '.$jenis.' Berhasil Dimasukkan")';
        echo '</script>';
	}
	
	?> -->


<div class="container">

	<ul class="nav nav-pills justify-content-center" role="tablist">
		<li class="nav-item">
			<a class="nav-link active mx-auto" data-toggle="pill" href="#home_menu">Tambah Spareparts</a>
		</li>
		<li class="nav-item">
			<a class="nav-link mx-auto" data-toggle="pill" href="#update_menu">Tambah Motor</a>
		</li>
    </ul>
    <br>

	<div class="tab-content">
		<div id="home_menu" class="container tab-pane active"><br>
            <form class="text-center" action="insert_own.php" method='post'>
                <center>
                <div class="md-form">
                <label for="iTipe">Tipe Spareparts:</label>
                <input name = "iTipe" type="text" class="form-control mb-3 col-5" placeholder="Tipe Spareparts...">
                </div>
                </center>

                <center>
                <div class="md-form">
                <label for="iMerk">Merk Spareparts:</label>
                <input name = "iMerk" type="text" class="form-control mb-3 col-5" placeholder="Tipe Spareparts...">
                </div>
                </center>
                
                <center>
                <div class="md-form">
                <label for="iJenis">Jenis Spareparts:</label>
                <input name = "iJenis" type="text" class="form-control mb-3 col-5" placeholder="Jenis Spareparts...">
                </div>
                </center>

                <center>
                <div class="md-form">
                <label for="iHarga">Harga Satuan:</label>
                <input name = "iHarga" type="number" class="form-control mb-3 col-5" placeholder="Harga satuan barang...">
                </div>
                </center>

                <center>
                <div class="md-form">
                <label for="iStock">Stock Awal:</label>
                <input name = "iStock" type="number" class="form-control mb-3 col-5" placeholder="Jumlah Stock Awal...">
                </div>
                </center>
                
                <center>
                <div class="md-form">
                <label for="iMerkBarang">Motor Yang Cocok:</label>
                <?php 
                echo "<select name='motorCompat' class='form-control mb-3 col-5' placeholder='Pilih 1 Motor'>";
                while ($row = pg_fetch_array($result)) {
                echo "<option value='" . $row['nama_motor'] . "'>" . $row['nama_motor'] . "</option>";
                }  
                echo "</select>"; 
                ?>
                </div>
                </center>

                <!-- <center>
                <div class="field_wrapper">
                <label for="iTipe">Cocok dengan motor:</label>
                <input type="text" name="field_name[]" value="" class="form-control mb-3 col-5">
                <a href="javascript:void(0);" class="add_button" title="Add field"><img src="add-icon.png"/></a>
                </div>
                </center> -->

                <br><br>
                <center><input type="submit" class="btn btn-primary btn-lg" value="Submit"></center>
            </form>
<br>
		</div>
		
        <div id="update_menu" class="container tab-pane fade"><br>
        <center><h2>Masukkan Entry Motor Baru<h2><center><br>
			<form action = "insert_own.php" class = "text-center" method = "post">
                <center>
                    <div class="md-form">
                        <label for="iNamaMotor">Nama Motor:</label>
                        <input name = "iNamaMotor" type="text" class="form-control mb-3 col-5" placeholder="Nama Motor....">
                    </div>
                </center>
                <center><input type="submit" class="btn btn-primary btn-lg" value="Submit"></center>
			</form> 
		</div>
	</div>
</div>

<script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}
</script>
</body>

</HTML>
