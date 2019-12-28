<?php
require_once "config.php";
$posted = false;
$jenis = $tipe = $namaMotor = '';
$sql = "SELECT DISTINCT nama_motor FROM motor ORDER BY nama_motor ASC";
$jenis = pg_query("SELECT * FROM jenis ORDER BY nama_jenis ASC");
$tipe = pg_query("SELECT * FROM tipe ORDER BY nama_tipe ASC");
$tipe2 = pg_query("SELECT * FROM tipe ORDER BY nama_tipe ASC");
$tipe3 = pg_query("SELECT * FROM tipe ORDER BY nama_tipe ASC");
$merk = pg_query("SELECT * FROM merk ORDER BY nama_merk ASC");
$motor = pg_query("SELECT * FROM motor ORDER BY nama_motor ASC");
$result = pg_query($sql);

?>

<HTML>
<head>
<br>
<nav class="nav nav-pills" id = "left-panel-link">
        &nbsp &nbsp <a href="home.php" class="nav-item nav-link active">
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
   <a class="nav-link mx-auto" data-toggle="pill" href="#tambah_motor">Tambah Motor</a>
  </li>
  <li class="nav-item">
   <a class="nav-link mx-auto" data-toggle="pill" href="#tambah_jenis">Tambah Jenis</a>
  </li>
  <li class="nav-item">
   <a class="nav-link mx-auto" data-toggle="pill" href="#tambah_merk">Tambah Merk</a>
  </li>
  <li class="nav-item">
   <a class="nav-link mx-auto" data-toggle="pill" href="#tambah_tipe">Tambah Tipe</a>
  </li>
  <li class="nav-item">
   <a class="nav-link mx-auto" data-toggle="pill" href="#tambah_compat">Tambah Compatibility</a>
  </li>
  <li class="nav-item">
   <a class="nav-link mx-auto" data-toggle="pill" href="#update_stock">Tambah Stock</a>
  </li>
    </ul>
    <br>

 <div class="tab-content">
  <div id="home_menu" class="container tab-pane active"><br>
            <form class="text-center" action="insert_barang.php" method='post'>

                <center>
                <div class="md-form">
                    <label>Jenis Spareparts:</label>
                        <?php 
                        echo "<select name='spJenis' class='form-control mb-3 col-5' placeholder='Pilih Jenis'>";
                        while ($rowj = pg_fetch_array($jenis)) 
                        {
                          echo "<option value='" . $rowj['id_jenis'] . "'>" . $rowj['nama_jenis'] . "</option>";
                        }  
                        echo "</select>"; 
                        ?>
                </div>
                </center>

                <center>
                <div class="md-form">
                    <label>Merk Spareparts:</label>
                        <?php 
                        echo "<select name='spMerk' class='form-control mb-3 col-5' placeholder='Pilih Merk'>";
                        while ($rowm = pg_fetch_array($merk)) 
                        {
                          echo "<option value='" . $rowm['id_merk'] . "'>" . $rowm['nama_merk'] . "</option>";
                        }  
                        echo "</select>"; 
                        ?>
                </div>
                </center>

                <center>
                <div class="md-form">
                    <label>Tipe Spareparts:</label>
                        <?php 
                        echo "<select name='spTipe' class='form-control mb-3 col-5' placeholder='Pilih Tipe'>";
                        while ($rowt = pg_fetch_array($tipe)) 
                        {
                          echo "<option value='" . $rowt['id_tipe'] . "'>" . $rowt['nama_tipe'] . "</option>";
                        }  
                        echo "</select>"; 
                        ?>
                </div>
                </center>

                <center>
                <div class="md-form">
                <label for="spStock">Stock Awal:</label>
                <input name = "spStock" type="Number" class="form-control mb-3 col-5" placeholder="Stock Awal...">
                </div>
                </center>

                <center>
                <div class="md-form">
                <label for="spHarga">Harga Jual (Tidak menggunakan koma [,] atua titik [.]):</label>
                <input name = "spHarga" type="Number" class="form-control mb-3 col-5" placeholder="Harga Jual...">
                </div>
                </center>

                <br><br>
                <center><input type="submit" class="btn btn-primary btn-lg" value="Submit"></center>
            </form>
