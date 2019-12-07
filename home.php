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
    <link rel="stylesheet" href="theme3.css" />  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <br>
</head>
<body>
<center><h2 id="welcome">Welcome Back, Administrator</h2><center>
<div class = "w3-container">
    <div class="card bg-dark text-white">
 <div class="card-body">
 <center><h1 class="display-4">Inventory<br>Bengkel Tenonet</h1></center>
 </div>
 </div>
 <br><br>
</div>


<div class="container">

	<ul class="nav nav-pills justify-content-center" role="tablist">
		<li class="nav-item">
			<a class="nav-link active mx-auto" data-toggle="pill" href="#home_menu">Home</a>
		</li>
		<li class="nav-item">
			<a class="nav-link mx-auto" data-toggle="pill" href="#update_menu">Update</a>
		</li>
		<li class="nav-item">
			<a class="nav-link mx-auto" data-toggle="pill" href="#compatibility_menu">Compatibility</a>
		</li>
	</ul>


	<div class="tab-content">
		<div id="home_menu" class="container tab-pane active"><br>
			<form class = "button">
			  <center><div class ="btn">
			  <a href="view.php" class="btn btn-dark btn-lg"><font size='5'>View Inventory</font></a> 
			  </div></center>
			</form> 
		</div>
		
		<div id="update_menu" class="container tab-pane fade"><br>
			<form class = "button">
			  <center><div class ="btn">
				  <a href="insert_own.php" class="btn btn-dark btn-lg "><font size='5'>Add New Item</font></a><br><br>
				  <a href="#" class="btn btn-dark btn-lg"><font size='5'>Delete Item</font></a><br><br>
				  <a href="#" class="btn btn-dark btn-lg"><font size='5'>Sale Today</font></a>
			  </div></center>
			</form> 
		</div>
		
		<div id="compatibility_menu" class="container tab-pane fade"><br>
			<form class = "button">
				<center><div class ="btn">
					<a href="insert_own.php" class="btn btn-dark btn-lg "><font size='5'>Compatibility List</font></a><br><br>
				</div></center>
			</form> 
		</div>
		
	</div>
</div>



<!--<center>
  <button class="w3-bar-item btn btn-outline-primary" onclick="openCity('London')">Home</button>
  <button class="w3-bar-item btn btn-outline-primary" onclick="openCity('Paris')">Update</button>
  <button class="w3-bar-item btn btn-outline-primary" onclick="openCity('Tokyo')">Compatibility</button>
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
</div>!-->

<b id="logout"><a href="logout.php" class="btn btn-dark btn-lg"><font size='5'> <i class="fa fa-power-off" ></i> Log Out</font></a>



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
