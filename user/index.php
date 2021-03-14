<?php
session_start();

include("../database/connection.php");
if(isset($_SESSION["id"])){
    $user_id = $_SESSION["id"];
    
	
    $get_record = mysqli_query($con, "SELECT * FROM tbl_info WHERE id = '$user_id'");
    while($row = mysqli_fetch_assoc($get_record)){
			$dbid = $row["id"];
            $dbfname = $row["fname"];
            $dblname = $row["lname"];
            $dbemail = $row["email"];
            $dbcontact = $row["contact"];
			
			$newname = $dbfname . " " . $dblname;

            // echo "WELCOME " . $dblname . "," . $dbfname . "<br>";
            // echo "CONTACT: " . $dbcontact . "<br>";
            // echo "EMAIL: " . $dbemail . "<br><br>";

            // echo "<a href='logout.php'>LOG OUT</a>";


    }

}
else{
    echo "YOU must login FIRST! <a href='../login.php'>LOGIN NOW!</a>";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $newname; ?></title>

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <style>
	.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  
}
  
  
  </style>


</head>
<body>


<br>
<div class="container">
  <h2><?php echo $newname; ?></h2>
  <p>My Profile</p>
  <div class="card" style="width:400px">
	<img class="card-img-top" src="../picture/noimg.jpg" alt="Me" style="width:100%">
   
    <div class="card-body">
      <h4 class="card-title"><?php echo $newname; ?></h4>
      <p class="card-text">Email: <?php echo $dbemail; ?></p>
	  <p class="card-text">Contact: <?php echo $dbcontact; ?></p>
      <?php echo "<a class='btn btn-primary' href='edituserinfo.php?id=$user_id'>EDIT INFO</a>" ?>
	  <a href="logout.php" class="btn btn-danger">LOG OUT</a>
    </div>
  </div>
 </div>
  <br>



</body>
</html>