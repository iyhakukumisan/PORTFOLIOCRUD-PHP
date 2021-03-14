<?php
require_once("../database/connection.php");
$user_id=$_REQUEST["id"];

$sql = mysqli_query($con, "SELECT * FROM tbl_info WHERE id = '$user_id'");

if($row = mysqli_fetch_assoc($sql)){
    $fname = $row["fname"];
    $lname = $row["lname"];
    $email = $row["email"];
    $cont = $row["contact"];

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>CRUD - VIEW</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
 

</head>

<body>
<br><br>

	<div class="container">
		  <h2>INFORMATION</h2>
				
		  <div class="card bg-info text-white">
				
			
			<div class="card-body text-body">
					<label>ID:</label>
					<label><?php echo $user_id;?></label> <br><br>
				
					<label>FIRST NAME:</label>
					<label><?php echo $fname;?></label> <br><br>
				
					<label>LAST NAME:</label>
					<label><?php echo $lname;?></label> <br><br>

					<label>EMAIL:</label>
					<label><?php echo $email;?></label> <br><br>

					<label>CONTACT:</label>
					<label><?php echo $cont;?></label> <br><br>
			
			
			</div> 
			
			<div class="card-footer"> 
			
				<a class="btn btn-warning" href="../admin/crud.php">BACK</a>
			
			</div>
			
		  </div>
	</div>


  

  

   

   

</body>
</html>