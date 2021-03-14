<?php
require_once("../database/connection.php"); // always add here in the top
$fname = $lname = $email = $cont = $uname = $pass = $cpass = "" ;
$errorfname = $errorlname = $erroremail = $errorcontact = $unameErr = $passErr = $cpassErr =  "";
$ac="";


if(isset($_POST["btn_send"])){
    $error = 0;

    if(!is_numeric($_POST["txtcon"])){
        $error++;
        $errorcontact = "PLEASE INPUT NUMBER ONLY!";
    }

    if(empty($_POST["txtpass"])){
        $error++;
        $passErr = "PASSWORD REQUIRED!";
    }

    if(empty($_POST["txtcpass"])){
        $error++;
        $cpassErr = "CONFIRM PASSWORD REQUIRED!";
    }

    if($_POST["txtpass"] != $_POST["txtcpass"]){
        $error++;
        $cpassErr = "PASSWORD missmatch!";
    }

   

    //FORM VALIDATION - NUMBER INPUT AND NULL VALUE

    if($error==0){
        $fname = $_POST["txtfname"];
        $lname = $_POST["txtlname"];
        $email = $_POST["txtemail"];
        $cont = $_POST["txtcon"];
        $uname = $_POST["txtuname"];
        $pass=$_POST["txtpass"];
		$acc = $_POST["accnt_type"];

        $check_username = mysqli_query($con, "SELECT * FROM tbl_info WHERE uname='$uname'");
            $check_uname_rows = mysqli_num_rows($check_username);
            if($check_uname_rows > 0){
                $unameErr = "USERNAME already Exists!";
            }

            else{
                    //inserting data in the database
					if($acc == "Admin"){  //determine account type
						$ac =1;
					}
					else{
							$ac=2;
					}
					
                    $sql = "INSERT INTO tbl_info(fname,lname,email,contact,uname,pword,account_type) VALUES('$fname','$lname','$email','$cont','$uname','$pass','$ac')";
                    if(mysqli_query($con, $sql)){
                        echo "<script language='javascript'>alert('New Record has been inserted!')</script>";
                        echo "<script>window.location.href='crud.php';</script>";
                    }
                        else{
                            echo"error".$sql."<br>".mysqli_error($con);
                        }
                        mysqli_close($con); // laging nag cloclose ng database connection

            }


    }

}
?>

<!DOCTYPE html>
<html>
<head>
<title>CRUD - DASHBOARD</title>
 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
 
</head>
<body style="height:1000px;">

<br>
    <?php
       // echo"<h1>";
       // include("../crudphpfile/nav.php");
      //  echo "</h1>";
       
    ?>
	
	<h1>
	<ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link" href="index.php">MY PORTFOLIO</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../admin/crud.php"> | DASHBOARD | </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../crudphpfile/search.php">SEARCH</a>
    </li>
	</ul>
	</h1>
	
    <br><br>


<div class="container">
    <form method="POST" action = "<?php htmlspecialchars("PHP_SELF"); ?>">
            <h2>REGISTRATION FORM</h2><br>
			
			
			 <div class="row">
					<div class="col">
						 <label>FIRST NAME:</label> 
							<input type="text" class="form-control" name="txtfname" value="<?php echo $fname; ?>" required> <br>
							<span style="color:red;"><?php echo $errorfname; ?></span>

					</div>
					
					<div class="col">
					  <label>LAST NAME:</label> 
							<input type="text" class="form-control" name="txtlname" value="<?php echo $lname; ?>" required> <br>
							<span style="color:red;"><?php echo $errorlname; ?></span>
					</div>
					
					
			</div>
			
			 <div class="row">
					<div class="col">
						 <label>Email:</label>
							<input type="text" class="form-control" name="txtemail" value="<?php echo $email; ?>" required> <br>
							<span style="color:red;"><?php echo $erroremail; ?></span>

					</div>
					
					<div class="col">
						  <label>Contact:</label>
									<input type="text" class="form-control" name="txtcon" value="<?php echo $cont; ?>" required> <br>
									<span style="color:red;"><?php echo $errorcontact; ?></span>
					</div>
			</div>
			
			<div class="row">
					<div class="col">
						 <label>USERNAME:</label>
						<input type="text" class="form-control" name="txtuname" value="<?php echo $uname; ?>" required> <br>
						<span style="color:red;"><?php echo $unameErr; ?></span>
					</div>
				
			</div>
           
		   	<div class="row">
					<div class="col">
						  <label>PASSWORD:</label>
							<input type="password" class="form-control"  name="txtpass" value="<?php echo $pass; ?>"> <br>
							<span style="color:red;"><?php echo $passErr; ?></span><br>
					</div>
					
					<div class="col">
						     <label>CONFIRM PASSWORD:</label>
								<input type="password" class="form-control" name="txtcpass" value="<?php echo $cpass; ?>"> <br>
								<span style="color:red;"><?php echo $cpassErr; ?></span><br>
					</div>
			</div>
			
			<div class="row">
			
				<div class="col">
							  <label for="account_type">Account type:</label>
							  <select class="form-control" id="accnt" name="accnt_type">
								<option>Admin</option>
								<option>User</option>
							  </select>
						
				</div>
				
	
			</div>
			<br><br>


            <input type="submit" class="btn btn-primary" name= "btn_send" value="Register">

    </form>
</div>

<hr>
<h2>ACCOUNT LIST</h2>

<?php
    $sql = mysqli_query($con, "SELECT * FROM tbl_info"); //retrieving data in database
	echo "<div class='table-responsive'>";
    echo "<table class='table table-light table-bordered table-sm table-hover'>";
    echo "<thead class='thead-dark'><tr>
            <th>ID</th>
            <th>FIRST NAME</th>
            <th>LAST NAME </th>
            <th>EMAIL</th>
            <th>CONTACT</th>
            <th>ACTION</th>
    </tr></thead>";
    while($row=mysqli_fetch_assoc($sql)){           //displaying all records
        $idd = $row["id"];
        $ffname = $row["fname"];
        $llname = $row["lname"];
        $emaill = $row["email"];
        $connt = $row["contact"];

        echo  "<tbody><tr>   
                <td> " . $idd . "</td>
                <td>" . $ffname . "</td> 
                <td>" . $llname . "</td>
                <td>" . $emaill . "</td>
                <td>" . $connt . "</td>
                <td><a class='btn btn-primary' href ='../crudphpfile/view.php?id=$idd'>VIEW</a> &nbsp
                <a class='btn btn-success' href = '../crudphpfile/editInfo.php?id=$idd'>UPDATE</a> &nbsp
                <a class='btn btn-danger' href = '../crudphpfile/delInfo.php?id=$idd'>DELETE</a> &nbsp
                </td>
        </tr></tbody>";

    }
    echo "</table>";
	echo "</div>";

?>


</body>
</html>
