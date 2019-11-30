<?php
require_once 'config.php';
?>

<table border="1">
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
  $query = pg_query("select * from spareparts LIMIT $mulai OFFSET $halaman")or die(error);
  $no =$mulai+1;


  while ($data = pg_fetch_assoc($query)) {
    ?>
    <tr>
      <td><?php echo $no++; ?></td>                  
      <td><?php echo $data['jenis']; ?></td>
      <td><?php echo $data['nerk']; ?></td>
      <td><?php echo $data['tipe']; ?></td>
      <td><?php echo "Rp.".$data['harga']; ?></td>              
                  
    </tr>

    <?php               
  } 
  ?>
  

</table>          

<div class="">
  <?php for ($i=1; $i<=$pages ; $i++){ ?>
  <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

  <?php } ?>

</div>