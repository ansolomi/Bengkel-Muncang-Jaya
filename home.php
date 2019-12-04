<!DOCTYPE html>
<html lang="en">

<head>
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <br>
</head>
<body>
<center><h2 id="welcome">Welcome Back, Administrator</h2><center>
<div class = "w3-container">
    <div class="card bg-dark text-white">
 <div class="card-body">
 <center><h1 class="display-4">Inventory<br>Bengkel Anjai</h1></center>
 </div>
 </div>
 <br><br>
</div>

<center>
  <button class="w3-bar-item w3-button" onclick="openCity('London')">Home</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Paris')">Update</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Tokyo')">Compatibility</button>
</center>

<div id="London" class="w3-container city">
<br><br>
 <form class = "button">
  <center><div class ="btn">
  <a href="view.php" class="btn btn-dark btn-lg"><font size='5'>View Inventory</font></a> 
  </div></center>
 </form> 
</div>

<div id="Paris" class="w3-container city" style="display:none">
<br><br>
  <form class = "button">
  <center><div class ="btn">
  <a href="insert_own.php" class="btn btn-dark btn-lg "><font size='5'>Add New Item</font></a><br><br>
  <a href="#" class="btn btn-dark btn-lg"><font size='5'>Delete Item</font></a><br><br>
  <a href="#" class="btn btn-dark btn-lg"><font size='5'>Sale Today</font></a>
  </div></center>
 </form> 
</div>

<div id="Tokyo" class="w3-container city" style="display:none">
<br><br>
   <form class = "button">
  <center><div class ="btn">
  <a href="insert_own.php" class="btn btn-dark btn-lg "><font size='5'>Compatibility List</font></a><br><br>
  </div></center>
 </form> 
</div>

<b id="logout"><a href="logout.php" class="btn btn-dark btn-lg"><font size='5'>Log Out</font></a>

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
</html>
