<?php
require_once "config.php";
@session_start();
$id = $_POST['iid'];
$jumlah = $_POST['iJumlah'];
$_SESSION['id'] = $id;
$_SESSION['jumlah'] = $jumlah;
?>

<?php
  if(isset($_SESSION['login_user']))
 {?>

<HTML>
    <head>
    <meta charset="UTF-8">
    <title>Transaction</title>  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Data Spareparts</title>
    <link rel="stylesheet" href="theme.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>

    <style>
        h2
        {
            color: red;
        }
        .nav
        {
            size: 52%;
            position: relative;
        }
        #left-panel-link 
        {
            position: absolute;
            margin: auto;
        }
    </style>

    <body>
    <br>
    <center><h1>SELL PART<h1><center>
    <br>
    <div class="container">
    <table class="table table-hover">
    <thead>
		<tr>
			<th>Nama Jenis</th>
			<th>Nama Merk</th>
			<th>Nama Tipe</th>
			<th>Stock</th>     
            <th>Harga</th>                      
		 </tr>
	</thead>

    <?php
        $preview = pg_query($link,"SELECT nama_jenis, nama_merk, nama_tipe, stock, harga, (harga*$jumlah) AS harga_total FROM sale_preview WHERE id_tipe = $id");
        while ($data = pg_fetch_assoc($preview)) 
        {
    ?>
    <tr>                
        <td><?php echo $data['nama_jenis']; ?></td> 
        <td><?php echo $data['nama_merk']; ?></td>
        <td><?php echo $data['nama_tipe']; ?></td>
        <td><?php echo $data['stock']; ?></td>
        <td><?php echo 'Rp.'.$data['harga_total']; ?></td>
        <?php $_SESSION['harga'] = $data['harga_total']; ?>
    </tr>

    <?php 
        } 
    ?>
    </table>
    <br>
    <center><h2>Barang diatas akan dijual sebanyak <?php echo $jumlah ?> buah. PASTIKAN STOCK ADA<h2><center>
    
    <br><br>
    <center><a type="submit" href="sale_fix.php" class="btn btn-primary btn-lg" hrefvalue="SELl">SELL</a></center>
    <br>
    <center><a type="submit" href="home.php" class="btn btn-lg" value="CANCEL">Cancel</a></center>

    </body>

</HTML>

<?php 
}

else
{
    header("Location: index.php");
}
?>
