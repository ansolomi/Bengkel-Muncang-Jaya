<?php
session_start();
require_once "config.php";
$id = $_POST['iid'];
$_SESSION['id'] = $id;

// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     try 
//     {
//         $delete = "DELETE FROM list,spareparts WHERE id = $id ";
//         pg_query($link, $delete);
//         echo '<script type="text/javascript">';
//         echo ' alert("Data"'.$jenis.'"Berhasil Dimasukkan")';  //not showing an alert box.
//         echo '</script>';
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

<HTML>
    <head>
    <meta charset="UTF-8">
    <title>Delete Record</title>  
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
    <center><h1>DELETE DATA<h1><center>
    <br>
    <div class="container">
    <table class="table table-hover">
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
        $preview = pg_query($link,"SELECT * FROM spareparts WHERE id = $id");
        while ($data = pg_fetch_assoc($preview)) 
        {
    ?>
    <tr>
        <td><?php echo $data['id']; ?></td>                  
        <td><?php echo $data['jenis']; ?></td>
        <td><?php echo $data['merk']; ?></td>
        <td><?php echo $data['tipe']; ?></td>
        <td><?php echo "Rp.".$data['harga']; ?></td>              
    </tr>

    <?php 
        } 
    ?>
    </table>
    <br>
    <center><h2>Data diatas akan DIHAPUS dan tidak dapat di recover kembali. Lanjut?<h2><center>
    
    <center>
    <nav class="nav nav-pills" id = "left-panel-link">
        <a href="delete_fix.php" class="nav-item nav-link active">
            <i class="" ></i> Yes
        </a>&nbsp;&nbsp;

        <a href="home.php" class="nav-item nav-link active">
            <i class="" ></i> No
        </a>
    </nav>
    <center>
    </body>

</HTML>

<?php 
}

else
{
    header("Location: index.php");
}
?>