<html>
<style>
<!th,td,tr
    {
        border-collapse: collapse;
        
        align: center;
        color: #588c6F;
        font-size: 25px;
        text-align: center;
        border: 2px solid black;
    }	>
.nav{
  position: relative;
}
  #right-panel-link {
  position: absolute;
  margin-left: 9.5%;
}

</style>

<head>
	<link rel="stylesheet" href="theme3.css" >  
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>View Data Spareparts</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<head>
 <h1><center>Daftar Spareparts<center></h1>
</head>

<?php
require_once 'config.php';
?>

    <nav class="nav nav-pills" id = "right-panel-link">
        <a href="index.php" class="nav-item nav-link active">
            <i class="fa fa-home" ></i> Home
        </a>
        &nbsp;&nbsp;

        <a href="insert_own.php" class="nav-item nav-link active">
            <i class="fa fa-pencil-square-o" ></i> Insert
        </a>
	</nav>

<br>
<div class="container">
<table class="table table-hover">
<br>
	<thead>
		<tr>
			<th>ID</th>
			<th>Jenis</th>
			<th>Merk</th>
			<th>Tipe</th>
			<th>Harga</th>                         
		 </tr>
	</thead>

  <?php 
  $halaman = 10;
  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
  $result = pg_query("SELECT * FROM spareparts");
  $total = pg_num_rows($result);
  $pages = ceil($total/$halaman);            
  $query = pg_query("select * from spareparts LIMIT $halaman OFFSET $mulai")or die(error);
  $no =$mulai+1;


  while ($data = pg_fetch_assoc($query)) {
    ?>


    <tr>
      <td><?php echo $no++; ?></td>                  
      <td><?php echo $data['jenis']; ?></td>
      <td><?php echo $data['merk']; ?></td>
      <td><?php echo $data['tipe']; ?></td>
      <td><?php echo "Rp.".$data['harga']; ?></td>              
    </tr>


    <?php               
  } 
  ?>
  </table>
</div>
      

<div class="footer"><center>
  <?php for ($i=1; $i<=$pages ; $i++){ ?>
  <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

  <?php } ?>

</div><center>

</html>
