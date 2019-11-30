<html>
<style>
th,td,tr
    {
        border-collapse: collapse;
        
        align: center;
        color: #588c6F;
        font-size: 25px;
        text-align: center;
        border: 2px solid black;
    }	
</style>

<head>
    <link rel="stylesheet" href="theme3.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<head>
 <h1>Daftar Spareparts</h1>
</head>

<?php
require_once 'config.php';
?>

<table border="2">
<br>
  <tr>
    <th>ID</th>
    <th>Jenis</th>
    <th>Merk</th>
    <th>Tipe</th>
    <th>Harga</th>                         
  </tr>

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
<a type="submit" href="index.php" class="btn" value="Finish">Return</a>
<div class="footer"><center>
  <?php for ($i=1; $i<=$pages ; $i++){ ?>
  <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

  <?php } ?>

</div><center>

</html>