<?php
    include("./database/connection.php");
    $user = $pass="";
    $unameErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($_POST["txtuser"])){
            $unameErr = "USERNAME REQUIRED!";
        }
        else{
            $user = $_POST["txtuser"];
        }
        if(empty($_POST["txtpass"])){
            $unameErr = "PASSWORD REQUIRED!";
        }
        else{
            $pass=$_POST["txtpass"];
        }

        if($user && $pass){
            $check_username = mysqli_query($con, "SELECT * FROM tbl_info WHERE uname='$user'");
                $check_uname_rows=mysqli_num_rows($check_username);
                if($check_uname_rows > 0){
                        while($row = mysqli_fetch_assoc($check_username)){
                            $user_id = $row["id"];
                            $dbpass = $row["pword"];
                            $dbacctype = $row["account_type"];

                            if($pass==$dbpass){
                                session_start();
                                $_SESSION["id"] = $user_id;
                               

                                if($dbacctype == 1){
                                    echo "<script>window.location.href='admin'</script>";
                                }
                                else{
                                    echo "<script>window.location.href='user'</script>";
                                }

                            }
                            else{
                                $unameErr = "PASSWORD incorrect!";
                            }

                        }

                }
                else{
                    $unameErr = "USERNAME is not REGISTERED!";
                }

        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>LOGIN</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

a{
	text-decoration:none;
	
}

</style>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="loginstyle.css">
</head>
<body>

<div class="login-box">
        <h1>LOGIN</h1>

        
        <form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="textbox">
        <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" name="txtuser" class="form-control" placeholder="Enter Username">
        </div>

        <div class="textbox">
        <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" name="txtpass" class="form-control" placeholder="Enter Password">
        </div>
        
        <span class="err"><?php echo $unameErr; ?></span>
        <br>
		
		<a href="signup.php">Click here if you don't have account</a>
		<br><br>
	
        <button type="submit" name="btnlogin" class="btn btn-primary">LOGIN</button>
		
		

        
        </form>

</div>

</body>
</html>