<br>
  </div>
  
  <div id="tambah_motor" class="container tab-pane fade"><br>
    <center><h4>Masukkan Entry Motor Baru<h4></center><br>
      <form action = "insert_motor.php" class = "text-center" method = "post">
        <center>
          <div class="md-form">
            <label for="iNamaMotor">Nama Motor:</label>
            <input name = "iNamaMotor" type="text" class="form-control mb-3 col-5" placeholder="Nama Motor....">
          </div>
         </center>
    <center><input type="submit" class="btn btn-primary btn-lg" value="Submit"></center>
    </form> 
  </div>

  <div id="tambah_jenis" class="container tab-pane fade"><br>
    <center><h4>Masukkan Entry Jenis Baru<h4></center><br>
      <form action = "insert_jenis.php" class = "text-center" method = "post">
        <center>
          <div class="md-form">
            <label for="iNamaJenis">Nama Jenis:</label>
            <input name = "iNamaJenis" type="text" class="form-control mb-3 col-5" placeholder="Nama Tipe....">
          </div>
         </center>
    <center><input type="submit" class="btn btn-primary btn-lg" value="Submit"></center>
    </form> 
  </div>

  <div id="tambah_merk" class="container tab-pane fade"><br>
    <center><h4>Masukkan Entry Merk Baru<h4></center><br>
      <form action = "insert_merk.php" class = "text-center" method = "post">
        <center>
          <div class="md-form">
            <label for="iNamaMerk">Nama Merk:</label>
            <input name = "iNamaMerk" type="text" class="form-control mb-3 col-5" placeholder="Nama Merk....">
          </div>
         </center>
    <center><input type="submit" class="btn btn-primary btn-lg" value="Submit"></center>
    </form> 
  </div>

  <div id="tambah_tipe" class="container tab-pane fade"><br>
    <center><h4>Masukkan Entry Tipe Baru<h4></center><br>
      <form action = "insert_tipe.php" class = "text-center" method = "post">
        <center>
          <div class="md-form">
            <label for="iNamaTipe">Nama Tipe:</label>
            <input name = "iNamaTipe" type="text" class="form-control mb-3 col-5" placeholder="Nama Tipe....">
          </div>
         </center>
    <center><input type="submit" class="btn btn-primary btn-lg" value="Submit"></center>
    </form> 
  </div>

  <div id="tambah_compat" class="container tab-pane fade"><br>
    <center><h4>Masukkan Entry Compatibility Baru<h4></center><br>
      <form action = "insert_compat.php" class = "text-center" method = "post">
      <center>
        <div class="md-form">
          <label>Tipe Spareparts:</label>
          <?php 
            echo "<select name='comTipe' class='form-control mb-3 col-5' placeholder='Pilih Tipe'>";
            while ($rowt = pg_fetch_array($tipe2)) 
            {
              echo "<option value='" . $rowt['id_tipe'] . "'>" . $rowt['nama_tipe'] . "</option>";
            }  
            echo "</select>"; 
          ?>
          </div>
      </center>

      <center>
        <div class="md-form">
          <label>Tipe Motor:</label>
          <?php 
            echo "<select name='comMotor' class='form-control mb-3 col-5' placeholder='Pilih Motor'>";
            while ($rowm = pg_fetch_array($motor)) 
            {
              echo "<option value='" . $rowm['id_motor'] . "'>" . $rowm['nama_motor'] . "</option>";
            }  
            echo "</select>"; 
          ?>
          </div>
      </center>

    <center><input type="submit" class="btn btn-primary btn-lg" value="Submit"></center>
    </form> 
  </div>
  
  <div id="update_stock" class="container tab-pane fade"><br>
        <center><h4>Masukkan ID barang dan stock yang ingin ditambah<h4><center><br>
            <form action = "insert_update_stock.php" class = "text-center" method = "post">
              <center>
                <div class="md-form">
                    <label>Tipe Spareparts:</label>
                        <?php 
                        echo "<select name='iTipe_2' class='form-control mb-3 col-5' placeholder='Pilih Tipe'>";
                        while ($rowt2 = pg_fetch_array($tipe3)) 
                        {
                          echo "<option value='" . $rowt2['id_tipe'] . "'>" . $rowt2['nama_tipe'] . "</option>";
                        }  
                        echo "</select>"; 
                        ?>
                </div>
              </center>
         
            <center>
                <div class="md-form">
                <label for="iStock_update">Banyak Stock Baru:</label>
                <input name = "iStock_update" type="number" class="form-control mb-3 col-5" placeholder="Jumlah Barang Baru">
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