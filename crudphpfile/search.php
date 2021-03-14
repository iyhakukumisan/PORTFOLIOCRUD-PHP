

<!DOCTYPE html>
<html lang="en">
<head>
	<title>CRUD - SEARCH </title>
	
	
	<style>
    .error{
        color:red;
    }
	
	
	
	body{
	
		margin:0;
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		
	}


	
		.searchbox {
		  background-color: #fefefe;
		  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
		  border: 1px solid #888;
		  width: 80%; /* Could be more or less, depending on screen size */
		  text-align:center;
		}

		.center {
		  display: block;
		  margin-left: auto;
		  margin-right: auto;
		  width: 50%;
		  
		}
		
		input[type="text"]{
			width:50%;
			padding:10px;
			font-face: System, Arial, sans-serif;
			font-size:20px;
			
			
		}
		
		
		input[type="submit"]{
			width:25%;
			padding:10px;
			font-face: System, Arial, sans-serif;
			font-size:20px;
			border-radius:5px;
			
		}
		
		a{
			color:black;
			text-decoration:none;
			
		}
		button{
			width:25%;
			padding:13px;
			color:black;
			border:2px solid black;
			text-decoration:none;
			border-radius:5px;
		}
		
	</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	


</head>

<body>


<?php

    $search = $searchErr="";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["search"]){
            $search = $_POST["search"];
        }

        if($search){
            echo "<script>window.location.href='result.php?search=$search';</script>";
        }



    }
?>


<div class="searchbox">
<br>
		<form method="POST" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<h2> ENTER FIRST NAME OR LAST NAME VALUE TO FIND RECORD:</h2> <br><br>
			<input type="text" name ="search" value="<?php echo $search; ?>" required>
			<br><br>
			<input type="submit" value="SEARCH">
			

		</form><br>
		<button><a href="../admin/crud.php">BACK</a></button>
<br><br>
</div>
	
</body>
</html>