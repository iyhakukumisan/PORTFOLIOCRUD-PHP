
<?php
require_once("../database/connection.php");    
$user_id=$_REQUEST["id"];     ///may warning dito

$fname = $lname=$email=$cont=$un=$pw="";

$errorfname = $errorlname = $erroremail = $errorcontact = $unameErr = $passErr = $cpassErr =  "";
$sql = mysqli_query($con, "SELECT * FROM tbl_info WHERE id = '$user_id'");


if($row = mysqli_fetch_assoc($sql)){

	$un = $row["uname"];
	$pw = $row["pword"];
}

					

	
	if(isset($_GET["btn_update"])){
	$error=0;
	


    if(empty($_GET["txtpass"])){
        $error++;
        $passErr = "PASSWORD REQUIRED!";
		$user_id = $user_id;
    }

    if(empty($_GET["txtcpass"])){
        $error++;
        $cpassErr = "CONFIRM PASSWORD REQUIRED!";
    }

    if($_GET["txtpass"] != $_GET["txtcpass"]){
        $error++;
        $cpassErr = "PASSWORD missmatch!";
    }
	
	
	if($error==0){
			//update user info
			
			 $check_username = mysqli_query($con, "SELECT * FROM tbl_info WHERE uname='$uu'");
            $check_uname_rows = mysqli_num_rows($check_username);
            if($check_uname_rows > 0){
                $unameErr = "USERNAME already Exists!";
            }
			else{
				
					$user_idd = $_REQUEST["txtID"];
					   
						$uu = $_REQUEST["txtu"];
						$pp = $_REQUEST["txtcpass"];
						
						mysqli_query($con, "UPDATE tbl_info SET  uname = '$uu', pword='$pp' WHERE id = '$user_idd'");

						echo "<script language='javascript'>alert('Record has been update!')</script>";
						echo "<script>window.location.href='../user/index.php';</script>";
				
				
			}
				
	}
	
	   mysqli_close($con);

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
<h2>UPDATE ACCOUNT</h2>

	 <div class="card bg-light text-dark">
			<div class="card-body">
				<div class="container">
						<form method="GET" action="<?php htmlspecialchars("PHP_SELF");?>">
								<input type="hidden" name="txtID" value="<?php echo $user_id;?>"><br>
									
									<div class="form-group">
										  <label for="username">USERNAME:</label>
										  <input type="text" class="form-control" name="txtu" value="<?php echo $un;?>"><br>
										  <span style="color:red;"><?php echo $unameErr; ?></span>
									</div>
									
									<div class="form-group">
										  <label for="contact">NEW PASSWORD:</label>
										  <input type="password" class="form-control" name="txtpass" value="<?php echo $pw;?>"><br>
										  <span style="color:red;"><?php echo $passErr; ?></span><br>
									</div>
									
									<div class="form-group">
										  <label for="contact">CONFIRM PASSWORD:</label>
										  <input type="password" class="form-control" name="txtcpass" value="<?php echo $pw;?>"><br>
										  <span style="color:red;"><?php echo $cpassErr; ?></span><br>
									</div>
			
								<input type = "submit"  class="btn btn-success" name="btn_update" value="UPDATE">
								
								<a class="btn btn-danger" href="../user/index.php">CANCEL</a>
						</form>
			
				</div>

			</div>
	</div>





    
</body>
</html>



