<?php

require_once("../database/connection.php");
$user_id="";
$user_id=$_REQUEST["id"];


$sql = mysqli_query($con, "SELECT * FROM tbl_info WHERE id = '$user_id'");


if($row = mysqli_fetch_assoc($sql)){
    $fname = $row["fname"];
    $lname = $row["lname"];
    $email = $row["email"];
    $cont = $row["contact"];
	$un = $row["uname"];
	$pw = $row["pword"];

}

?>

<!DOCTYPE html>
<html lang= "en">
    <head>
	
	<title>CRUD - UPDATE</title>
 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
 
 
</head>
<body>
<br>
<h2>UPDATE INFORMATION</h2>

	 <div class="card bg-light text-dark">
			<div class="card-body">
				<div class="container">
						<form method="GET" action="<?php htmlspecialchars("PHP_SELF");?>">
								<input type="hidden" name="txtID" value="<?php echo $user_id;?>"><br>
									 <div class="form-group">
										  <label for="firstname">FIRST NAME:</label>
										  <input type="text" class="form-control" name="txtfname" value="<?php echo $fname;?>"><br>
									</div>
									
									 <div class="form-group">
										  <label for="lastname">LAST NAME:</label>
										  <input type="text" class="form-control" name="txtlname" value="<?php echo $lname;?>"><br>
									</div>
									
									<div class="form-group">
										  <label for="email">EMAIL:</label>
										  <input type="text" class="form-control" name="txtemail" value="<?php echo $email;?>"><br>
									</div>
									
									<div class="form-group">
										  <label for="contact">CONTACT:</label>
										  <input type="text" class="form-control" name="txtcont" value="<?php echo $cont;?>"><br>
										 
									</div>
									
									
			
								<input type = "submit"  class="btn btn-success" name="btn_update" value="UPDATE">
								<?php echo "<a class='btn btn-warning' href='../user/password.php?id=$user_id'>EDIT ACCOUNT</a>" ?>
								<a class="btn btn-danger" href="../user/index.php">CANCEL</a>
						</form>
			
				</div>

			</div>
	</div>





    
</body>
</html>


<?php
    if(isset($_GET["btn_update"])){
        $user_idd = $_REQUEST["txtID"];
        $fN = $_REQUEST["txtfname"];
        $lN = $_REQUEST["txtlname"];
        $em = $_REQUEST["txtemail"];
        $contact = $_REQUEST["txtcont"];

        mysqli_query($con, "UPDATE tbl_info SET fname='$fN', lname='$lN',email = '$em',contact = '$contact' WHERE id = '$user_idd'");

        echo "<script language='javascript'>alert('Record has been update!')</script>";
        echo "<script>window.location.href='../user/index.php';</script>";

    }
    mysqli_close($con);




?>

