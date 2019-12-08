<?php

require_once "config.php";
$id = '';

// if($_SERVER["REQUEST_METHOD"] == "POST")
// {
//         try 
//         {
//             $id = $_POST['iid'];
//             $deletes = "DELETE FROM spareparts WHERE id = $id ";
//             $deletel = "DELETE FROM list WHERE id = $id ";
//             pg_query($link, $deletel);
//             pg_query($link, $deletes);
//         }
    
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
    <form class="text-center border border-light p-5" action = "delete_conf.php" METHOD="POST">  
  
    <center>
    <div class="md-form">
        <br><br><br>
		<div class="form-group">
        <label for="iid">ID Sparepart   :</label>
        <input name = "iid" type="text" class="form-control mb-3 col-5" placeholder="Ketik ID Barang Disini...">
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
